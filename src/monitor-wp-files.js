import { watch } from 'node:fs';
import { copyFiles } from './copy-wp-files.js';

watch('./dist-local/assets', (_, filename) => {
  if (/^index.*\.css$/.test(filename)) {
    copyFiles();
  }
});

watch('./src/wordpress', () => {
  copyFiles();
});
