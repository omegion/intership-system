const path = require('path')

module.exports = {
  module: {
    rules: [
      {
        test: /\.mjs$/i,
        resolve: { byDependency: { esm: { fullySpecified: false } } }
      }
    ]
  },
  resolve: {
    alias: {
      '@': path.resolve('resources/js')
    }
  }
}
