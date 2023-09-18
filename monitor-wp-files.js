import { watch, readlink, cp, readFile, writeFile, readdir } from 'node:fs';

watch('./dist-local/assets', (_, filename) => {
  if (/^index.*\.css$/.test(filename)) {
    copyFiles();
  }
});

watch('./wordpress', () => {
  copyFiles();
});

function copyFiles() {
  readlink('./dist-local', (err, target) => {
    if (!err) {
      cp('./wordpress', target, { recursive: true }, (err) => {
        if (err) throw err;
        addAssetHash();
      });
    }
  });
}

function addAssetHash() {
  readdir('./dist-local/assets', (err, files) => {
    if (err) throw err;
    let indexHash = files.filter((f) => /^index.*\.css$/.test(f))[0];

    readFile('./dist-local/functions.php', 'utf-8', function (err, data) {
      if (err) throw err;

      const newValue = data.replace('{index.css}', indexHash);

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
