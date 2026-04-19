\# Session 4 - Cache and Deployment



\## What does tasks.index cache?



The tasks.index key caches the full list of tasks returned by Task::query()->latest()->get().

When a GET request hits /api/tasks, Laravel first checks Redis for this key.

If found, it returns the cached result without querying PostgreSQL.

If not found (cold read), it queries the database, stores the result in Redis for 60 seconds, and returns it.



\## Why do store, update, and destroy call Cache::forget?



Any write operation changes the task list in the database.

If the old cached list were served after a write, clients would see stale data.

Cache::forget("tasks.index") removes the key immediately so the next GET request

fetches fresh data from PostgreSQL and repopulates the cache.



\## Purpose of Redis in this stack



Redis acts as an in-memory cache store using the cache-aside pattern.

It stores the serialized task list under the key tasks.index in database 1.

This reduces repeated PostgreSQL queries for read-heavy endpoints.

Laravel is configured with CACHE\_STORE=redis and REDIS\_CLIENT=predis.



\## Purpose of Nginx in this stack



Nginx serves as a reverse proxy and static file server.

It listens on port 80 (mapped to host 8080) and handles two responsibilities:

\- Serving the compiled Vue.js SPA from /usr/share/nginx/html

\- Forwarding all /api/ requests to the Laravel backend at http://backend:8000



\## Commands used to verify cache behavior



docker compose exec redis redis-cli PING

docker compose exec redis redis-cli -n 1 DBSIZE

curl http://127.0.0.1:8080/api/tasks

docker compose exec redis redis-cli -n 1 DBSIZE

curl -X POST http://127.0.0.1:8080/api/tasks

docker compose exec redis redis-cli -n 1 DBSIZE

curl http://127.0.0.1:8080/api/tasks

docker compose exec redis redis-cli -n 1 DBSIZE

