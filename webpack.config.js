module.exports = {
  entry: './frontend/index.js',
  output: {
    filename: './web/assets/js/bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [ 'style-loader', 'css-loader' ]
      },
      {
        test: /\.png$/,
        use: { loader: 'url-loader', options: { limit: 100000 } },
      },
      {
        test: /\.jpg$/,
        use: [ 'file-loader' ]
      }
    ]
  }
}
