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
                                <i class="fa fa-dashboard"></i> Dashboard
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
                                        <div class="huge">259</div>
                                        <div>Clients</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
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
                                        <div class="huge">967</div>
                                        <div>Products</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
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
                                        <div class="huge">12</div>
                                        <div>Orders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
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
                                        <div class="huge">22</div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
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
                       <div class="btn-group pull-right">
                         <button data-toggle="dropdown" class="btn dropdown-toggle success">Tools <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="#">Save as PDF</a></li>
                           <li><a href="#">Export to Excel</a></li>
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
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                       </thead>
                       <tbody>
                        <tr>
				          <td>1</td>
				          <td>Necklace</td>
				          <td class="centered"><span class="label label-success">Active</span></td>
				          <td><i class="fa fa-eye"></i></td>
				          <td><i class="fa fa-pencil"></i></td>
				          <td><i class="fa fa-trash"></i></td>
				        </tr>

				        <tr>
				          <td>2</td>
				          <td>Ring</td>
				          <td class="centered"><span class="label label-danger">Deactivate</span></td>
				          <td><i class="fa fa-eye"></i></td>
				          <td><i class="fa fa-pencil"></i></td>
				          <td><i class="fa fa-trash"></i></td>
				        </tr>
                       </tbody>
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
                       <div class="btn-group pull-right">
                         <button data-toggle="dropdown" class="btn dropdown-toggle success">Tools <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="#">Save as PDF</a></li>
                           <li><a href="#">Export to Excel</a></li>
                         </ul>
                       </div>
                     </div>
                     <table id="orders-table" class="table table-striped">
                     
                      
                      
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Order No</th>
                          <th>Product ID</th>
                          <th>Product Price</th>
                          <th>Customer ID</th>
                          <th>Date Ordered</th>
                          <th>View</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
				          <td>1</td>
				          <td>456DGF94</td>
				          <td>56</td>
				          <td>Kshs.1600/=</td>
				          <td>16</td>
				          <td>2015-05-26</td>
				          <td><i class="fa fa-eye"></i></td>
				          <td><i class="fa fa-pencil"></i></td>
				          <td><i class="fa fa-trash"></i></td>
				        </tr>
				        <tr>
				          <td>2</td>
				          <td>891LKI94</td>
				          <td>33</td>
				          <td>Kshs.2500/=</td>
				          <td>3</td>
				          <td>2015-04-17</td>
				          <td><i class="fa fa-eye"></i></td>
				          <td><i class="fa fa-pencil"></i></td>
				          <td><i class="fa fa-trash"></i></td>
				        </tr>
				        </tbody>
                     </table>

                   </div>
                 </div>
                </div>
                <!-- /.row -->

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->