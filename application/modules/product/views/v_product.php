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
                                <i class="fa fa-dashboard"></i> Manager Module
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-5">

                  <?php 
                           // categorydetails acquired from the controller admin, in the function called viewcategory()
                            foreach ($productdetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>

                <!-- The form that allows viewing and editing of category It uses admin.js into a function with form ID -> #categoryediting -->
                        <form id="productediting" name="productediting" role="form" enctype="multipart/form-data" method="POST">

                        <div class="control-group">
                                <label class="control-label">Product ID: <?php echo $data['prodid']; ?></label>
                                <div class="controls">
                                    <input name="editproductid" type="hidden"  value="<?php echo $data['prodid']; ?>" class="span6 m-wrap form-control "/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Product Name</label>
                                <input id="productname" name="productname" value="<?php echo $data['prodname']; ?>" class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Product Category</label>
                                <select name="productcategory" class="form-control">
                                    <option>Rings</option>
                                    <option>Necklaces</option>
                                    <option>Bangles</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea name="prod_description" value="<?php echo $data['proddescription']; ?>" id="prod_description" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Product price</label>
                                <input type="text" id="price" value="<?php echo $data['prodprice']; ?>" name="price" class="form-control">
                            </div>

                            <div class="form-group'">
                                <label>Product Image</label>
                                <img style="width:250px;height:250px;" src="<?php echo $data['prodimage']; ?>" alt="Profile pic">
                            </div>
                            <div class="form-group">
                                <label>Product status</label>
                                <select id="productstatus" name="productstatus" class="form-control">
                                    <?php
                                    if($data['product_status']==1){?>
                                        <option selected value="1">Activated</option>
                                        <option value="0">Deactivated</option>
                                   <?php } else if($data['product_status']==0){?>
                                        <option value="1">Activated</option>
                                        <option selected value="0">Deactivated</option>
                                   <?php }?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <a href="<?php echo base_url(). 'product/product'?>" class="btn btn-warning">Back</a>
                            
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