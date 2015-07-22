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
                     <form id="formaddcategory" name="formaddcategory" role="form" enctype="multipart/form-data" method="POST">

                            <div class="form-group">
                                <label>Category Name</label>
                                <input id="categoryname" name="categoryname" class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Category Status</label>
                                <select id="categorystatus" name="categorystatus" class="form-control">
                                    <option selected value="1">Activate</option>
                                    <option value="0">Deactivate</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <button type="reset" class="btn btn-warning">Reset Button</button>

                        </form>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->