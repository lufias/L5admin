module.exports = function(grunt){

	grunt.initConfig({

	uglify : {
		libs:{
			files:{
				"libs/templibs/ace-extra.min.js":["libs/assets/js/ace-extra.min.js"],
				"libs/templibs/bootstrap.min.js":["libs/assets/js/bootstrap.min.js"],
				"libs/templibs/jquery.2.1.1.min.js":["libs/assets/js/jquery.2.1.1.min.js"],
				"libs/templibs/angular.min.js":["bower_components/angular/angular.min.js"],
				"libs/templibs/ace-elements.min.js":["libs/assets/js/ace-elements.min.js"],
				"libs/templibs/bootbox.min.js":["libs/assets/js/bootbox.min.js"],
				"libs/templibs/ace.min.js":["libs/assets/js/ace.min.js"],
				"libs/templibs/chosen.jquery.min.js":["bower_components/chosen/chosen.jquery.min.js"]
			}
		}
	},

	concat:{
		options:{
			separator:';'
		},
		libs:{		    	
	    	src:[
	    		'libs/templibs/ace-extra.min.js',
	    		'libs/templibs/jquery.2.1.1.min.js',
	    		'libs/templibs/bootstrap.min.js',
	    		'libs/templibs/angular.min.js',
	    		'libs/templibs/ace-elements.min.js',
	    		'libs/templibs/ace.min.js',
	    		'libs/templibs/bootbox.min.js',
	    		'libs/templibs/chosen.jquery.min.js'

	    	],
	    	dest: 'libs/dist/libs.js'
	    },
	    css:{
	    	options:{
	    		sourceMap: true
	    	},
	    	src:[
	    		'css/temp/lib.css',
	    		'css/temp/style.css'		    		
	    	],
	    	dest: 'css/dist/style.css'
	    }

	},

	cssmin: {
		options: {
			shorthandCompacting: false,
			roundingPrecision: -1
		},
		lib: {
			files: {
				'css/temp/lib.css': [
				'libs/assets/css/bootstrap.min.css',				
				'bower_components/chosen/chosen.min.css',
				'libs/assets/fonts/fonts.googleapis.com.css'				
				]
			}
		},
		app: {
			files: {
				'css/temp/style.css': ['css/src/style.css']
			}
		}
	}
		

	});

	grunt.loadNpmTasks("grunt-contrib-clean");
	grunt.loadNpmTasks("grunt-browserify");	
	grunt.loadNpmTasks("grunt-ng-annotate");
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');	
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-cssmin');	

	grunt.registerTask('build', [		
		'uglify:libs',
		'concat:libs',
		'cssmin',
		'concat:css'
	]);

};


