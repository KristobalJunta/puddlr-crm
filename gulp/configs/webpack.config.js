const path = require('path');
const webpack = require('webpack-stream').webpack;
const config = require('./config');

const NODE_ENV = process.env.NODE_ENV || 'dev';
const dev = NODE_ENV == 'dev';

//convert path array to path object
var entries, filename, i;
  entries = {};

for (i = 0; i < config.input.entry.length; i++){
  name = config.input.entry[i].replace(/^.*[\\\/]/, '');
  name = name.substring(0, name.length - 3);
  entries[name] = config.input.entry[i];
}

//externals
var externals = {
    jquery: 'jQuery'
};

//plugins
var plugins = [];

plugins.push(
    new webpack.ProvidePlugin({
        $: 'jquery',
    })
);
plugins.push(
    //dont save file if build fails
    new webpack.NoErrorsPlugin()
);

//uglify
if (!dev) {
    plugins.push(
        new webpack.optimize.UglifyJsPlugin({
            compress:{
                warnings: true,
                drop_console: true,
                unsafe: true
            }
        })
    );
}


module.exports = {
    devtool: dev ? 'source-map' : null,
    entry: entries,
    output: {
        filename: '[name].js',
        sourceMapFilename: '[name].map'
    },
    module: {
        loaders:[{
            test: /\.js$/,
            loader: 'babel',
            query: {
                presets: ['es2015']
            },
            exclude: /(node_modules|bower_components)/
        }]
    },

    //external modules
    externals: externals,
    plugins: plugins
};
