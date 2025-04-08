import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [{
                paths: ['resources/**', 'config/**', 'app/**', 'lang/**'],
                config: { delay: 300 }
            }]
        }),
    ],

    resolve: {
        alias: {
            '~bootstrap':  'node_modules/bootstrap',
        }
    },
});
