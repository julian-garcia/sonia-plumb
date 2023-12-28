import { readFile, writeFile, readdir } from 'node:fs';

export function addAssetHash() {
  readdir('./dist-local/assets', (err, files) => {
    if (err) throw err;
    let indexHash = files.filter((f) => /^index.*\.css$/.test(f))[0];
    let indexHashJs = files.filter((f) => /^index.*\.js$/.test(f))[0];

    readFile('./dist-local/functions.php', 'utf-8', function (err, data) {
      if (err) throw err;

      const newValue = data
        .replace('{index.css}', indexHash)
        .replace('{index.js}', indexHashJs);

      writeFile(
        './dist-local/functions.php',
        newValue,
        'utf-8',
        function (err) {
          if (err) throw err;
        }
      );
    });
  });
}
