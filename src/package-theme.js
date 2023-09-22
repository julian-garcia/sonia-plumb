import { createWriteStream } from 'node:fs';
import archiver from 'archiver';

const output = createWriteStream('sonia-plumb.zip');
const archive = archiver('zip', {
  zlib: { level: 9 },
});

archive.pipe(output);
archive.directory('dist-local', false);
archive.finalize();
