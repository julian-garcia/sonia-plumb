import { cpSync, mkdirSync } from 'node:fs';

export function copyFiles() {
  mkdirSync('./dist-local', { recursive: true });

  cpSync('./src/wordpress', './dist-local', {
    recursive: true,
  });
}
