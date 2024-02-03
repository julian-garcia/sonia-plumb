import { readlink, cpSync } from 'node:fs';
import { addAssetHash } from './asset-hash.js';

copyFiles();

export function copyFiles() {
  readlink('./dist-local', (err, target) => {
    if (!err) {
      try {
        cpSync('./src/wordpress', target, { recursive: true });
        addAssetHash();
      } catch (error) {
        console.log(error.message);
      }
    }
  });
}
