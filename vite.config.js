import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/css/style.css',
                'resources/js/plugins/common/common.min.js',
                'resources/js/custom.min.js',
                'resources/js/settings.js',
                'resources/js/gleek.js',
                'resources/js/styleSwitcher.js'
            ],
            refresh: true,
        }),
    ]
});
