module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			dist: {
				src: [
					'js/libs/*.js', // All JS in the libs folder
					'js/*.js'  // All JS in the js folder
					
				],
				dest: 'js/build/development.js'
			}
		},

		uglify: {
			build: {
				src: 'js/build/development.js',
				dest: 'js/build/production.min.js'
			}
		},

		imagemin: {
			png: {
		      options: {
		        optimizationLevel: 7
		      },
		      files: [
		        {
		          // Set to true to enable the following options…
		          expand: true,
		          // cwd is 'current working directory'
		          cwd: 'images/',
		          src: ['*.png'],
		          // Could also match cwd line above. i.e. project-directory/img/
		          dest: 'images/build/',
		          ext: '.png'
		        }
		      ]
		    },
		    jpg: {
		      options: {
		        progressive: true
		      },
		      files: [
		        {
		          // Set to true to enable the following options…
		          expand: true,
		          // cwd is 'current working directory'
		          cwd: 'images/',
		          src: ['*.jpg'],
		          // Could also match cwd. i.e. project-directory/img/
		          dest: 'images/build/',
		          ext: '.jpg'
		        }
		      ]
		    }
		},

		sass: {
			dist: {
				options: {
					style: 'compressed'
				},
				files: {
					'css/production.min.css': 'sass/styles.scss'
				}
			}
		},

		autoprefixer: {
			single_file: {
		    	src: 'css/production.min.css',
		    	dest: 'css/production.min.css'
		    }
		},

		watch: {
			options: {
				livereload: true
			},
			scripts: {
				files: ['js/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false
				}
			},
			images: {
				files: ['images/*.{png,jpg}'],
				tasks: ['imagemin'],
				options: {
					spawn: false
				}
			},
			css: {
				files: ['sass/*.scss', 'sass/*/*.scss'],
				tasks: ['sass', 'autoprefixer'],
				options: {
					spawn: false
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'sass', 'autoprefixer', 'watch']);

};