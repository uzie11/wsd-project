<template>
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Photos</h1>
      <span class="badge">{{ photos.length }} items</span>
    </div>
    <div v-if="photos.length === 0" class="empty">Loading...</div>
    <div v-else class="grid">
      <div class="photo-card" v-for="photo in photos" :key="photo.id">
        <div class="photo-img-wrap">
          <img :src="photo.image_url" :alt="photo.title" class="photo-img" />
        </div>
        <div class="photo-info">
          <div class="photo-title">{{ photo.title }}</div>
          <div class="photo-caption">{{ photo.caption }}</div>
          <span :class="'status-dot status-' + photo.processing_status">{{ photo.processing_status }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() { return { photos: [] } },
  async mounted() {
    const res = await fetch('/api/photos')
    const data = await res.json()
    this.photos = data.data || data.items || data
  }
}
</script>

<style scoped>
.page { padding: 40px; }
.page-header { display: flex; align-items: center; gap: 16px; margin-bottom: 28px; }
.page-title { font-size: 28px; font-weight: 700; color: #e2e0f0; }
.badge { background: #2d1f5e; color: #a855f7; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; border: 1px solid #3d2070; }
.empty { color: #7c6fa0; padding: 40px; text-align: center; }
.grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 16px; }
.photo-card { background: #13111f; border: 1px solid #2a2445; border-radius: 12px; overflow: hidden; transition: border-color 0.15s; }
.photo-card:hover { border-color: #7c3aed; }
.photo-img-wrap { width: 100%; height: 160px; background: #1a1630; overflow: hidden; }
.photo-img { width: 100%; height: 100%; object-fit: cover; }
.photo-info { padding: 14px; }
.photo-title { font-size: 14px; font-weight: 600; color: #e2e0f0; margin-bottom: 4px; }
.photo-caption { font-size: 12px; color: #7c6fa0; margin-bottom: 8px; }
.status-dot { font-size: 10px; font-weight: 600; padding: 2px 8px; border-radius: 10px; text-transform: uppercase; }
.status-processed { background: #0f2e1a; color: #4ade80; }
.status-uploaded { background: #2a1f0e; color: #fbbf24; }
</style>