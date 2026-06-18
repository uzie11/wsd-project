<template>
  <div style="padding: 20px;">
    <h1>Tasks</h1>
    <div v-if="tasks.length === 0">Loading...</div>
    <table style="width: 100%; border-collapse: collapse;">
      <thead>
        <tr style="background: #1D9E75; color: white;">
          <th style="padding: 10px; text-align: left;">ID</th>
          <th style="padding: 10px; text-align: left;">Title</th>
          <th style="padding: 10px; text-align: left;">Status</th>
          <th style="padding: 10px; text-align: left;">Created</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.id" style="border-bottom: 1px solid #ccc;">
          <td style="padding: 10px;">{{ task.id }}</td>
          <td style="padding: 10px;">{{ task.title }}</td>
          <td style="padding: 10px;">
            <span style="background: #1D9E75; color: white; padding: 3px 8px; border-radius: 4px; font-size: 12px;">
              {{ task.status }}
            </span>
          </td>
          <td style="padding: 10px; font-size: 12px;">{{ task.created_at }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return { tasks: [] }
  },
  async mounted() {
    const res = await fetch("/api/tasks")
    const data = await res.json()
    console.log(data)
    this.tasks = data.items || data.data || data
  }
}
</script>
