var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // Combine scripts
  mix.scripts([ 
      'AdminLTE/plugins/jQuery/jquery-2.2.3.min.js',
      'AdminLTE/plugins/jQueryUI/jquery-ui.min.js',
      'AdminLTE/bootstrap/js/bootstrap.min.js',
      'AdminLTE/plugins/morris/morris.min.js',
      'AdminLTE/plugins/sparkline/jquery.sparkline.min.js',
      'AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
      'AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
      'AdminLTE/plugins/knob/jquery.knob.js',
      'AdminLTE/plugins/daterangepicker/daterangepicker.js',
      'AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
      'AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
      'AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
      'AdminLTE/plugins/fastclick/fastclick.js',
      'AdminLTE/dist/js/app.min.js',
      'AdminLTE/dist/js/pages/dashboard.js',
      'AdminLTE/dist/js/demo.js',
      'moment/min/moment.min.js',
      'raphael/raphael.min.js'
    ],
    'public/backend/js/vendor.js',
    'vendor/bower_dl'
  );
// Compile css
  mix.styles([
  	  'AdminLTE/bootstrap/css/bootstrap.min.css',
  	  'font-awesome/css/font-awesome.min.css',
      'ionicons/css/ionicons.min.css',
      'AdminLTE/dist/css/AdminLTE.min.css',
      'AdminLTE/dist/css/skins/_all-skins.min.css',
      'AdminLTE/plugins/iCheck/flat/blue.css',
      'AdminLTE/plugins/morris/morris.css',
      'AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
      'AdminLTE/plugins/datepicker/datepicker3.css',
      'AdminLTE/plugins/daterangepicker/daterangepicker.css',
      'AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' 
  ], 
    'public/backend/css/vendor.css',
    'vendor/bower_dl'
  );
});
