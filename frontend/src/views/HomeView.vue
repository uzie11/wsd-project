<template>
  <div class="home">
    <div class="home-header">
      <div class="header-tag">WSD Project · Student 79016</div>
      <h1 class="header-title">Web Systems <span class="accent">Design</span></h1>
      <p class="header-sub">Laravel · Vue.js · Redis · PostgreSQL · Docker</p>
      <div class="student-card">
        <div class="student-card-avatar">OS</div>
        <div class="student-card-info">
          <span class="student-card-name">Ömer Söyler</span>
          <span class="student-card-id">Student ID: 79016 · Vistula University</span>
        </div>
      </div>
    </div>
    <div class="stats-grid">
      <div class="stat-card" v-for="stat in stats" :key="stat.label">
        <div class="stat-icon">{{ stat.icon }}</div>
        <div class="stat-value">{{ stat.value }}</div>
        <div class="stat-label">{{ stat.label }}</div>
      </div>
    </div>
    <div class="stack-grid">
      <div class="stack-card" v-for="item in stack" :key="item.name">
        <div class="stack-name">{{ item.name }}</div>
        <div class="stack-desc">{{ item.desc }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      stats: [
        { icon: '✓', value: '4', label: 'Containers' },
        { icon: '⚡', value: 'Redis', label: 'Cache Layer' },
        { icon: '◈', value: 'REST', label: 'API' },
        { icon: '▶', value: 'Vue', label: 'Frontend' },
      ],
      stack: [
        { name: 'Laravel', desc: 'REST API Backend' },
        { name: 'Vue.js', desc: 'SPA Frontend' },
        { name: 'Redis', desc: 'Cache Store' },
        { name: 'PostgreSQL', desc: 'Database' },
        { name: 'Nginx', desc: 'Reverse Proxy' },
        { name: 'Docker', desc: 'Containerization' },
      ]
    }
  }
}
</script>

<style scoped>
.home { padding: 40px; }
.home-header { margin-bottom: 40px; }
.header-tag { font-size: 12px; color: #a855f7; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 12px; }
.header-title { font-size: 48px; font-weight: 800; color: #e2e0f0; line-height: 1.1; margin-bottom: 12px; }
.accent { background: linear-gradient(135deg, #7c3aed, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.header-sub { font-size: 15px; color: #7c6fa0; margin-bottom: 0; }
.student-card { display: flex; align-items: center; gap: 14px; margin-top: 24px; background: #13111f; border: 1px solid #2a2445; border-radius: 12px; padding: 16px 20px; width: fit-content; }
.student-card-avatar { width: 44px; height: 44px; background: linear-gradient(135deg, #7c3aed, #a855f7); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 700; color: white; }
.student-card-info { display: flex; flex-direction: column; gap: 2px; }
.student-card-name { font-size: 16px; font-weight: 700; color: #e2e0f0; }
.student-card-id { font-size: 12px; color: #7c6fa0; }
.stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 32px; }
.stat-card { background: #13111f; border: 1px solid #2a2445; border-radius: 12px; padding: 24px; text-align: center; }
.stat-icon { font-size: 24px; margin-bottom: 8px; color: #a855f7; }
.stat-value { font-size: 22px; font-weight: 700; color: #e2e0f0; margin-bottom: 4px; }
.stat-label { font-size: 12px; color: #7c6fa0; }
.stack-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }
.stack-card { background: #13111f; border: 1px solid #2a2445; border-radius: 10px; padding: 16px 20px; display: flex; align-items: center; justify-content: space-between; }
.stack-name { font-size: 14px; font-weight: 600; color: #c4b8e8; }
.stack-desc { font-size: 12px; color: #7c6fa0; }
</style>