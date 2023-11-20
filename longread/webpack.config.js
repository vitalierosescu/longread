const HtmlWebPackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const postcssPresetEnv = require('postcss-preset-env');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');

module.exports = (env, {mode}) => {
  console.log(mode);

  const plugins = [
    new HtmlWebPackPlugin({
      template: './src/index.html',
      filename: './index.html'
    }),
    new MiniCssExtractPlugin({
      filename: 'style.css'
    }),
    new OptimizeCSSAssetsPlugin()
  ];

  if (mode === 'production') {
    const HtmlCriticalWebpackPlugin = require('html-critical-webpack-plugin');
    const path = require('path');
    plugins.push(
      new HtmlCriticalWebpackPlugin({
        base: path.resolve(__dirname, 'dist'),
        src: 'index.html',
        dest: 'index.html',
        inline: true,
        minify: true,
        extract: true,
        width: 1500, // standaard op 375x565, maar niet voldoende om op desktop 100% te scoren
        height: 700,
        penthouse: {
          blockJSRequests: false
        }
      })
    );
  } else {
    const webpack = require('webpack');
    plugins.push(new webpack.HotModuleReplacementPlugin());
  }

  return {
    output: {
      filename: 'index.js'
    },
    devServer: {
      overlay: true,
      hot: true
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: {
            loader: 'babel-loader'
          }
        },
        {
          test: /\.html$/,
          use: [
            {
              loader: 'html-srcsets-loader',
              options: {
                attrs: [':src', ':srcset']
              }
            }
          ]
        },
        {
          test: /\.(jpe?g|png|svg|webp|woff|woff2)$/,
          use: {
            loader: 'url-loader',
            options: {
              limit: 1000,
              context: './src',
              name: '[path][name].[ext]'
            }
          }
        },
        {
          test: /\.css$/,
          use: [
            mode === 'production'
              ? MiniCssExtractPlugin.loader
              : 'style-loader',
            'css-loader',
            'resolve-url-loader',
            {
              loader: 'postcss-loader',
              options: {
                sourceMap: true,
                plugins: [
                  require('postcss-import'),
                  require('postcss-will-change'),
                  postcssPresetEnv({stage: 0})
                ]
              }
            }
          ]
        }
      ]
    },
    plugins
  };
};
