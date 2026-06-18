<template>
  <div style="padding: 20px; font-family: Arial;">
    <h1>Photos</h1>
    <div v-if="photos.length === 0">Loading...</div>
    <div style="display: flex; flex-wrap: wrap; gap: 15px;">
      <div v-for="photo in photos" :key="photo.id"
           style="border: 1px solid #ccc; padding: 10px; border-radius: 8px; width: 200px;">
        <img :src="photo.image_url" style="width: 100%; height: 150px; object-fit: cover;" />
        <p><strong>{{ photo.title }}</strong></p>
        <p style="font-size: 12px;">{{ photo.caption }}</p>
        <p style="font-size: 11px; color: green;">{{ photo.processing_status }}</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return { photos: [] }
  },
  async mounted() {
    const res = await fetch("/api/photos")
    const data = await res.json()
    this.photos = data.data || data.items || data
  }
}
</script>
