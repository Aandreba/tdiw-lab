set windows-powershell := true

up:
    docker compose up --build -d

down:
    docker compose down
