const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
module.exports = {
    devServer: {
        contentBase: path.join(__dirname, "public"),
        compress: true,
        port: 9000
    },
    entry: {
        frontend: './resources/assets/scss/index.scss',
        index: './resources/assets/typescript/main.ts'
    },
    module: {
        rules: [
            {
                test: /\.tsx?$/,
                use: 'ts-loader',
                exclude: [/node_modules/, /scss/, /\.css$/, /\.scss$/]
            },
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [{
                        loader: 'css-loader',
                        options: {
                            minimize: true
                        }
                    }, 'sass-loader' ]
                })
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin('[name].style.css')
    ],
    resolve: {
        extensions: ['.tsx', '.ts', '.js', '.scss']
    },
    output: {
        filename: '[name].bundle.js',
        chunkFilename: 'vendor.bundle.js',
        path: path.resolve(__dirname, 'public')
    }
};
