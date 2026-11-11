/**
 * =============================================================================
 * COMPRIMARE AUTOMATĂ CSS + JS — AUTOPIESE PRO (ESBUILD)
 * =============================================================================
 * - Rulează compresie la salvare în mod automat (--watch)
 * - Afișează dimensiunile înainte / după și procentul de reducere
 * - Viteză ultra-rapidă (< 10ms per fișier)
 */

const esbuild = require('esbuild');
const fs = require('fs');
const path = require('path');

const CONFIG = {
  css: {
    entry: path.join(__dirname, 'style.css'),
    out: path.join(__dirname, 'style.min.css'),
    label: 'CSS'
  },
  js: {
    entry: path.join(__dirname, 'script.js'),
    out: path.join(__dirname, 'script.min.js'),
    label: 'JavaScript'
  }
};

function formatSize(bytes) {
  return (bytes / 1024).toFixed(2) + ' KB';
}

async function minifyFile(type) {
  const target = CONFIG[type];
  if (!fs.existsSync(target.entry)) {
    console.warn(`[Avertisment] Fișierul sursă nu există: ${target.entry}`);
    return;
  }

  const start = performance.now();
  const rawSize = fs.statSync(target.entry).size;

  try {
    if (type === 'css') {
      await esbuild.build({
        entryPoints: [target.entry],
        outfile: target.out,
        minify: true,
        legalComments: 'none',
        bundle: false,
        logLevel: 'error'
      });
    } else if (type === 'js') {
      await esbuild.build({
        entryPoints: [target.entry],
        outfile: target.out,
        minify: true,
        legalComments: 'none',
        bundle: false,
        target: ['es2022'],
        logLevel: 'error'
      });
    }

    const minSize = fs.statSync(target.out).size;
    const diff = rawSize - minSize;
    const percent = rawSize > 0 ? ((diff / rawSize) * 100).toFixed(1) : 0;
    const duration = (performance.now() - start).toFixed(1);

    const timestamp = new Date().toLocaleTimeString('ro-RO');
    console.log(
      `[${timestamp}] \x1b[32m✔ ${target.label} comprimat:\x1b[0m ` +
      `\x1b[33m${path.basename(target.entry)}\x1b[0m (${formatSize(rawSize)}) → ` +
      `\x1b[36m${path.basename(target.out)}\x1b[0m (${formatSize(minSize)}) | ` +
      `\x1b[35mEconomie: -${percent}%\x1b[0m (${duration}ms)`
    );
  } catch (error) {
    console.error(`\x1b[31m✖ Eroare la comprimarea ${target.label}:\x1b[0m`, error.message);
  }
}

async function buildAll() {
  console.log('\x1b[1m🚀 [AutoPiese Pro] Pornire comprimare CSS & JS...\x1b[0m');
  await minifyFile('css');
  await minifyFile('js');
  console.log('\x1b[32m✨ Toate fișierele au fost comprimate cu succes!\x1b[0m\n');
}

async function startWatch() {
  await buildAll();

  console.log('\x1b[36m👀 [Watch Mode Activ]\x1b[0m Se monitorizează style.css și script.js...');
  console.log('💡 Salvează fișierele (CMD+S / CTRL+S) pentru comprimare automată instantanee.');
  console.log('Apăsați CTRL+C pentru a opri.\n');

  let cssTimeout = null;
  let jsTimeout = null;

  fs.watch(CONFIG.css.entry, (eventType) => {
    if (eventType === 'change') {
      clearTimeout(cssTimeout);
      cssTimeout = setTimeout(() => minifyFile('css'), 50);
    }
  });

  fs.watch(CONFIG.js.entry, (eventType) => {
    if (eventType === 'change') {
      clearTimeout(jsTimeout);
      jsTimeout = setTimeout(() => minifyFile('js'), 50);
    }
  });
}

const isWatch = process.argv.includes('--watch') || process.argv.includes('-w');
if (isWatch) {
  startWatch();
} else {
  buildAll();
}
