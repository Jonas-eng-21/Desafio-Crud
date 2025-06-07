import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/form.css',
                'resources/css/funcionario-list.css',
                'resources/js/dropdown-details.js',
                ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
