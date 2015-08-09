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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/validationEngine.jquery.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sweetalert/lib/sweet-alert.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/animate.css'?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.0/css/dataTables.responsive.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css">
    <link rel="stylesheet" type="text/css" href="https: //cdn.datatables.net/scroller/1.2.2/css/dataTables.scroller.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src = "https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src = "https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
    <script type="text/javascript" src = "https://cdn.datatables.net/fixedcolumns/3.0.4/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src = "https://cdn.datatables.net/responsive/1.0.6/css/dataTables.responsive.css"></script>
    <script type="text/javascript" src = "https://cdn.datatables.net/scroller/1.2.2/js/dataTables.scroller.min.js"></script>



    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    
    <!-- <link href="<?php echo base_url(); ?>assets/js/DataTables-1.10.2/css/data-table.css" rel="stylesheet" /> -->

    <link href="<?php echo base_url(). 'assets/css/admin.css'?>" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url(). 'assets/js/jquery.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.3.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-ui-1.11.4.custom/jquery-ui.min.js'?>"></script>
   <script type="text/javascript">$(document).ready(function(){base_url = '<?php echo base_url();?>'});</script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/jquery.validate.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/sweetalert/lib/sweet-alert.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/jquery.validationEngine-en.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo base_url().'assets/js/jquery.validationEngine.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url() .'assets/js/scrollUp.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
   <!--<script src="<?php echo base_url(); ?>assets/js/DataTables-1.10.2/js/jquery.dataTables.js"></script>-->
   <!--<script src="<?php echo base_url(); ?>assets/js/DataTables-1.10.2/js/data-table.js"></script>-->
    
   <script type="text/javascript" src="<?php echo base_url().'assets/js/admin.js'?>"></script>
   

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
    

</body>

</html>
