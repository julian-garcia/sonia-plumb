import { defineConfig } from 'vite';
import { copyFiles } from './src/copy-wp-files';
import { addAssetHash } from './src/asset-hash';

export default defineConfig({
  base: '',
  build: {
    outDir: 'dist-local',
    emptyOutDir: true,
    copyPublicDir: true,
  },
  plugins: [
    {
      name: 'postbuild',
      closeBundle: async () => {
        copyFiles();
        addAssetHash();
      },
    },
  ],
});
