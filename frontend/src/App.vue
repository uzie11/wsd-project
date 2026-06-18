<template>
  <div class="app-shell">
    <aside class="sidebar">
      <div class="sidebar-brand">
        <div class="brand-icon">WSD</div>
        <div class="brand-text">
          <span class="brand-title">Web Systems</span>
          <span class="brand-sub">Design</span>
        </div>
      </div>
      <nav class="sidebar-nav">
        <router-link to="/" class="nav-item" active-class="nav-active" exact>
          <span class="nav-icon">⌂</span>
          <span>Home</span>
        </router-link>
        <router-link to="/tasks" class="nav-item" active-class="nav-active">
          <span class="nav-icon">✓</span>
          <span>Tasks</span>
        </router-link>
        <router-link to="/photos" class="nav-item" active-class="nav-active">
          <span class="nav-icon">◈</span>
          <span>Photos</span>
        </router-link>
        <router-link to="/videos" class="nav-item" active-class="nav-active">
          <span class="nav-icon">▶</span>
          <span>Videos</span>
        </router-link>
      </nav>
      <div class="sidebar-footer">
        <div class="student-badge">
          <div class="student-avatar">OS</div>
          <div class="student-info">
            <span class="student-name">Omer Soyler</span>
            <span class="student-id">ID: 79016</span>
          </div>
        </div>
      </div>
    </aside>
    <main class="main-content">
      <RouterView />
    </main>
  </div>
</template>

<script>
export default {}
</script>

<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
body { background: #0d0d14; color: #e2e0f0; font-family: 'Segoe UI', system-ui, sans-serif; }
.app-shell { display: flex; min-height: 100vh; }
.sidebar { width: 220px; min-height: 100vh; background: #13111f; border-right: 1px solid #2a2445; display: flex; flex-direction: column; position: fixed; top: 0; left: 0; bottom: 0; }
.sidebar-brand { display: flex; align-items: center; gap: 12px; padding: 24px 20px; border-bottom: 1px solid #2a2445; }
.brand-icon { width: 40px; height: 40px; background: linear-gradient(135deg, #7c3aed, #a855f7); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 12px; color: white; }
.brand-text { display: flex; flex-direction: column; }
.brand-title { font-size: 13px; font-weight: 700; color: #e2e0f0; }
.brand-sub { font-size: 11px; color: #7c6fa0; }
.sidebar-nav { padding: 16px 12px; display: flex; flex-direction: column; gap: 4px; flex: 1; }
.nav-item { display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: 8px; color: #7c6fa0; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.15s; }
.nav-item:hover { background: #1e1a30; color: #c4b8e8; }
.nav-active { background: linear-gradient(135deg, #2d1f5e, #3d2070) !important; color: #c084fc !important; }
.nav-icon { font-size: 16px; width: 20px; text-align: center; }
.sidebar-footer { padding: 16px; border-top: 1px solid #2a2445; }
.student-badge { display: flex; align-items: center; gap: 10px; padding: 10px; background: #1e1a30; border-radius: 8px; border: 1px solid #2a2445; }
.student-avatar { width: 34px; height: 34px; background: linear-gradient(135deg, #7c3aed, #a855f7); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; color: white; flex-shrink: 0; }
.student-info { display: flex; flex-direction: column; }
.student-name { font-size: 12px; font-weight: 600; color: #c4b8e8; }
.student-id { font-size: 10px; color: #7c6fa0; }
.main-content { margin-left: 220px; flex: 1; min-height: 100vh; background: #0d0d14; }
</style>