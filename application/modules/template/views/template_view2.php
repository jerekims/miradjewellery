<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Jewels for all">
    <meta name="author" content="mirad-designers">

    <title>Admin</title>


    <link rel="icon" type="image/x-icon" href="<?php echo base_url().'assets/fonts/jewel.ico'?>" />
    <link href="<?php echo base_url(). 'assets/css/morris.css'?>" rel="stylesheet">
    <link href="<?php echo base_url(). 'assets/fonts/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/js/jquery-ui-1.11.4.custom/jquery-ui.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/ionicons/css/ionicons.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sweetalert/lib/sweet-alert.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.css'?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    
    <link href="<?php echo base_url(); ?>assets/js/DataTables-1.10.2/css/data-table.css" rel="stylesheet" />

    <link href="<?php echo base_url(). 'assets/css/admin.css'?>" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
    <div class="admin-header">
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <?php 
               $this->load->view($admin_navbar);
          ?>
      
          <?php 
               $this->load->view($admin_sidebar);
          ?>
           <!-- /.navbar-collapse -->
       </nav>
    </div>
    <?php echo validation_errors(); ?>
    <div class="admin-body">
        <?php 
             $this->load->view($admin_content);
        ?>
    </div>
    <div class="admin-footer">
        <?php 
             $this->load->view($admin_footer);
        ?>
    </div>

        

    </div>
    <!-- /#wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url(). 'assets/js/jquery.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.3.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-ui-1.11.4.custom/jquery-ui.min.js'?>"></script>
   <script type="text/javascript">$(document).ready(function(){base_url = '<?php echo base_url();?>'});</script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/jquery.validate.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/sweetalert/lib/sweet-alert.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/jquery.validationEngine-en.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/jquery.validationEngine.js'?>"></script>
   <script type="text/javascript"src="<?php echo base_url() .'assets/js/scrollUp.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
   <script src="<?php echo base_url(); ?>assets/js/DataTables-1.10.2/js/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/DataTables-1.10.2/js/data-table.js"></script>
    <script>
            $('#category-table').dataTable();
            $('#orders-table').dataTable();

            $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
            $('.dataTables_length select').addClass('form-control');
    </script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/admin.js'?>"></script>

</body>

</html>
