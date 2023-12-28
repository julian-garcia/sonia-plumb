import { watch, existsSync, mkdirSync } from 'node:fs';
import { copyFiles } from './copy-wp-files.js';

if (!existsSync('./dist-local/assets')) {
  mkdirSync('./dist-local/assets');
}

watch('./dist-local/assets', (_, filename) => {
  if (/^index.*\.css$/.test(filename)) {
    copyFiles();
  }
});

watch('./src/wordpress', () => {
  copyFiles();
});
