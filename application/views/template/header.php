<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title><?php echo (isset($titulo) and $titulo != "") ? $titulo . " | " : ""; ?>INEI</title>
   <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <?php echo put_headersCss() ?>
   <script type="text/javascript">
      var CI = {
         'base_url' : '<?php echo base_url(); ?>',
         'site_url' : '<?php echo site_url(); ?>'
      };
   </script>
   <script src="<?php echo base_url('assets/js/jquery.min.js') ?>" ></script>
   <?php echo put_headersJs_() ?>
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
   <script type="text/javascript">
   $(document).on('ready', function () {
      var url = window.location;
      //console.log(url);
      var rutaMain = $('#main-nav a[href="' + url + '"]');
      rutaMain.parent().addClass('active');
      rutaMain.parent().parent('ul.treeview-menu').css('display', 'block');
      rutaMain.parent().parent('ul.treeview-menu').parent('li.treeview').addClass('active');
      $('#main-nav a').filter(function () {
         return this.href === url;
      }).parent().addClass('active');
   });
   </script>
   </head>
   <body >
      <div class="wrapper">

