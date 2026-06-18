<template>
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Videos</h1>
      <span class="badge">{{ videos.length }} items</span>
    </div>
    <div v-if="videos.length === 0" class="empty">Loading...</div>
    <div v-else class="grid">
      <div class="video-card" v-for="video in videos" :key="video.id">
        <div class="video-thumb">
          <span class="play-btn">▶</span>
          <span class="genre-tag">{{ video.genre }}</span>
        </div>
        <div class="video-info">
          <div class="video-title">{{ video.title }}</div>
          <div class="video-meta">
            <span>{{ video.duration_minutes }} min</span>
            <span class="dot">·</span>
            <span class="rating">★ {{ video.rating }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() { return { videos: [] } },
  async mounted() {
    const res = await fetch('/api/videos')
    const data = await res.json()
    this.videos = data.data || data.items || data
  }
}
</script>

<style scoped>
.page { padding: 40px; }
.page-header { display: flex; align-items: center; gap: 16px; margin-bottom: 28px; }
.page-title { font-size: 28px; font-weight: 700; color: #e2e0f0; }
.badge { background: #2d1f5e; color: #a855f7; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; border: 1px solid #3d2070; }
.empty { color: #7c6fa0; padding: 40px; text-align: center; }
.grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 16px; }
.video-card { background: #13111f; border: 1px solid #2a2445; border-radius: 12px; overflow: hidden; transition: border-color 0.15s; }
.video-card:hover { border-color: #7c3aed; }
.video-thumb { height: 140px; background: linear-gradient(135deg, #1a1630, #2d1f5e); display: flex; align-items: center; justify-content: center; position: relative; }
.play-btn { font-size: 32px; color: #a855f7; opacity: 0.8; }
.genre-tag { position: absolute; top: 10px; right: 10px; background: #2d1f5e; color: #a855f7; font-size: 10px; font-weight: 600; padding: 3px 8px; border-radius: 6px; border: 1px solid #3d2070; text-transform: uppercase; }
.video-info { padding: 14px; }
.video-title { font-size: 14px; font-weight: 600; color: #e2e0f0; margin-bottom: 6px; }
.video-meta { display: flex; align-items: center; gap: 6px; font-size: 12px; color: #7c6fa0; }
.dot { color: #3d2070; }
.rating { color: #fbbf24; }
</style>