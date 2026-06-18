<template>
  <div style="width: 100%; min-height: 100vh;">
    <nav style="background: #1D9E75; padding: 15px 20px; display: flex; gap: 20px;">
      <span style="color: white; font-weight: bold; font-size: 18px;">Web Systems Design</span>
      <router-link to="/" style="color: white; text-decoration: none;">Home</router-link>
      <router-link to="/tasks" style="color: white; text-decoration: none;">Tasks</router-link>
      <router-link to="/photos" style="color: white; text-decoration: none;">Photos</router-link>
      <router-link to="/videos" style="color: white; text-decoration: none;">Videos</router-link>
    </nav>
    <RouterView />
  </div>
</template>

<script>
export default {}
</script>