<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
class PhotoController extends Controller
{
    public function index()
    {
        $photos = Cache::remember('photos.index', 60, function () {
            return Photo::latest()->get()->map(function ($photo) { return $this->formatPhoto($photo); })->toArray();
        });
        return response()->json(['data' => $photos]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string',
            'image' => 'required|image|max:10240',
            'album_number' => 'required|string',
        ]);
        $file = $request->file('image');
        $path = $file->store('photos', 'public');
        $photo = Photo::create([
            'title' => $request->input('title'),
            'caption' => $request->input('caption'),
            'image_path' => $path,
            'original_filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'processing_status' => 'uploaded',
            'album_number' => $request->input('album_number'),
        ]);
        $photo->processing_status = 'processed';
        $photo->save();
        Cache::forget('photos.index');
        return response()->json(['message' => 'Photo uploaded successfully.', 'data' => $this->formatPhoto($photo)], 201);
    }
    public function show(string $id)
    {
        $photo = Cache::remember("photos.show.{$id}", 60, function () use ($id) {
            return Photo::findOrFail($id);
        });
        return response()->json(['data' => $this->formatPhoto($photo)]);
    }
    public function destroy(string $id)
    {
        $photo = Photo::findOrFail($id);
        Storage::disk('public')->delete($photo->image_path);
        $photo->delete();
        Cache::forget('photos.index');
        Cache::forget("photos.show.{$id}");
        return response()->json(['message' => 'Photo deleted successfully.']);
    }
    private function formatPhoto(Photo $photo): array
    {
        return [
            'id' => $photo->id,
            'title' => $photo->title,
            'caption' => $photo->caption,
            'image_url' => '/storage/' . $photo->image_path,
            'original_filename' => $photo->original_filename,
            'mime_type' => $photo->mime_type,
            'file_size' => $photo->file_size,
            'processing_status' => $photo->processing_status,
            'album_number' => $photo->album_number,
            'created_at' => $photo->created_at,
            'updated_at' => $photo->updated_at,
        ];
    }
}

