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

			// built

			built: 'public/wp-content/themes/awesome-theme/built',

			// Scripts

			scripts: [
				'bower_components/jquery/dist/jquery.js',
				'bower_components/modernizr/modernizr.js',
				'bower_components/terrificjs/dist/terrific.js',
				'bower_components/terrific-extensions/terrific-extensions.js',
				'bower_components/picturefill/dist/picturefill.js',

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
				'bower_components/normalize.css/normalize.css',
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
				dest : '<%= project.built %>/less-imports.less'
			}
		},

		less: {
			options: {
				sourceMap: true,
				sourceMapFilename: '<%= project.built %>/styles.css.map',
				sourceMapRootpath: '../',
				sourceMapBasepath: 'public/wp-content/themes/awesome-theme/'
			}

			,all: {
				src : '<%= project.built %>/less-imports.less',
				dest : '<%= project.built %>/styles.css'
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
				src: '<%= project.built %>/styles.css',
				dest: '<%= project.built %>/styles.css'
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
					'<%= project.built %>/styles.min.css': '<%= project.built %>/styles.css'
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
				    sourceMapName: '<%=project.built%>/scripts.js.map'
				},

				files: {
					'<%=project.built%>/scripts.js': ['<%=project.scripts%>']
				}
			},

			min: {
				options: {
					banner: '<%= banner %>',
					sourceMap: '<%=project.built%>/scripts.js.map',
					sourceMapRoot: '../',
					sourceMappingURL: 'scripts.min.js.map'
				},

				files: {
					'<%=project.built%>/scripts.min.js': ['<%=project.scripts%>']
				}
			}
		},

		///////////////////////////////////////////////////////////

		clean: ['<%=project.built%>/less-imports.less'],

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
