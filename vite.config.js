import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/plugins/typicons.font/font/typicons.css',
                'resources/plugins/css/vendor.bundle.base.css',
                'resources/css/vertical-layout-light/style.css',
                'resources/plugins/js/vendor.bundle.base.js',
                'resources/js/off-canvas.js',
                'resources/js/hoverable-collapse.js',
                'resources/js/template.js',
                'resources/js/settings.js',
                'resources/js/todolist.js',
                'resources/plugins/progressbar.js/progressbar.min.js',
                'resources/plugins/chart.js/Chart.min.js',
                'resources/js/dashboard.js'
            ],
            refresh: true,
        }),
    ]
});
