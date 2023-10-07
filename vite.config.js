import { defineConfig, loadEnv } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig(({ command, mode }) => {
  const env = loadEnv(mode, process.cwd(), 'VITE_');

  const host = env.VITE_APP_DOMAIN;

  return {
    plugins: [
      laravel({
        input: ['resources/css/app.css', 'resources/js/app.js'],
        refresh: [...refreshPaths, 'app/Livewire/**', 'app/Traits/Forms/**'],
      }),
    ],
    server: {
      host,
      hmr: { host },
    },
  };
});
