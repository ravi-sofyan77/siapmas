<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Aplikasi Penggajian Karyawan</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url('assets/');?>dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/');?>font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/');?>css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="bg-black">
        
        <?php echo (isset($alert))? $alert : '' ;?>
        <div class="form-box" id="login-box">
        <?php echo (isset($content))? $content : '' ;?>
        </div>

        <script src="<?php echo base_url('assets/');?>dist/jquery.js"></script>
        <script src="<?php echo base_url('assets/');?>dist/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>