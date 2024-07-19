const { override, adjustStyleLoaders } = require('customize-cra');
const path = require('path');

module.exports = override(
  (config) => {
    // Change the output filenames for JS files
    config.output.filename = 'static/js/[name].js';
    config.output.chunkFilename = 'static/js/[name].chunk.js';

    // Change the output filenames for CSS files
    config.plugins.forEach((plugin) => {
      if (plugin.constructor.name === 'MiniCssExtractPlugin') {
        plugin.options.filename = 'static/css/[name].css';
        plugin.options.chunkFilename = 'static/css/[name].chunk.css';
      }
    });

    return config;
  }
);