'use strict';

const livereload = require('gulp-livereload');
const inline_base64 = require('gulp-inline-base64');

module.exports = (gulp, plugins, config) => () => {
  return gulp.src(config.input.scss)
    //.pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass().on('error', plugins.sass.logError))
    .pipe(inline_base64({
        baseDir: 'public',
        maxSize: 14 * 1024,
        debug: false
    }))
    .pipe(plugins.autoprefixer({ browsers: ['last 2 versions'], cascade: false }))
		.pipe(plugins.minifyCss())
        //.pipe(plugins.sourcemaps.write('./'))
		.pipe(plugins.rename({ suffix: '.min' }))

    .pipe(gulp.dest(`${config.output.dist}/${config.output.css}`))
    .pipe(livereload())
    .pipe(plugins.notify({message: 'SCSS built', onLast: true}));
};
