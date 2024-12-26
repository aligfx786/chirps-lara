import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    server: {
        host: "0.0.0.0", // Allow connections from any host (required for DDEV)
        port: 5177, // Match the exposed port
        strictPort: true, // Do not auto-change ports
    },
    preview: {
        host: "localhost", // Match the dev server host
        port: 5177,
        strictPort: true,
    },
});
