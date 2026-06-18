<template>
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Tasks</h1>
      <span class="badge">{{ tasks.length }} items</span>
    </div>
    <div class="table-wrap">
      <div v-if="tasks.length === 0" class="empty">Loading...</div>
      <table v-else class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Created</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in tasks" :key="task.id">
            <td class="id-cell">#{{ task.id }}</td>
            <td class="title-cell">{{ task.title }}</td>
            <td class="desc-cell">{{ task.description }}</td>
            <td><span :class="'status status-' + task.status">{{ task.status }}</span></td>
            <td><span :class="'priority priority-' + task.priority">{{ task.priority }}</span></td>
            <td class="date-cell">{{ formatDate(task.created_at) }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() { return { tasks: [] } },
  async mounted() {
    const res = await fetch('/api/tasks')
    const data = await res.json()
    this.tasks = data.items || data.data || data
  },
  methods: {
    formatDate(d) {
      return new Date(d).toLocaleDateString('en-GB', { day:'2-digit', month:'short', year:'numeric' })
    }
  }
}
</script>

<style scoped>
.page { padding: 40px; }
.page-header { display: flex; align-items: center; gap: 16px; margin-bottom: 28px; }
.page-title { font-size: 28px; font-weight: 700; color: #e2e0f0; }
.badge { background: #2d1f5e; color: #a855f7; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; border: 1px solid #3d2070; }
.table-wrap { background: #13111f; border: 1px solid #2a2445; border-radius: 12px; overflow: hidden; }
.table { width: 100%; border-collapse: collapse; }
.table thead tr { background: #1a1630; border-bottom: 1px solid #2a2445; }
.table th { padding: 14px 16px; text-align: left; font-size: 11px; font-weight: 600; color: #7c6fa0; text-transform: uppercase; letter-spacing: 1px; }
.table tbody tr { border-bottom: 1px solid #1e1a30; transition: background 0.15s; }
.table tbody tr:last-child { border-bottom: none; }
.table tbody tr:hover { background: #1a1630; }
.table td { padding: 14px 16px; font-size: 14px; color: #c4b8e8; }
.id-cell { color: #7c6fa0; font-size: 13px; }
.title-cell { font-weight: 600; color: #e2e0f0; }
.desc-cell { color: #7c6fa0; font-size: 13px; }
.date-cell { color: #7c6fa0; font-size: 12px; }
.status { padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
.status-completed { background: #0f2e1a; color: #4ade80; border: 1px solid #166534; }
.status-pending { background: #2a1f0e; color: #fbbf24; border: 1px solid #854d0e; }
.status-in_progress { background: #1e1a30; color: #a855f7; border: 1px solid #3d2070; }
.status-todo { background: #1a2030; color: #60a5fa; border: 1px solid #1e3a5f; }
.priority { padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; }
.priority-high { background: #2e0e0e; color: #f87171; border: 1px solid #7f1d1d; }
.priority-medium { background: #2a1f0e; color: #fbbf24; border: 1px solid #854d0e; }
.priority-low { background: #0f2e1a; color: #4ade80; border: 1px solid #166534; }
</style>