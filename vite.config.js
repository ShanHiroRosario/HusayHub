import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/styles.css", // Your custom styles
                "resources/css/fontstyles.css", // Additional font styles
                "resources/js/app.js", // Your app's main JS file
            ],
            refresh: true,
        }),
    ],
});
