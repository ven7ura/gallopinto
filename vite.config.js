import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { babel } from '@rollup/plugin-babel';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        babel({ babelHelpers: 'bundled' }),
        // react(),
        // vue({
        //     template: {
        //         transformAssetUrls: {
        //             base: null,
        //             includeAbsolute: false,
        //         },
        //     },
        // }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js'
        }
    }
});