const Bundler = require('parcel-bundler');
const Path = require('path');

const entryFiles = Path.join(__dirname, './src/index.html');

const options = {
  outDir: 'public',
  publicUrl: './',
  contentHash: false
};

(async function() {
  const bundler = new Bundler(entryFiles, options);
  bundler.bundle();
})();
