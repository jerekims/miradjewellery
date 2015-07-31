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
                                   <a class="crumbs" href="<?php echo base_url(). 'admin'?>">Manager Dashboard</a>
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
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $clientnumber?></div>
                                        <div>Clients</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url(). 'admin/clients'?>">
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
                            <a href="<?php echo base_url(). 'product/products'?>">
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
                            <a href="<?php echo base_url(). 'admin/orders'?>">
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
                            <a href="<?php echo base_url(). 'admin/comments'?>">
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
                       <a class="left adminadd" href="<?php echo base_url(). 'admin/addcategory'?>">Add Category</a>
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Exports <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="<?php echo base_url(). 'admin/allcategories/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'admin/allcategories/excel'?>">Export to Excel</a></li>
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
                          <th>Deactivate</th>
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
                       <a class="left adminadd" href="<?php echo base_url(). 'product/addproduct'?>">Add Product</a>
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Export <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="<?php echo base_url(). 'admin/allcategories/pdf'?>">Save as PDF</a></li>
                           <li><a href="<?php echo base_url(). 'admin/allcategories/excel'?>">Export to Excel</a></li>
                         </ul>
                       </div>
                     </div>
                     <table class="table table-striped" id="category-table">
                       <thead>
                        <tr>
                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>Product category</th>
                          <th>Product Description</th>
                          <th>Product Price</th>
                          <th>Product Image</th>
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
                   <h2 class="table-title">Employees</h2>
                   <div class="table-responsive">
                     <div class="table-toolbar">
                       <div class="btn-group pull-right table-buttons">

                       <!-- The add button takes you to the admin controller, into the function addcategory() -->
                       <a class="left adminadd" href="<?php echo base_url(). 'admin/addemployee'?>">Add Employees</a>
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Exports <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="<?php echo base_url(). 'admin/allemployees/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'admin/allemployees/excel'?>">Export to Excel</a></li>
                         </ul>
                       </div>
                     </div>
                     <table class="table table-striped" id="administrator-table"><!-- The table created in the page -->
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
                <div class="col-lg-12"><hr/></div>

                

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->