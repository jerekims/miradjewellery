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
                                   <a class="crumbs" href="<?php echo base_url(). 'product'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'product/products'?>">Product</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'product/addproduct'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-5">
                  
                  <!-- The form that adds a new category into database. It uses admin.js into a function with form ID -> #formaddcategory -->
                     <form id="formaddproduct" name="formaddproduct" role="form" enctype="multipart/form-data" method="POST">

                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="productcategory" id="productcategory">
                                    <option>Rings</option>
                                    <option>Necklaces</option>
                                    <option>Bangles</option>
                                </select>
                                </div>
                            <div>
                                <label>Product Name</label>
                                <input id="productname" class="form-control validate[required]">
                            </div>
                            <div>
                                <label>Product Description</label>
                                <textarea  name="prod_description" id="prod_description" rows="10" cols="20" placeholder="Please enter a description of the product" class="form-control"></textarea>
                            </div>
                            <div>
                                <label>Product Price</label>
                                <input id="price" name="price" class="form-control validate[required] ">
                            </div>
                            <div>
                                <label>Product image</label>
                                <input type="file" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Product Status</label>
                                <select id="productstatus" name="productstatus" class="form-control">
                                    <option selected value="1">Activated</option>
                                    <option value="0">Deactivated</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <button type="reset" class="btn btn-warning">Reset Button</button>
                            <a class="adminback" href="<?php echo base_url(). 'product/products'?>">Back</a>

                        </form>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->