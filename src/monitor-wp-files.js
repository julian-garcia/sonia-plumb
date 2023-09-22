import { watch, readlink, cpSync, existsSync, mkdirSync } from 'node:fs';
import { addAssetHash } from './asset-hash.js';

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

function copyFiles() {
  readlink('./dist-local', (err, target) => {
    if (!err) {
      cpSync('./src/wordpress', target, { recursive: true });
      addAssetHash();
    }
  });
}
