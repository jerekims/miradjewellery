<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $admin_title?> <small><?php echo $admin_subtitle?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>
                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/employee'?>"><?php echo $admin_subtitle?></a> -->

                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/employee'?>"><?php echo $admin_subtitle?></a>
                                   
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-12">
                   <h2 class="table-title">Employees</h2>
                   <div class="table-responsive">
                     <div class="table-toolbar">
                       <div class="btn-group pull-right table-buttons">

                       
                       <!-- <a class="left adminadd" href="<?php echo base_url(). 'admin/addemployee'?>">Add <?php echo $admin_subtitle?></a> -->
                       <a class="left adminadd" href="<?php echo base_url(). 'index.php/admin/addemployee'?>">Add <?php echo $admin_subtitle?></a>
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Exports <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <!-- <li><a href="<?php echo base_url(). 'admin/allemployees/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'admin/allemployees/excel'?>">Export to Excel</a></li> -->
                           <li><a href="<?php echo base_url(). 'index.php/admin/allemployees/acitve/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'index.php/admin/allemployees/active/excel'?>">Export to Excel</a></li>
                         </ul>
                       </div>
                     </div>
                     <table class="table table-striped" id="administrator-table2"><!-- The table created in the page -->
                       <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Occupation</th>
                          <th>Date Registered</th>
                          <th>Status</th>
                          <th>View</th>
                          <th>Deactivate</th>
                        </tr>
                       </thead>
                        <?php
                          echo $all_administrators;
                        ?>
                   </table>

                     
                   </div>
                 </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->

        <script type="text/javascript">
              $('#administrator-table2').dataTable();

              
            $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
            $('.dataTables_length select').addClass('form-control');
        </script>