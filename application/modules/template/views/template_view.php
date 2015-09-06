<html>
<head>
  <title>
      Mirad Jewellerry
  </title>
   <!-- LINK FONTS
    _______________________________________________________________________ -->
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">


    <link rel="icon" type="image/x-icon" href="<?php echo base_url().'assets/fonts/jewel.ico'?>" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/js/jquery-ui-1.11.4.custom/jquery-ui.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sweetalert/lib/sweet-alert.css'?>">
  
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/hover-min.css'?>">
    <link href="<?php echo base_url().'assets/css/owl.carousel.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/responsive.css'?>" rel="stylesheet">
    
    <!-- GOOLE FONTS
    _______________________________________________________________________ -->
      <!-- Google Web Fonts -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
  
</head>
<body>
    <header id="header-area">
        <?php
           $this->load->view($top_navbar1);
        ?>
    </header>
     <div id="main-container-home" style="min-height:500px;">
         <?php 
              $this->load->view($content_page); 
         ?>
      </div>

      <footer id="footer-area">
         <?php
             $this->load->view($main_footer);
         ?>
      </footer>
            
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
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/owl.carousel.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-hover-dropdown.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/scrollup.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/main.js'?>"></script>  
</body>
</html>