import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      'rails-ujs': 'node_modules/@rails/ujs/lib/assets/compiled/rails-ujs.js',
    }
  },
  build: {
    rollupOptions: {
      external: ['rails-ujs']
    }
  }
});