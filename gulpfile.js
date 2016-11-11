'use strict';

const gulp = require('gulp');
const plugins = require('gulp-load-plugins')();
const config = require('./gulp/configs/config');

var tasks = [
  'bower-dependencies',
  'build-js',
  'build-scss',
  'sprites',
  'images',
  'watch'
];

//register tasks
tasks.forEach(function(task){
  gulp.task(task, require(`./gulp/${task}`)(gulp, plugins, config));
});

gulp.task('build',
  gulp.parallel(
    'bower-dependencies',
    'build-js',
    'build-scss',
    gulp.series('sprites','images')
  )
);
gulp.task('default', gulp.series('build', 'watch'));
