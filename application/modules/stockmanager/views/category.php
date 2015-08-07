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
                                   <a class="crumbs" href="<?php echo base_url(). 'stockmanager/dashboard'?>">Stock Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'stockmanager/categories'?>"><?php echo $admin_subtitle?></a>

                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/dashboard'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/categories'?>"><?php echo $admin_subtitle?></a> -->
                                   
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

                

                  <div class="col-lg-12">
                   <h2 class="table-title">Categories</h2>
                   <div class="table-responsive">
                     <div class="table-toolbar">
                       <div class="btn-group pull-right table-buttons">

                       
                       <!-- <a class="left adminadd" href="<?php echo base_url(). 'stockmanager/addcategory'?>">Add <?php echo $admin_subtitle?></a> -->
                       <!-- <a class="left adminadd" href="<?php echo base_url(). 'index.php/stockmanager/addcategory'?>">Add <?php echo $admin_subtitle?></a> -->
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Exports <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="<?php echo base_url(). 'stockmanager/allcategories/active/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'stockmanager/allcategories/active/excel'?>">Export to Excel</a></li>

                           <!-- <li><a href="<?php echo base_url(). 'index.php/stockmanager/allcategories/active/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'index.php/stockmanager/allcategories/active/excel'?>">Export to Excel</a></li> -->
                         </ul>
                       </div>
                     </div>
                     <table class="table table-striped" id="category-table2"><!-- The table created in the page -->
                       <thead>
                        <tr>
                          <th>#</th>
                          <th>Category Name</th>
                          <th>Category Status</th>
                          <th>View</th>
                        </tr>
                       </thead>
                        <?php
                          echo $all_categories; // Acquires data from admin controller, provided in the function  categories() 
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
             // $('#category-table2').dataTable();

              
            $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
            $('.dataTables_length select').addClass('form-control');
        </script>