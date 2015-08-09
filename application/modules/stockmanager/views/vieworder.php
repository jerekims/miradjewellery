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
                                   <a class="crumbs" href="<?php echo base_url(). 'stockmanager/orders'?>">Orders</a> >

                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/dashboard'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/orders'?>">Employee</a> > -->
                                   <a class="crumbs" href="#'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-5">

                  <?php 
                           // categorydetails acquired from the controller admin, in the function called viewcategory()
                            foreach ($orderdetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>

                <!-- The form that allows viewing and editing of category It uses admin.js into a function with form ID -> #categoryediting -->
                        <form id="orderediting" name="orderediting" role="form" enctype="multipart/form-data" method="POST">
                       
                        <div class="control-group">
                                <label class="control-label">Order ID: <?php echo $data['order_id']; ?></label>

                                <div class="controls">
                                    <input name="editorderid" type="hidden" required value="<?php echo $data['order_id']; ?>" class="span6 m-wrap form-control"/>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label>Order No</label>
                                <input id="editorderno" name="editorderno" disabled required value="<?php echo $data['order_no']; ?>"class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Product ID</label>
                                <input id="editorderprodid" name="editorderprodid" disabled required type="email" value="<?php echo $data['prodid']; ?>"class="form-control validate[required, custom[email]]">
                            </div>

                            <div class="form-group">
                                <label>Product Price</label>
                                <input id="editorderprice" name="editorderprice" disabled required type="email" value="<?php echo $data['prodprice']; ?>"class="form-control validate[required, custom[email]]">
                            </div>

                            <div class="form-group">
                                <label>Customer ID</label>
                                <input id="editordercustid" name="editordercustid" disabled required type="email" value="<?php echo $data['cust_id']; ?>"class="form-control validate[required, custom[email]]">
                            </div>

                            <div class="form-group">
                                <label>Order Status</label>
                                <select id="editorderstatus"  required name="editorderstatus" class="form-control validate[required]">

                            <?php 
                                if($data['order_status'] == 1){
                            ?>
                                  <option selected value="1">Delivered</option>
                                  <option value="0">Not Delivered</option>
                            <?php
                                }elseif($data['order_status'] == 0){
                            ?>
                                  <option selected value="0">Not Delivered</option>
                                  <option  value="1">Delivered</option>
                               

                            <?php
                                }
                            ?>
   
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Date Ordered</label>
                                <input id="editorderdate" name="editorderdate" disabled required type="email" value="<?php echo $data['order_date']; ?>"class="form-control validate[required, custom[email]]">
                            </div>

                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <a href="<?php echo base_url(). 'stockmanager/orders'?>" class="btn btn-warning">Back</a>
                            <!-- <a href="<?php echo base_url(). 'index.php/stockmanager/orders'?>" class="btn btn-warning">Back</a> -->
                            
                            <!-- <button type="reset" class="btn btn-warning">Reset Button</button> -->

                        </form>

                        <?php 
                             }
                         }
                        
                       }
                        ?>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->