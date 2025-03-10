set shell := ["cmd.exe", "/C"]

be:
    cargo watch -s 'shuttle run'

install-fe:
    cd ./frontend && npm i && cd ..

fe:
    cd ./frontend && npm run dev

fe-build:
    cd ./frontend && npm run build

deploy :
    cd ./frontend && npm run build && cd .. && shuttle deploy

dev:
    start cmd.exe /K "just fe" & start cmd.exe /K "just dev"


