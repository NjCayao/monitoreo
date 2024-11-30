const fs = require('fs');
const path = require('path');

const folderPath = './';

function getFiles(dir) {
  let files = [];
  const filesAndDirs = fs.readdirSync(dir);

  filesAndDirs.forEach(fileOrDir => {
    const filePath = path.join(dir, fileOrDir);
    const isDirectory = fs.statSync(filePath).isDirectory();

    if (isDirectory) {
      files = files.concat(getFiles(filePath)); // Llamada recursiva
    } else {
      files.push(filePath.replace(/\\/g, '/')); // Reemplazar barras invertidas con barras inclinadas
    }
  });

  return files;
}

const filesList = getFiles(folderPath);
const swList = filesList.map(file => `'${file}'`).join(',\n        ');

const outputFilePath = './sw.js';

// Escribir el contenido del Service Worker en el archivo de salida
fs.writeFileSync(outputFilePath, `
// Instalación del Service Worker y almacenamiento en caché de recursos
self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('mi-cache').then(function(cache) {
      return cache.addAll([
        '/',
        '/index.html',
        '/styles.css',
        '/app.js',
        ${swList},
      ]);
    })
  );
});

// Intercepta las solicitudes de red y sirve desde la caché si está disponible
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});
`);

console.log(`Service Worker generado en ${outputFilePath}`);
