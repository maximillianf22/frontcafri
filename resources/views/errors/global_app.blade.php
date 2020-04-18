<script type="text/javascript">
  $(document).ready(function() {
    /*-- Danger --*/
    if ("{{Session::has('danger')}}") {
          $.toast({
               heading: 'Error. ',
               text: '{{Session::get('danger')}}',
               position: 'top-right',
               loaderBg: '#ff6849',
               icon: 'error',
               hideAfter: 8500,
               stack: 6
          });
          {{Session::forget('danger')}}
    }
    /*-- Advertencia --*/
    if ("{{Session::has('warning')}}") {
          $.toast({
               heading: 'Error. ',
               text: '{{Session::get('warning')}}',
               position: 'top-right',
               loaderBg: '#ff6849',
               icon: 'warning',
               hideAfter: 8500,
               stack: 6
          });
          {{Session::forget('warning')}}
    }
    /*-- success --*/
    if ("{{Session::has('success')}}") {
          $.toast({
               heading: '',
               text: '{{Session::get('success')}}',
               position: 'top-right',
               loaderBg: '#ff6849',
               icon: 'success',
               hideAfter: 8500,
               stack: 6
          });
          {{Session::forget('success')}}
    }
    /*-- info --*/
    if ("{{Session::has('info')}}") {
          $.toast({
               heading: 'Informacion ',
               text: '{{Session::get('info')}}',
               position: 'top-right',
               loaderBg: '#ff6849',
               icon: 'info',
               hideAfter: 8500,
               stack: 6
          });
          {{Session::forget('info')}}
    }

  });
</script>
