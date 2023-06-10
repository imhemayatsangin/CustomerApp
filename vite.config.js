import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: {
                'app': resolve(__dirname, 'resources/js/app.js'),
                'app.css': resolve(__dirname, 'resources/css/app.css'),
            },
            output: resolve(__dirname, 'public'),
            refresh: true,
        }),
    ],
});
