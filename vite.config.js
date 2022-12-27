import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/vertical-layout-light/style.css',
                'resources/js/off-canvas.js',
                'resources/js/hoverable-collapse.js',
                'resources/js/template.js',
                'resources/js/settings.js',
                'resources/js/todolist.js',
                'resources/js/dashboard.js'
            ],
            refresh: true,
        }),
    ]
});
