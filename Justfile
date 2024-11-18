set windows-powershell := true

up:
    docker compose up -d

up-build:
    docker compose up --build -d

down:
    docker compose down

migrate:
    docker compose exec -it postgres psql -d mydb -U myuser -f /migrations/schema.sql
    docker compose exec -it postgres psql -d mydb -U myuser -f /migrations/data.sql

clear-database:
    docker compose exec -it postgres psql -d mydb -U myuser -c "DROP TABLE order_products;"
    docker compose exec -it postgres psql -d mydb -U myuser -c "DROP TABLE orders;"
    docker compose exec -it postgres psql -d mydb -U myuser -c "DROP TABLE users;"
    docker compose exec -it postgres psql -d mydb -U myuser -c "DROP TABLE products;"
    docker compose exec -it postgres psql -d mydb -U myuser -c "DROP TABLE categories;"
