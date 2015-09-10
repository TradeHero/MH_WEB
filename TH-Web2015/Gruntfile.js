module.exports = function(grunt) {
  var config = {
    src: 'src',
    bower: 'bower_components'
  };

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    config: config,
    jshint: {
      build: {
        options: {
          force: true,
        },
        files: {
          src:['<%= config.src %>/js/global.js']
        }
      }
    },
    cssmin: {
      options: {
        sourceMap: true,
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        files: {
          '<%= config.src %>/css/screen.min.css': [
            '<%= config.bower %>/fullpage/jquery.fullPage.css',
            '<%= config.bower %>/jquery-ui/themes/base/core.css',
            '<%= config.bower %>/jquery-ui/themes/base/menu.css',
            '<%= config.bower %>/jquery-ui/themes/base/selectmenu.css',
            '<%= config.bower %>/jquery-ui/themes/base/slider.css',
            '<%= config.bower %>/jquery-ui/themes/base/tabs.css',
            '<%= config.bower %>/jquery-ui/themes/base/accordion.css',
            '<%= config.bower %>/jquery-ui/themes/base/theme.css',
            '<%= config.bower %>/magnific-popup/dist/magnific-popup.css',
            '<%= config.src %>/css/vendors/{,*/}*.css',
            '<%= config.src %>/css/screen.css'
          ],
          '<%= config.src %>/css/icons.png.min.css': ['<%= config.src %>/css/icons.png.css'],
          '<%= config.src %>/css/icons.svg.min.css': ['<%= config.src %>/css/icons.svg.css'],
          '<%= config.src %>/css/icons.fallback.min.css': ['<%= config.src %>/css/icons.fallback.css']
        }
      }
    },
    uglify: {
      options: {
        sourceMap: true,
        mangle: false,
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        files: [{
          '<%= config.src %>/js/global.min.js': [
            '<%= config.bower %>/fullpage/jquery.fullPage.min.js',
            '<%= config.bower %>/magnific-popup/dist/jquery.magnific-popup.min.js',
            '<%= config.bower %>/jquery-ui/ui/minified/core.min.js',
            '<%= config.bower %>/jquery-ui/ui/minified/widget.min.js',
            '<%= config.bower %>/jquery-ui/ui/minified/mouse.min.js',
            '<%= config.bower %>/jquery-ui/ui/minified/position.min.js',
            '<%= config.bower %>/jquery-ui/ui/minified/menu.min.js',
            '<%= config.bower %>/jquery-ui/ui/minified/selectmenu.min.js',
            '<%= config.bower %>/jquery-ui/ui/minified/slider.min.js',
            '<%= config.bower %>/jquery-ui/ui/minified/tabs.min.js',
            '<%= config.bower %>/artTemplate/dist/template.js',
            '<%= config.bower %>/jquery-validation/dist/jquery.validate.min.js',
            '<%= config.bower %>/jquery-form/jquery.form.js',
            '<%= config.bower %>/Autolinker.js/dist/Autolinker.min.js',
            '<%= config.bower %>/jQuery-ajaxTransport-XDomainRequest/jquery.xdomainrequest.min.js',
            '<%= config.src %>/js/jquery.tagcanvas.min.js',
            '<%= config.src %>/js/components/*.js',
            '<%= config.src %>/js/global.js'
          ]
        }, {
          '<%= config.src %>/js/grunticon.loader.min.js': [
            '<%= config.src %>/js/grunticon.loader.js'
          ]
        }, {
          '<%= config.src %>/js/plugins.min.js': [
            '<%= config.src %>/js/plugins.js'
          ]
        }, {
          '<%= config.src %>/js/beetle.min.js': [
            '<%= config.src %>/js/beetle.js'
          ]
        },]
      }
    },
    watch: {
      js: {
        files: ['<%= config.src %>/js/{**/,}*.js'],
        tasks: ['uglify', 'jshint']
      },
      css: {
        files: ['<%= config.src %>/css/{**/,}*.css'],
        tasks: ['cssmin']
      }
    }
  });

  require('load-grunt-tasks')(grunt);

  // Default task(s).
  grunt.registerTask('default', [
    'build',
    'watch'
  ]);

  grunt.registerTask('build', [
    'cssmin',
    'uglify',
    'jshint'
  ]);
};