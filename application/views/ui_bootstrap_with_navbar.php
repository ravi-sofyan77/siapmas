<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome to CodeIgniter</title>
  <link rel="stylesheet" type="text/css" 
    href="<?php echo base_url('assets/css/bootstrap.min.css');?>" />
  <link rel="stylesheet" type="text/css" 
    href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>" />
  <link rel="stylesheet" type="text/css" 
    href="<?php echo base_url('assets/css/bootstrap-datepicker3.min.css');?>" />
  <link rel="stylesheet" type="text/css" 
    href="<?php echo base_url('assets/css/bootstrap-notifications.min.css');?>" />
  <link rel="stylesheet" type="text/css" 
    href="<?php echo base_url('assets/custom/css/sticky-footer-navbar.css');?>" />
  
    
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/easy-autocomplete/css/easy-autocomplete.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/easy-autocomplete/css/easy-autocomplete.themes.min.css');?>">
  
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('/');?>">
              <?php echo (isset($is))? ucfirst($is) : '' ;?>
            </a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <?php 
                    if (function_exists('render_top_navigation') && isset($navigasi)) {
                        render_top_navigation($navigasi);
                    }
                ?>
            </ul>
            <form class="navbar-form navbar-right">
        <a  href="<?php echo site_url($me.'/logout');?>" class="btn btn-default">
          <i class="glyphicon glyphicon-log-out"> </i>Keluar
        </a>
      </form>
            <ul class="nav navbar-nav navbar-right">
              <li>
          <a href="<?php echo site_url($me.'/detail_pribadi');?>">
            <?php echo (isset($username))? 'Hai ! '.$username : 'Anonymous';?>
          </a>
        </li>
      </ul>
            <div class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav navbar-right nav-bell">
            <li class="dropdown dropdown-notifications">
                <a href="#" class="dropdown-toggle" id="list-notif-lg" data-toggle="dropdown">
                    <i data-count="<?php echo (isset($notif_count))? $notif_count : 0;?>" 
                      class="glyphicon glyphicon-bell notification-icon"></i>
                </a>
                <div class="dropdown-container" aria-labelledby="list-notif-lg">
                  <div class="dropdown-toolbar">
                    <div class="dropdown-toolbar-actions">
                        <a href="#">Mark all as read</a>
                    </div>
                    <h3 class="dropdown-toolbar-title">
                      Notifications (<?php echo (isset($notif_count))? $notif_count : 0;?>)
                    </h3>
                  </div><!-- /dropdown-toolbar -->
          
            <ul class="dropdown-menu notifications">
              <?php echo (isset($notif_items))? $notif_items : '';?>
              </ul>
                  <div class="dropdown-footer text-center">
                    <a href="#">View All</a>
                  </div><!-- /dropdown-footer -->
                </div><!-- /dropdown-container -->
              </li>
            </ul>

            </div>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

<div class="container" >
  <div class="row">
    <div class="col-xs-12">
      <?php echo (isset($alert))? $alert : '' ;?>
      <?php echo (isset($content))? $content : '' ;?> 
    </div>
  </div>
  


</div>
    <footer class="footer">
      <div class="text-center">
          <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php 
            if (ENVIRONMENT === 'development') {
              echo 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>';
            }
          ?></p>

      </div>
      <div style="display: none;">
          <p class="url-religions"><?php echo site_url('json/get_religions/');?></p>
          <p class="url-pekerjaan"><?php echo site_url('json/get_pekerjaan/');?></p>
          <p class="url-person"><?php echo site_url('json/get_nik/');?></p>
      </div>
</footer>

<script type="text/javascript">
     var base_url = '<?php echo base_url(); ?>';
</script>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/js/moment.min.js');?>"> </script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js');?>"> </script>

<script type="text/javascript" 
  src="<?php echo base_url('assets/easy-autocomplete/js/jquery.easy-autocomplete.min.js');?>"> </script>

<script type="text/javascript" src="<?php echo base_url('assets/custom/js/ibm.simpelhd.easy-autocomplete.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/anggota_keluarga.js');?>"></script>

<!--<script type="text/javascript" src="<?php //echo base_url('assets/custom/js/jvm.apek.js');?>"></script>-->
<script type="text/javascript" src="<?php echo base_url('assets/custom/js/ibm.simpelhd.js');?>"></script>

</body>
</html>

