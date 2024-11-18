set windows-powershell := true

up:
    docker compose up -d

up-build:
    docker compose up --build -d

down:
    docker compose down

migrate:
    docker compose exec -it postgres psql -d mydb -U myuser -f /migrations/schema.sql
