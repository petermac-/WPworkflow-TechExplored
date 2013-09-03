'use strict';

module.exports = function(grunt) {
	// load all grunt tasks
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({

		assetsDir: 'assets',
		buildDir: 'dist',
		jsDir: 'js',
		scssDir: 'scss',
		imgDir: 'images',
		fontsDir: 'fonts',
		
		watch: {
			js: {
				files: '<%= jshint.with_overrides.files.src %>',
				tasks: [
					'jshint:with_overrides'
					//'uglify:dev'
				]
			},
			styles: {
				files: ['style.css'],
				tasks: ['autoprefixer']
				//tasks: ['autoprefixer', 'csslint:dev']
			}
		},
		clean: {
			dist: {
				options: {
					"force": true,
					"no-write": false
				},
				files: [{
					dot: true,
					src: [
						'<%= buildDir %>/*',
						'!<%= buildDir %>/.git*',
						'!<%= buildDir %>/README.md'
					]
				}]
			}
		},
		jshint: {
			options: {
				jshintrc: '.jshintrc',
				"force": true
			},
			uses_defaults: [ '<%= assetsDir %>/<%= jsDir %>/source/plugins.js' ],
			//files: [
			//	'Gruntfile.js',
			//	'<%= assetsDir %>/<%= jsDir %>/source/**/*.js'
			//]
			with_overrides: {
			  options: {
			  	devel: true,
			  	browser: false
				},
				files: {
					src: [ '<%= assetsDir %>/<%= jsDir %>/source/main.js' ]
				}
			}
		},
		// not used since Uglify task does concat,
		// but still available if needed
		/*concat: {
			dist: {}
		},*/
		rev: {
			dist: {
				files: {
					src: [
						'<%= buildDir %>/<%= assetsDir %>/<%= jsDir %>/source/{,*/}*.js',
						'<%= buildDir %>/{,*/}*.css',
						'<%= buildDir %>/<%= assetsDir %>/<%= imgDir %>/{,*/}*.{png,jpg,jpeg,gif,webp,svg}'
						//'<%= buildDir %>/<%= fontsDir %>/*'
					]
				}
			}
		},
		autoprefixer: {
			options: {
					browsers: ['last 2 versions', 'ie 8', 'ie 9', 'ie 10']
			},
			dist: {
				/*files: {
						'styleap.css': 'style.css'
				}*/
				expand: true,
				src: ['<%= buildDir %>/*.css'],
				dest: ''
			}
			/*dist: {
					src: '<%= buildDir %>/<%= cssDir %>/main.css',
					dest: '<%= buildDir %>/<%= cssDir %>/main.css'
			}*/
		},
		useminPrepare: {
			html: 'header.html',
			options: {
				dest: '<%= buildDir %>'
			}
		},
		usemin: {
			//html: ['<%= buildDir %>/{,*/}*.php'],
			html: ['<%= buildDir %>/header.html'],
			//css: ['<%= buildDir %>/{,*/}*.css'],
			css: ['<%= buildDir %>/{,*/}*.css'],
			options: {
				dirs: ['<%= buildDir %>', '<%= buildDir %>/images', 'images']
			}
		},
		imagemin: {
			dist: {
				options: {
					optimizationLevel: 7,
					progressive: true
				},
				files: [{
					expand: true,
					cwd: '<%= assetsDir %>/<%= imgDir %>', 
					src: '{,*/}*.{png,jpg,jpeg}',
					dest: '<%= buildDir %>/<%= assetsDir %>/<%= imgDir %>'
				}]
			}
		},
		svgmin: {
			dist: {
				files: [{
					expand: true,
					cwd: '<%= assetsDir %>/<%= imgDir %>',
					src: '{,*/}*.svg',
					dest: '<%= buildDir %>/<%= imgDir %>'
				}]
			}
		},
		csslint: {
			options: {
				'adjoining-classes': false,
				'box-model': false,
				'box-sizing': false,
				'compatible-vendor-prefixes': false,
				'font-sizes': false,
				'gradients': false,
				'important': false,
				'outline-none': false,
				'qualified-headings': false,
				'regex-selectors': false,
				'text-indent': false,
				'unique-headings': false,
				'universal-selector': false,
				'unqualified-attributes': false,
				'known-properties': false,
				absoluteFilePathsForFormatters: true,
					formatters: [
						{id: 'junit-xml', dest: 'report/csslint_junit.xml'},
						{id: 'csslint-xml', dest: 'report/csslint.xml'}
					]
			},
			dev: {
				src: 'style.css',
				"force": true
			},
			dist: {
				src: '<%= buildDir %>/style.css'
			}
		},
		cssmin: {
			// By default, your `index.html` <!-- Usemin Block --> will take care of
			// minification. This option is pre-configured if you do not wish to use
			// Usemin blocks.
		  minify: {
	    	expand: true,
	     	cwd: '<%= buildDir %>/',
	     	src: ['*.css'],
	     	dest: '<%= buildDir %>/'
	     	//ext: '.test'
		  }
		},
		htmlmin: {
			dist: {
				options: {
					removeCommentsFromCDATA: true,
					// https://github.com/yeoman/grunt-usemin/issues/44
					//collapseWhitespace: true,
					collapseBooleanAttributes: true,
					removeAttributeQuotes: false,
					removeRedundantAttributes: true,
					useShortDoctype: true,
					removeEmptyAttributes: true,
					removeOptionalTags: true
				},
				files: [{
					expand: true,
					cwd: '',
					//src: ['*.html', 'views/*.html'],
					src: ['<%= buildDir %>/header.html'],
					dest: ''
				}]
			}
		},
		// Put files not handled in other tasks here
		copy: {
			dist: {
				files: [{
					expand: true,
					dot: true,
					cwd: '',
					dest: '<%= buildDir %>',
					src: [
						'*.{php,html,rtf,ico,png,txt}',
						'.htaccess',
						'bower_components/**/*',
						'<%= assetsDir %>/<%= imgDir %>/{,*/}*.{gif,webp}',
						'<%= assetsDir %>/<%= fontsDir %>/fontello*',
						'<%= assetsDir %>/<%= fontsDir %>/leaguegothic-regular*',
						'<%= assetsDir %>/<%= fontsDir %>/Lato-Bol*',
						'<%= assetsDir %>/<%= jsDir %>/vendor/*',
						//'<%= assetsDir %>/<%= jsDir %>/source/plugins.js',
						'templates/**/*',
						'lib/*'
					]
				}, {
					expand: true,
					cwd: '.tmp/images',
					dest: '<%= buildDir %>/<%= imgDir %>',
					src: [
						'generated/*'
					]
				}]
			}
		},
		uglify: {
				//dist: {
					options: {
						compress: true,
						//report: 'gzip',
						preserveComments: false
						//banner: 'test'
					},
					dist: {
						expand: true,
						src: ['<%= buildDir %>/<%= assetsDir %>/<%= jsDir %>/source/*.js'],
						dest: ''
					}
					/*	files: {
								'<%= buildDir %>/<%= assetsDir %>/<%= jsDir %>/source/plugins.min.js': [
										'<%= buildDir %>/<%= assetsDir %>/<%= jsDir %>/source/plugins.min.js'
										//'<%= assetsDir %>/<%= jsDir %>/vendor/alertify.min.js'
										// '<%= assetsDir %>/<%= jsDir %>/vendor/yourplugin/yourplugin.js',
								],
								'<%= buildDir %>/<%= assetsDir %>/<%= jsDir %>/source/scripts.min.js': [
									'<%= buildDir %>/<%= assetsDir %>/<%= jsDir %>/source/scripts.min.js'
								]
								/*'<%= assetsDir %>/<%= jsDir %>/main.min.js': [
										'<%= assetsDir %>/<%= jsDir %>/source/main.js'
								]*/
						//}
				//}
				/*dev: {
					options: {
						beautify: {
							width: 80,
							beautify: true
						}
					},
					files: {
						'<%= assetsDir %>/<%= jsDir %>/source/plugins.min.js': [
								'<%= assetsDir %>/<%= jsDir %>/source/plugins.js'
								// '<%= assetsDir %>/<%= jsDir %>/vendor/yourplugin/yourplugin.js',
						]
					}
				}*/
		},
		concurrent: {
			dist: [
				'imagemin'
				//'svgmin',
				//'htmlmin'
			]
		}

	});

	grunt.registerTask('build', [
		'clean:dist',
		'useminPrepare',
		'concurrent:dist',
		'concat',
		'copy',
		'rev',
		'usemin',
		'autoprefixer',
		'cssmin',
		'uglify:dist'
	]);

	grunt.registerTask('watchnow', ['watch']);

	grunt.registerTask('default', [
		'csslint',
		'jshint:with_overrides',
		'uglify:dist'
	]);

};
