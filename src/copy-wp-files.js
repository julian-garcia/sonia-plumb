import { readlink, cpSync } from 'node:fs';
import { addAssetHash } from './asset-hash.js';

copyFiles();

export function copyFiles() {
  readlink('./dist-local', (err, target) => {
    if (!err) {
      cpSync('./src/wordpress', target, { recursive: true });
      addAssetHash();
    }
  });
}
