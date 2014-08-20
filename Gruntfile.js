'use strict';

module.exports = function (grunt) {

	// Dynamically load npm tasks

	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		// Banner

		banner: '\n/*\n * Generated with Grunt on <%= grunt.template.today("dd.mm.yyyy") %> at <%= grunt.template.today("H:MM:ss") %>\n */\n',


		///////////////////////////////////////////////////////////

		// Directories

		project: {

			// Cache

			cache: 'public/wp-content/themes/awesome-theme/cache',

			// Scripts

			scripts: [
				'public/wp-content/themes/awesome-theme/js/*.js',
				'public/wp-content/themes/awesome-theme/modules/*/*.js',
				'public/wp-content/themes/awesome-theme/modules/*/skins/*.js'
			],

			scriptsLint: [
				'public/wp-content/themes/awesome-theme/modules/*/*.js',
				'public/wp-content/themes/awesome-theme/modules/*/skins/*.js'
			],

			// Styles

			styles: [
				'public/wp-content/themes/awesome-theme/css/*.less',
				'public/wp-content/themes/awesome-theme/modules/*/*.less',
				'public/wp-content/themes/awesome-theme/modules/*/skins/*.less'
			],

			// Markup

			markup: [
				'public/wp-content/themes/awesome-theme/*.php',
				'public/wp-content/themes/awesome-theme/*.phtml',
				'public/wp-content/themes/awesome-theme/modules/*/*.phtml'
			]
		},


		///////////////////////////////////////////////////////////

		// Styles

		less_imports: {
			all: {
				src : '<%= project.styles %>',
				dest : '<%= project.cache %>/less-imports.less'
			}
		},

		less: {
			options: {
				sourceMap: true,
				sourceMapFilename: '<%= project.cache %>/styles.css.map',
				sourceMapRootpath: '../',
				sourceMapBasepath: 'public/wp-content/themes/awesome-theme/'
			}

			,all: {
				src : '<%= project.cache %>/less-imports.less',
				dest : '<%= project.cache %>/styles.css'
			}
		},

		/**
		 * https://github.com/nDmitry/grunt-autoprefixer
		 */
		autoprefixer: {
			options: {
				cascade: true
			},
			all: {
				src: '<%= project.cache %>/styles.css',
				dest: '<%= project.cache %>/styles.css'
			}
		},

		/**
		 * CSSMin
		 * CSS minification
		 * https://github.com/gruntjs/grunt-contrib-cssmin
		 */
		cssmin: {
			min: {
				options: {
					banner: '<%= banner %>'
				},
				files: {
					'<%= project.cache %>/styles.min.css': '<%= project.cache %>/styles.css'
				}
			}
		},


		///////////////////////////////////////////////////////////

		// Scripts

		jshint: {
			files: '<%=project.scriptsLint%>'
		},

		uglify: {

			dev: {

				options: {
					banner: '<%= banner %>',
					beautify: true,
					sourceMap: true,
				    sourceMapName: '<%=project.cache%>/scripts.js.map'
				},

				files: {
					'<%=project.cache%>/scripts.js': ['<%=project.scripts%>']
				}
			},

			min: {
				options: {
					banner: '<%= banner %>',
					sourceMap: '<%=project.cache%>/scripts.js.map',
					sourceMapRoot: '../',
					sourceMappingURL: 'scripts.min.js.map'
				},

				files: {
					'<%=project.cache%>/scripts.min.js': ['<%=project.scripts%>']
				}
			}
		},

		///////////////////////////////////////////////////////////

		clean: ['<%=project.cache%>/less-imports.less'],

		///////////////////////////////////////////////////////////

		// Watch

		watch: {
			scripts: {
				files: ['Gruntfile.js', '<%= project.scripts %>'],
				tasks: ['scripts-dev']
			},
			styles: {
				files: '<%= project.styles %>',
				tasks: ['styles-dev']
			},
			livereload: {
				options: {
					livereload: 35729
				},
				files: [
					'Gruntfile.js',
					'<%= project.scripts %>',
					'<%= project.styles %>',
					'<%= project.markup %>',
				]
			}
		}
	});


	///////////////////////////////////////////////////////////
	
	// Default - Dev Task

	grunt.registerTask('default', [
		'styles-dev',
		'scripts-dev',
		'watch'
	]);


	// Min - Build Task
	
	grunt.registerTask('min', [
		'styles-min',
		'scripts-min'
	]);


	///////////////////////////////////////////////////////////

	// Sub Tasks

	grunt.registerTask('styles-dev', [
		'less_imports',
		'less',
		'autoprefixer',
		'clean'
	]);

	grunt.registerTask('styles-min', [
		'less_imports',
		'less',
		'autoprefixer',
		'clean',
		'cssmin'
	]);

	grunt.registerTask('scripts-dev', [
		'jshint',
		'uglify:dev'
	]);

	grunt.registerTask('scripts-min', [
		'jshint',
		'uglify:dev',
		'uglify:min'
	]);
};
