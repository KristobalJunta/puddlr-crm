'use strict';

const webpackStream = require('webpack-stream');
const webpackConfig = require('./configs/webpack.config');
const livereload = require('gulp-livereload');

module.exports = (gulp, plugins, config) => () => {
  return gulp.src(config.input.entry)
    .pipe(webpackStream(webpackConfig))
        .on('error', function handleError() {
          this.emit('end'); // Recover from errors
        })
    .pipe(gulp.dest(`${config.output.dist}/${config.output.js}`))
    .pipe(livereload())
    .pipe(plugins.notify({message: 'JS built', onLast: true}));
};
