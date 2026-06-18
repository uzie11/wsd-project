<template>
  <div style="padding: 20px; font-family: Arial;">
    <h1>Videos</h1>
    <div v-if="videos.length === 0">Loading...</div>
    <div style="display: flex; flex-wrap: wrap; gap: 15px;">
      <div v-for="video in videos" :key="video.id"
           style="border: 1px solid #ccc; padding: 10px; border-radius: 8px; width: 220px;">
        <div style="background: #222; height: 120px; display: flex; align-items: center; justify-content: center;">
          <span style="color: white; font-size: 40px;">▶</span>
        </div>
        <p><strong>{{ video.title }}</strong></p>
        <p style="font-size: 12px;">Genre: {{ video.genre }}</p>
        <p style="font-size: 12px;">Duration: {{ video.duration_minutes }} min</p>
        <p style="font-size: 11px; color: #534AB7;">Rating: {{ video.rating }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return { videos: [] }
  },
  async mounted() {
    const res = await fetch('/api/79016/v1/videos')
    const data = await res.json()
    this.videos = data.data
  }
}
</script>