module.exports = function (grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		banner: '\n/*\n * Generated with Grunt on <%= grunt.template.today("dd.mm.yyyy") %> at <%= grunt.template.today("H:MM:ss") %>\n */\n',

		////////////////////////////////////////////////////////////////////////////////

		// Directories

		dirs: {

			// Styles
			styles: [
				'css/all.scss'
			],

			// Scripts
			scriptsHead: [
				'js/head/*.js',
			],
			scripts: [
				'js/*,js',
				'modules/*/*.js',
				'modules/*/skins/*.js'
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
					'dist/<%= pkg.name %>.min.css': 'css/theme.scss'
				}
		    }
		  },

		uglify: {
			options: {
				banner: '<%= banner %>'
			},
			scriptsHead: {
				options: {
					sourceMap: 'dist/<%= pkg.name %>-head.min.map.js',
					sourceMapRoot: '/',
					sourceMapPrefix: 2,
					sourceMappingURL: '<%= pkg.name %>-head.min.map.js'
				},
				files: {
					'dist/<%= pkg.name %>-head.min.js': ['<%=dirs.scriptsHead%>']
				}
			},
			scripts: {
				options: {
					report: 'gzip',
					sourceMap: 'dist/<%= pkg.name %>.min.map.js',
					sourceMapRoot: '../',
					sourceMappingURL: '<%= pkg.name %>.min.map.js'
				},

				files: {
					'dist/<%= pkg.name %>.min.js': ['<%=dirs.scripts%>']
				}
			}
		}


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
//		watch: {
//			files: ['<%= jshint.files %>'],
//			tasks: ['jshint', 'qunit']
//		}
	});

	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');

	grunt.registerTask('test', ['jshint', 'mocha']);

//	grunt.registerTask('default', ['jshint', 'mocha', 'concat', 'uglify']);
	grunt.registerTask('default', ['sass', 'uglify']);


};