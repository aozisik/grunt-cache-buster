# Laravel Grunt Cache Buster

This is a simple cache buster for Laravel 4 framework and Grunt task manager.
The package will install grunt-cache-baster npm module automatically (git repo: felthy/grunt-cachebuster). All you have to is add a service provider and configure your Gruntfile.js. **No modification in .htaccess or NGINX configuration is necessary.**

### Configuring Grunt

Add this to your grunt.initConfig

    cachebuster: {
        build: {
          options: {
              basedir: 'public/',
              format: 'php',
              banner:
                  '/**\n' +
                  ' * GENERATED FILE, DO NOT EDIT. This file is simply a collection of generated hashes for static assets in \n' +
                  ' * the project. It is generated by grunt, see Gruntfile.js for details.\n' +
                  ' */'
          },
          src: ['public/**/*'],
          dest: 'app/config/cachebuster.php'
        }
    }
    
And then load the npm task and register it where necessary

	grunt.loadNpmTasks('grunt-cachebuster');
	//..
	//..
	grunt.registerTask('buster', ['cachebuster']);
	
Make sure the cache buster task runs after all the other tasks. It will generate a file in your app/config directory by default. The package depends on this config file to function properly. After you set things up properly, run grunt to generate cachebuster.php

### Configuring Laravel

First you need to add the following service provider in your app/config/app.php:

		'Aozisik\GruntCacheBuster\GruntCacheBusterServiceProvider'
		
Then wherever you want a cache-busted asset you can use the following instead of the default `asset()` helper

	CacheBusted::asset('js/resultsCtrl.js')
	
The code above, used instead of the default asset helper, will yield the following URL:
	
	http://demo.app/js/resultsCtrl.js?v=23d85993f132d67754489e47f66cf6ac
	
## Enjoy!
	
If you have any questions to ask or bugs to report, feel free to contact me...