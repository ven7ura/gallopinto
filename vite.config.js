import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { babel } from '@rollup/plugin-babel';
import livewire from '@defstudio/vite-livewire-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            // refresh: false,
            refresh : [
                'resources/views/**',
                'routes/**',
                'content/**'
            ],
        }),
    //     livewire({
    //        refresh: ['resources/css/app.css'],
    //    }),
        babel({ babelHelpers: 'bundled' }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js'
        }
    }
});