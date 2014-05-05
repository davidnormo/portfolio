module.exports = function(grunt) {

     grunt.initConfig({
          sass: {
               dist: {
                    files: {
                         'www/css/main.css': 'sass/main.scss'
                    }
               }
          },
		  
	      concat: {
		  		options: {
					stripBanners: false,
					banner: '/*! @author David Normington <david.normo@gmail.com> */\n'
				},
				dist: {
					src: ['www/css/main.css', 'www/css/highlight.css', 'www/css/prism.css'],
					dest: 'www/css/final.css'
				}	
		  },
          
	 	  cssmin: {
               minify: {
                    expand: true,
                    cwd: 'www/css/',
                    src: ['final.css'],
                    dest: 'www/css/',
                    ext: '.min.css'
               }
          },
          
		  watch: {
               files: 'sass/*.scss',
               tasks: ['sass','concat','cssmin'],
               options: {
                    spawn: false,
                    livereload: 1337
               }
          }
     });

     grunt.loadNpmTasks('grunt-contrib-sass');
     grunt.loadNpmTasks('grunt-contrib-watch');
     grunt.loadNpmTasks('grunt-contrib-cssmin');
	 grunt.loadNpmTasks('grunt-contrib-concat');

     grunt.registerTask('default', ['sass','concat','cssmin']);
};
