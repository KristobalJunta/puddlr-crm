'use strict';

module.exports = (gulp, plugins, config) => () => {
  return gulp.src([`${config.input.images}/**/*`, `!${config.input.images}/sprite/*`, `!${config.input.images}/sprite`])
    .pipe(plugins.imagemin({ progressive: true }))
    .pipe(gulp.dest(config.output.dist + config.output.images))
    .pipe(plugins.notify({message: 'Images compressed!', onLast: true}));
};
