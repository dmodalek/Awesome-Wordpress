module.exports = function (grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		banner: '\n/*\n * Generated with Grunt on <%= grunt.template.today("dd.mm.yyyy") %> at <%= grunt.template.today("H:MM:ss") %>\n */\n',

		////////////////////////////////////////////////////////////////////////////////

		// Directories

		dirs: {

			// Styles
			styles: [
				'frontend/css/*.scss',
				'modules/*/*.scss',
				'modules/*/skins/*.scss',
				'layout/*.scss',
				'layout/skins/*.scss',
			],

			sass: [
				'frontend/css/import.scss' // Sass wants us to import all the .scss files instead of globbing them via Grunt
			],

			// Scripts
			scripts: [
				'frontend/js/*.js',
				'modules/*/*.js',
				'modules/*/skins/*.js',
				'layout/*.js',
				'layout/skins/*.js'
			],

			scriptsLint: [
				'modules/*/*.js',
				'modules/*/skins/*.js',
				'layout/*.js',
				'layout/skins/*.js'
			],

			// Markup
			markup: [
				'*.php',
				'modules/*/*.phtml',
				'inc/*.php'
			]
		},

		sass: {

			dev: {
				options: {
					style: 'nested',
					sourcemap: true,
					require: 'sass-globbing'
				},
				files: {
					'dist/<%= pkg.name %>.css': '<%=dirs.sass%>'
				}
			},

			prod: {
				options: {
					style: 'compressed',
					sourcemap: true,
					require: 'sass-globbing'
				},
				files: {
					'dist/<%= pkg.name %>.min.css': '<%=dirs.sass%>'
				}
			}
		},

		jshint: {
			files: ['gruntfile.js', '<%=dirs.scriptsLint%>'],
			options: {
				// options here to override JSHint defaults
				globals: {
					jQuery: true,
					console: false,
					module: true,
					document: true
				}
			}
		},

		uglify: {

			dev: {
				options: {
					banner: '<%= banner %>',
					beautify: true,
					sourceMap: 'dist/<%= pkg.name %>.map.js',
					sourceMapRoot: '../',
					sourceMappingURL: '<%= pkg.name %>.map.js'
				},

				files: {
					'dist/<%= pkg.name %>.js': ['<%=dirs.scripts%>']
				}
			},

			prod: {
				options: {
					banner: '<%= banner %>',
					beautify: true,
					sourceMap: 'dist/<%= pkg.name %>.min.map.js',
					sourceMapRoot: '../',
					sourceMappingURL: '<%= pkg.name %>.min.map.js'
				},

				files: {
					'dist/<%= pkg.name %>.min.js': ['<%=dirs.scripts%>']
				}
			}
		},

		watch: {
			options: {
				livereload: true
			},
			files: ['gruntfile.js', '<%= dirs.styles %>', '<%= dirs.scripts %>', '<%= dirs.markup %>'],
			tasks: ['dev']
		}
	});

	// load all grunt tasks matching the `grunt-*` pattern
	require('load-grunt-tasks')(grunt);

	// Default
	grunt.registerTask('default', ['dev', 'watch']);

	// Dev
	grunt.registerTask('dev', ['sass:dev', 'jshint', 'uglify:dev']);

	// Prod
	grunt.registerTask('prod', ['sass:prod', 'jshint', 'uglify:prod']);
};
