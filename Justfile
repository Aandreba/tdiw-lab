set windows-powershell := true

tw:
    bunx tailwindcss -i ./assets/input.css -o ./assets/index.css

upload:
    scp #TODO

ssh:
    ssh tdiw-j7.deic-docencia.uab.cat -p 170
