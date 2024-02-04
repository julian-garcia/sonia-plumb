import { cpSync, readlinkSync } from 'node:fs';

export function copyFiles() {
  const target = readlinkSync('./dist-local');
  cpSync('./src/wordpress', target, { recursive: true });
}
