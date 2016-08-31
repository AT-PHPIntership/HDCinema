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
      'AdminLTE/plugins/datatables/jquery.dataTables.min.js',
      'AdminLTE/plugins/datatables/dataTables.bootstrap.min.js',
      'AdminLTE/plugins/morris/morris.min.js',
      'AdminLTE/plugins/knob/jquery.knob.js',
      'AdminLTE/plugins/daterangepicker/daterangepicker.js',
      'AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
      'AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
      'AdminLTE/plugins/fastclick/fastclick.js',
      'AdminLTE/dist/js/app.min.js',
      'AdminLTE/dist/js/demo.js',
    ],
    'public/backend/js/vendor.js',
    'vendor/bower_dl'
  );
// Compile css
  mix.styles([
  	  'AdminLTE/bootstrap/css/bootstrap.min.css',
  	  'font-awesome/css/font-awesome.min.css',
      'ionicons/css/ionicons.min.css',
      'AdminLTE/plugins/datatables/dataTables.bootstrap.css',
      'AdminLTE/dist/css/AdminLTE.min.css',
      'AdminLTE/dist/css/skins/_all-skins.min.css',
      'AdminLTE/plugins/datepicker/datepicker3.css',
      'AdminLTE/plugins/daterangepicker/daterangepicker.css',
  ], 
    'public/backend/css/vendor.css',
    'vendor/bower_dl'
  );
});
