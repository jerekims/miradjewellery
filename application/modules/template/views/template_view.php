<html>
<head>
  <title>
      Interior Indesign
  </title>
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url().'assets/fonts/labourworks.ico'?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/js/jquery-ui-1.11.4.custom/jquery-ui.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/materialize/css/materialize.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/ionicons/css/ionicons.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/materialize/sass/materialize.scss'?>">
    

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/materialize/css/materialize.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/main.css'?>">
    
  
</head>
<body>
 
    <div class="home-body">
      <div class="top-nav">
          <?php
             $this->load->view($top_navbar1);
          ?>
      </div>
      <div class="left-nav">

      </div>
      <div class="right-body">
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

       

        
   

   <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.3.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-ui-1.11.4.custom/jquery-ui.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/materialize/js/materialize.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/scrollup.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/main.js'?>"></script>

   <script type="text/javascript" src="<?php echo base_url().'assets/materialize/js/materialize.js'?>"></script>
   
</body>
</html>