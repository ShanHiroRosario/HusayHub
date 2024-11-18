const mix = require("laravel-mix");

// Compile CSS from resources/css/styles.css to public/css
mix.css("resources/css/styles.css", "public/css")

    // Compile JavaScript from resources/js/app.js to public/js
    .js("resources/js/app.js", "public/js")

    .css("resources/css/fontstyles.css", "public/css")
    // Optional: Versioning for cache busting (useful for production)
    .version();
