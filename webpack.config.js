const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const IgnoreEmitPlugin = require('ignore-emit-webpack-plugin');

module.exports = {
    watch: true,
    watchOptions: {
        ignored: /node_modules/,
    },
    mode: "production",
    entry: {
        public: "./src/js/public.js",
        admin: "./src/js/admin.js",
        login: "./src/js/login.js",
        public_styles: "./src/sass/public.scss",
        admin_styles: "./src/sass/admin.scss",
        login_styles: "./src/sass/login.scss",
    },
    output: {
        filename: "js/[name].min.js",
        path: __dirname + "/dist",
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: "css-loader",
                        options: {
                            modules: false,
                        },
                    },
                    { loader: "sass-loader" },
                ],
            },
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({ filename: 'css/[name].min.css' }),
        new IgnoreEmitPlugin(['public_styles.min.js', 'admin_styles.min.js', 'login_styles.min.js'])
    ],
}
