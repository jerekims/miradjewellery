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
                            foreach ($categorydetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>

                <!-- The form that allows viewing and editing of category It uses admin.js into a function with form ID -> #categoryediting -->
                        <form id="categoryediting" name="categoryediting" role="form" enctype="multipart/form-data" method="POST">

                        <div class="control-group">
                                <label class="control-label">Category ID: <?php echo $data['catid']; ?></label>

                                <div class="controls">
                                    <input name="editcategoryid" type="hidden"  value="<?php echo $data['catid']; ?>" class="span6 m-wrap form-control "/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Category Name</label>
                                <input id="categoryname" name="editcategoryname" value="<?php echo $data['catname']; ?>"class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Category Status</label>
                                <select id="editcategorystatus" name="editcategorystatus" class="form-control">

                            <?php 
                                if($data['catstatus'] == 1){
                            ?>
                                  <option selected value="1">Activated</option>
                                   <option value="0">Deactivated</option>
                            <?php
                                }elseif($data['catstatus'] == 0){
                            ?>
                                  <option value="1">Activated</option>
                                    <option selected value="0">Deactivated</option>
                            <?php
                                }
                            ?>

                            
                                    
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <a href="<?php echo base_url(). 'admin/categories'?>" class="btn btn-warning">Back</a>
                            
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