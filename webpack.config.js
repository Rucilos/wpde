const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const IgnoreEmitPlugin = require('ignore-emit-webpack-plugin')

module.exports = {
    watch: true,
    watchOptions: {
        ignored: /node_modules/,
    },
    mode: 'production',
    entry: {
        admin: './src/js/admin.js',
        login: './src/js/login.js',
        public: './src/js/public.js',
        cc: './src/js/cc.js',
        admin_styles: './src/scss/admin.scss',
        login_styles: './src/scss/login.scss',
        public_styles: './src/scss/public.scss',
    },
    output: {
        filename: 'js/[name].min.js',
        path: __dirname + '/dist',
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            modules: false,
                        },
                    },
                    { loader: 'sass-loader' },
                ],
            },
        ],
    },
    plugins: [new MiniCssExtractPlugin({ filename: 'css/[name].min.css' }), new IgnoreEmitPlugin(['public_styles.min.js', 'admin_styles.min.js', 'login_styles.min.js'])],
}
