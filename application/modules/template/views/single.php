<html>
<head>
  <title>
      Mirad Jewelries
  </title>
   <!-- LINK FONTS
    _______________________________________________________________________ -->
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">


    <link rel="icon" type="image/x-icon" href="<?php echo base_url().'assets/fonts/jewel.ico'?>" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/js/jquery-ui-1.11.4.custom/jquery-ui.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/skeleton/css/skeleton.css'?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sweetalert/lib/sweet-alert.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.css'?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/main.css'?>">
    
    <!-- GOOLE FONTS
    _______________________________________________________________________ -->

    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
  
</head>
<body>
 <div class="container">
      <div class="top-nav" >
          <?php
             $this->load->view($top_navbar1);
          ?>
      </div>

      <div class="main">
         <?php 
              $this->load->view($content_page); 
         ?>
      </div>
      <div class="home-footer">
         <?php
             $this->load->view($main_footer);
         ?>
      </div>
 </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.3.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-ui-1.11.4.custom/jquery-ui.min.js'?>"></script>
   <script type="text/javascript">$(document).ready(function(){base_url = '<?php echo base_url();?>'});</script>
   <script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/skeleton/js/jquery_magnific_popup.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/jquery.validate.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/sweetalert/lib/sweet-alert.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/jquery.validationEngine-en.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/jquery.validationEngine.js'?>"></script>
   

   <script type="text/javascript" src="<?php echo base_url().'assets/js/scrollup.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/main.js'?>"></script>   
</body>
</html>
