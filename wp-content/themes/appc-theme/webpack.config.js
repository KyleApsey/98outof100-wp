// we'll use the concat plugin to create our third-party includes
const ConcatPlugin = require('webpack-concat-plugin');

// create the config
const webappJSConfig = {
	// we have multiple entries
	entry : {
		// the webapp file (global)
		"assets/js/dist/webapp" : "./assets/js/src/main.js",
		// front page
		"assets/js/dist/front-page" : "./assets/js/src/pages/front_page/main.js",
	},
	output : {
		path : __dirname,
		filename : "[name].js"
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: [
							[ '@babel/preset-env', {
								targets : {
									"browsers" : [
										"last 1 version",
										"> 1%",
										"not dead"
									]
								},
								corejs: 3,
								useBuiltIns : "usage"
							}]
						]
					}
				}
			}
		]
	},
	plugins: [
		// the aggregate file for the website frameworks
		new ConcatPlugin({
			uglify: false, // or you can set uglifyjs options
			useHash: false, // md5 file
			sourceMap: false, // generate sourceMap
			name: 'frameworks', // used in html-webpack-plugin
			fileName: 'assets/js/dist/[name].js',
			filesToConcat: [
				__dirname + '/assets/js/src/third-party/stickybits.min.js',
				__dirname + '/assets/js/src/third-party/bodyScrollLock.min.js'
			]
		})
	]
};

// production configurations
if(process.env.NODE_ENV === "production") {
	// minify and uglyfy the javascript
	const UglifyJsPlugin = require('uglifyjs-webpack-plugin')
	webappJSConfig.plugins.push(new UglifyJsPlugin());
}

// export the configs
module.exports = [webappJSConfig];