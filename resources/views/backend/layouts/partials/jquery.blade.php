
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script type="text/javascript" src="{{ url('backend/js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/js/admin.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script type="text/javascript">
    	var timeout = {!! json_encode(config('define.timeout')) !!};
    </script>
@yield('script')