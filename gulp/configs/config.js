module.exports = {
  input: {
    scss: './resources/assets/scss/**/*.scss',
    entry: [
      "./resources/assets/js/index.js"/*,
      "./resources/assets/js/index2.js"*/
    ],
    js: './resources/assets/js/**/*.js',
    images: './resources/assets/img',
    sprites: [
      {
        src: './resources/assets/img/sprite/*.png',
        outName: 'sprite'
      }
    ]
  },
  output: {
    dist: './public/',
    js: 'js',
    css: 'css',
    images: 'img',
    scss: './resources/assets/scss/'
  },
  production: true
};
