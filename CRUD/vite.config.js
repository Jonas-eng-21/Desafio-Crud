import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/form.css',
                'resources/css/funcionario-list.css',
                'resources/js/funcionario-validation.js',
                'resources/js/form-validation.js',
                'resources/js/dropdown.js',
                ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, "node_modules/bootstrap/dist"),
        },
    },
});
