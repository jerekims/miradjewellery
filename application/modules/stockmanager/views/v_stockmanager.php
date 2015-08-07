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
                                   <a class="crumbs" href="<?php echo base_url(). 'stockmanager/dashboard'?>">Stock Manager Dashboard</a>
                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/dashboard'?>">Stock Manager Dashboard</a> -->
                                   <?php if($passmessage){ ?>
                                   <a href="<?php echo base_url().'stockmanager/viewemployee/'.$this->session->userdata('emp_id')?>" class="animated flash red"> <?php echo $passmessage ?> </a>
                                   <!-- <a href="<?php echo base_url().'index.php/stockmanager/viewemployee/'.$this->session->userdata('emp_id')?>" class="animated flash red"> <?php echo $passmessage ?> </a> -->
                                    <?php }else{$passmessage="";echo $passmessage;} ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-sitemap fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $categorynumber?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(). 'stockmanager/category'?>">
                            <!-- <a href="<?php echo base_url(). 'index.php/stockmanager/category'?>"> -->
                                <div class="panel-footer">
                                    <span class="pull-left">View More</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-gift fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $productnumber?></div>
                                        <div>Products</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(). 'stockmanager/products'?>">
                            <!-- <a href="<?php echo base_url(). 'index.php/stockmanager/products'?>"> -->
                                <div class="panel-footer">
                                    <span class="pull-left">View More</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-truck fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $ordernumber?></div>
                                        <div>Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(). 'stockmanager/orders'?>">
                            <!-- <a href="<?php echo base_url(). 'index.php/stockmanager/orders'?>"> -->
                                <div class="panel-footer">
                                    <span class="pull-left">View More</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $commentnumber?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(). 'stockmanager/comments'?>">
                            <!-- <a href="<?php echo base_url(). 'index.php/stockmanager/comments'?>"> -->
                                <div class="panel-footer">
                                    <span class="pull-left">View More</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12"><hr/></div>


                                <div class="row">
                  <div class="col-lg-12">
                   <h2 class="table-title">Categories</h2>
                   <div class="table-responsive">
                     <div class="table-toolbar">
                       <div class="btn-group pull-right table-buttons">
                       <!-- <a class="left stockmanageradd" href="<?php echo base_url(). 'stockmanager/addcategory'?>">Add Category</a> -->
                       <!-- <a class="left stockmanageradd" href="<?php echo base_url(). 'index.php/stockmanager/addcategory'?>">Add Category</a> -->
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Exports <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="<?php echo base_url(). 'stockmanager/allcategories/active/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'stockmanager/allcategories/active/excel'?>">Export to Excel</a></li>

                           <!-- <li><a href="<?php echo base_url(). 'index.php/stockmanager/allcategories/active/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'index.php/stockmanager/allcategories/active/excel'?>">Export to Excel</a></li> -->
                         </ul>
                       </div>
                     </div>
                     <table class="table table-striped" id="category-table">
                       <thead>
                        <tr>
                          <th>#</th>
                          <th>Category Name</th>
                          <th>Category Status</th>
                          <th>View</th>
                          <!-- <th>Edit</th> -->
                          <!-- <th>Deactivate</th> -->
                        </tr>
                       </thead>
                        <?php
                          echo $all_categories;
                        ?>
                   </table>

                     
                   </div>
                 </div>
                </div>
                <!-- /.row -->
                  <div class="col-lg-12"><hr/></div>

                <div class="row">
                  <div class="col-lg-12">
                   <h2 class="table-title">Products</h2>
                   <div class="table-responsive">
                     <div class="table-toolbar">
                       <div class="btn-group pull-right table-buttons">
                       <a class="left adminadd" href="<?php echo base_url(). 'stockmanager/addproduct'?>">Add Product</a>
                       <!-- <a class="left stockmanageradd" href="<?php echo base_url(). 'index.php/stockmanager/addproduct'?>">Add Product</a> -->
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Export <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="<?php echo base_url(). 'stockmanager/allcategories/active/pdf'?>">Save as PDF</a></li>
                           <li><a href="<?php echo base_url(). 'stockmanager/allcategories/active/excel'?>">Export to Excel</a></li>

                           <!-- <li><a href="<?php echo base_url(). 'index.php/stockmanager/allcategories/active/pdf'?>">Save as PDF</a></li>
                           <li><a href="<?php echo base_url(). 'index.php/stockmanager/allcategories/active/excel'?>">Export to Excel</a></li> -->
                         </ul>
                       </div>
                     </div>
                     <table class="table table-striped" id="product-table">
                       <thead>
                        <tr>
                           <th>#</th>
                          <th>Product Name</th>
                          <th>Product Description</th>
                          <th>Product Price</th>
                          <th>Status</th>
                          <th>View</th>
                          <!-- <th>Edit</th> -->
                          <th>Deactivate</th>
                        </tr>
                       </thead>
                        <?php
                          echo $all_products;
                        ?>
                   </table>

                     
                   </div>
                 </div>
                </div>
                <!-- /.row -->

                <div class="col-lg-12"><hr/></div>

                <div class="row">
                  <div class="col-lg-12">
                   <h2 class="table-title">Orders</h2>
                   <div class="table-responsive">
                     <div class="table-toolbar">
                       <div class="btn-group pull-right table-buttons">

                       
                       <!-- <a class="left stockmanageradd" href="<?php echo base_url(). 'stockmanager/addorders'?>">Add Employees</a> -->
                       <!-- <a class="left stockmanageradd" href="<?php echo base_url(). 'index.php/stockmanager/addorders'?>">Add Employees</a> -->
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Exports <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="<?php echo base_url(). 'stockmanager/allorders/active/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'stockmanager/allorders/active/excel'?>">Export to Excel</a></li>

                           <!-- <li><a href="<?php echo base_url(). 'index.php/stockmanager/allorders/active/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'index.php/stockmanager/allorders/active/excel'?>">Export to Excel</a></li> -->
                         </ul>
                       </div>
                     </div>
                     <table class="table table-striped" id="orders-table"><!-- The table created in the page -->
                       <thead>
                        <tr>
                          <th>#</th>
                          <th>Order No</th>
                          <th>Product ID</th>
                          <th>Product Price</th>
                          <th>Customer ID</th>
                          <th>Order Status</th>
                          <th>Date Ordered</th>
                          <th>View</th>
                        </tr>
                       </thead>
                        <?php
                          echo $all_orders;
                        ?>
                   </table>

                     
                   </div>
                 </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12"><hr/></div>

                

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->


        <script type="text/javascript">
              $('#category-table').dataTable();
              $('#product-table').dataTable();
              $('#orders-table').dataTable();

              
            $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
            $('.dataTables_length select').addClass('form-control');
        </script>