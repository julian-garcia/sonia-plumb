import { defineConfig } from 'vite';

export default defineConfig({
  base: '',
  build: {
    outDir: 'dist-local',
    emptyOutDir: true,
    copyPublicDir: false,
  },
});
