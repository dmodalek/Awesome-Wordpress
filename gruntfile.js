module.exports = function (grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		banner: '\n/*\n * Generated with Grunt on <%= grunt.template.today("dd.mm.yyyy") %> at <%= grunt.template.today("H:MM:ss") %>\n */\n',

		////////////////////////////////////////////////////////////////////////////////

		// Directories

		dirs: {

			// Styles
			styles: [
				'css/*.scss',
				'modules/*/*.scss',
				'modules/*/skins/*.scss',
				'layout/*.scss',
				'layout/skins/*.scss',
			],

			sass: [
				'css/import.scss' // Sass wants us to import all the .scss files instead of globbing them via Grunt
			],

			// Scripts
			scripts: [
				'js/*.js',
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

//		concat: {
//			styles: {
//				src: ['<%=dirs.styles%>'],
//				dest: 'dist/<%= pkg.name %>.css'
//			},
//
//			scripts: {
//				options: {
//					separator: ';'
//				},
//				src: ['<%=dirs.scripts%>'],
//				dest: 'dist/<%= pkg.name %>.js'
//			}
//		},

		sass: {
			dist: {
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

		uglify: {
			options: {
				banner: '<%= banner %>'
			},
			scripts: {
				options: {
					sourceMap: 'dist/<%= pkg.name %>.min.map.js',
					sourceMapRoot: '../',
					sourceMappingURL: '<%= pkg.name %>.min.map.js'
				},

				files: {
					'dist/<%= pkg.name %>.min.js': ['<%=dirs.scripts%>']
				}
			}
		},

//		jshint: {
//			files: ['Gruntfile.js', 'src/**/*.js', 'test/**/*.js'],
//			options: {
//				// options here to override JSHint defaults
//				globals: {
//					jQuery: true,
//					console: true,
//					module: true,
//					document: true
//				}
//			}
//		},
		watch: {
			options: {
				livereload: true
			},
			files: ['Gruntfile.js', '<%= dirs.styles %>', '<%= dirs.scripts %>', '<%= dirs.markup %>'],
			tasks: ['sass', 'uglify']
		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');

	grunt.registerTask('test', ['jshint', 'mocha']);

//	grunt.registerTask('default', ['jshint', 'mocha', 'concat', 'uglify']);
	grunt.registerTask('default', ['sass', 'watch']);


};