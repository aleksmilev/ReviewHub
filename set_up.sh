docker compose up -d --build

if [ ! -d "node_modules" ] && [ -f "package.json" ]; then
    npm install
fi

npm run dev