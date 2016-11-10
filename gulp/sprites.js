'use strict';
const merge = require('merge-stream');

module.exports = (gulp, plugins, config) => () => {
  var streams = [];
  var tmp, merged;
  config.input.sprites.forEach(function(sprite) {

    tmp = gulp.src(sprite.src)
      .pipe(plugins.spritesmith({
        imgName: `${config.input.images}/${sprite.outName}.png`,
        cssName: `${config.output.scss}/sprites/${sprite.outName}.scss`,
        //imgPath: config.input.images + '/sprites/' + sprite.outName + '.png',
        cssOpts: {
          functions: false
        },
        cssVarMap: function(sprite) {
          sprite.name = `icon-${sprite.name}`
        },
        algorithm: 'top-down',
        padding: 10
      }))
      .pipe(gulp.dest('./'));

    streams.push(tmp);
  });

  // merge sprites streams
  merged = merge();

  streams.forEach(function(stream) {
    merged.add(stream);
  });

  return merged;
}
