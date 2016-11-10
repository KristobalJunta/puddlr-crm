'use strict';
const livereload = require('gulp-livereload');

module.exports = (gulp, plugins, config) => () => {
  livereload.listen();

  gulp.watch(config.input.scss, gulp.series('build-scss'));
  gulp.watch(config.input.js, gulp.series('build-js'));
  gulp.watch(config.input.images, gulp.series('images'));
};
