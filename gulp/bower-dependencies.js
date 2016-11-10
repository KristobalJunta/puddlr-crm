'use strict';
const mainBowerFiles = require('main-bower-files');
const merge = require('merge-stream');

module.exports = (gulp, plugins, config) => () => {
  var js, css;
    js = gulp.src(mainBowerFiles('**/*.js'))
      .pipe(gulp.dest(`${config.output.dist}${config.output.js}/vendor`))
      .pipe(plugins.notify({message: 'JS dependencies moved!', onLast: true}));
    css = gulp.src(mainBowerFiles('**/*.css'))
      .pipe(gulp.dest(`${config.output.dist}${config.output.css}/vendor`))
      .pipe(plugins.notify({message: 'CSS dependencies moved!', onLast: true}));

  return merge(js,css);
};
