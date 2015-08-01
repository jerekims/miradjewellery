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
                                   <a class="crumbs" href="<?php echo base_url(). 'admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/employees'?>">Employee</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/addemployee'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-5">
                  
                  
                     <form id="formaddadministrator" name="formaddadministrator" role="form" enctype="multipart/form-data" method="POST">

                            <div class="form-group">
                                <label>Employee Name</label>
                                <input id="employeename" name="employeename" required class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Employee Email</label>
                                <input id="employeeemail" name="employeeemail" required type="email" class="form-control validate[required, custom[email]]">
                            </div>

                            <div class="form-group">
                                <label>Occupation</label>
                                <select id="employeeoccupation" name="employeeoccupation" required class="form-control validate[required]">
                                    <option selected value="3">Stock Manager</option>
                                    <option value="2">Manager</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Picture</label>
                                <input type="file" class="form-control" id="employeepicture" name="employeepicture">
                            </div>
                            <div class="form-group">
                                <label>Employee Status</label>
                                <select id="employeestatus" name="employeestatus" required class="form-control validate[required]">
                                    <option selected value="1">Activate</option>
                                    <option value="0">Deactivate</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <button type="reset" class="btn btn-warning">Reset Button</button>
                            <a class="adminback" href="<?php echo base_url(). 'admin/employees'?>">Back</a>

                        </form>
                  </div>
                </div>
                <!-- /.row -->

               

           
            <!-- /.container-fluid -->

        </div>

        </div>
        <!-- /#page-wrapper -->