import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import vue from '@vitejs/plugin-vue'
import path from 'path'

import Components from 'unplugin-vue-components/vite';
import vuetify from "vite-plugin-vuetify";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
        }),
        vue(),
        Components({
        }),
        vuetify({
            autoImport: true,
        }),
        // legacy()
    ],
    build: {
        rollupOptions: {
            input: {
                main: 'resources/js/app.ts',
            },
        },
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js/src'),
            '~': path.resolve(__dirname, 'resources/js'), 
            '$': path.resolve(__dirname, 'resources'),
            '_': path.resolve(__dirname),
            // '@node_modules': path.resolve(__dirname, 'node_modules')
        },
    },
});
