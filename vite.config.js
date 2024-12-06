import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/togglePassword.js", // Toggle password script
            ],
            refresh: true,
        }),
        react({
            babel: {
                presets: ["@babel/preset-react"],
            },
        }),
    ],
});
