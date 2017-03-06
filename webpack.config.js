var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  entry: './frontend/index.js',
  output: {
    filename: './web/assets/js/bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
          use: 'css-loader'
        })
      },
      {
        test: /\.png$/,
        use: { loader: 'url-loader', options: { limit: 100000 } },
      },
      {
        test: /\.jpg$/,
        use: [ 'file-loader' ]
      },
      {
        test: /\.mustache$/,
        use: [ 'raw-loader' ]
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin('./web/assets/css/bundle.css'),
  ]
}
