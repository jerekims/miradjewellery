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
                                   <a class="crumbs" href="<?php echo base_url(). 'stockmanager/products'?>">Product</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'stockmanager/addproduct'?>"><?php echo $admin_subtitle?></a>
                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/products'?>">Product</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/addproduct'?>"><?php echo $admin_subtitle?></a> -->
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-5">
                  
                     <form id="formaddproduct" name="formaddproduct" role="form" enctype="multipart/form-data" method="POST">

                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control validate[required]" name="productcategory" id="productcategory">
                                    <?php echo $getcategories;?>
                                </select>
                                </div>
                            <div>
                                <label>Product Name</label>
                                <input id="productname" name="productname" class="form-control validate[required]">
                            </div>
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" class="form-control validate[required]" id="prod_picture" name="prod_picture">
                            </div>
                            <div>
                                <label>Product Description</label>
                                <textarea  name="prod_description" id="prod_description" placeholder="Please enter a description of the product" class="form-control validate[required]"></textarea>
                            </div>
                            <div>
                                <label>Product Price</label>
                                <input id="price" name="price" class="form-control validate[required, custom[number]] ">
                            </div>
                           <!--  <div>
                                <label>Product image</label>
                                <input type="file" class="form-control">
                            </div>
 -->
                            <div class="form-group">
                                <label>Product Status</label>
                                <select id="productstatus" name="productstatus" class="form-control validate[required]">
                                    <option selected value="1">Activated</option>
                                    <option value="0">Deactivated</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <button type="reset" class="btn btn-warning">Reset Button</button>
                            <a class="adminback" href="<?php echo base_url(). 'stockmanager/products'?>">Back</a>
                            <!-- <a class="adminback" href="<?php echo base_url(). 'index.php/stockmanager/products'?>">Back</a> -->

                        </form>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->