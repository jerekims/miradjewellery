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
                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/clients'?>">Clients</a> >
 -->
                              <a class="crumbs" href="<?php echo base_url(). 'index.php/admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/clients'?>">Employee</a> > 
                                   <a class="crumbs" href="#'?>"><?php echo $admin_subtitle?></a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                  <div class="col-lg-5">

                  <?php 
                           
                            foreach ($customerdetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                          
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>

               
                        <form id="clientediting" name="clientediting" role="form" enctype="multipart/form-data" method="POST">
                       
                        <div class="control-group">
                                <label class="control-label">Client ID: <?php echo $data['cust_id']; ?></label>

                                <div class="controls">
                                    <input name="editcustomerid" type="hidden" required value="<?php echo $data['cust_id']; ?>" class="span6 m-wrap form-control"/>
                                </div>
                            </div>

                            <div class="form-group image-profile">
                            <?php 
                                if(!(isset($data['cust_picture']))){
                                  if(($data['title_id']==1)||($data['title_id']==5)||($data['title_id']==6)){
                                    ?>
                                    <img style="width:250px;height:250px;" src="<?php echo base_url().'assets/images/no_user_male.jpg' ?>" alt="Male Profile pic">
                                    <?php
                                      
                                  }elseif(($data['title_id']==2)||($data['title_id']==3)||($data['title_id']==4)){

                                    ?>
                                   <img style="width:250px;height:250px;" src="<?php echo base_url().'assets/images/no_user_female.jpg' ?>" alt="Profile pic">
                                    <?php
                                      
                                  }
                                }else{
                            ?>
                                  <img style="width:250px;height:250px;" src="<?php echo $data['cust_picture']; ?>" alt="Profile pic">
                            <?php
                              }
                            ?>
                                
                            </div>

                            <div class="form-group">
                                <label>Client Name</label>
                                <?php 
                                if($data['title_id'] == 1){
                                     $title = "Mr.";
                                }elseif($data['title_id'] == 2){
                                     $title = "Mrs.";
                                }elseif($data['title_id'] == 3){
                                     $title = "Ms.";
                                }elseif($data['title_id'] == 4){
                                     $title = "Miss.";
                                }elseif($data['title_id'] == 5){
                                     $title = "Prof.";
                                }elseif($data['title_id'] == 6){
                                     $title = "Rev.";
                                }
                               ?>
                                <input id="editclientname" name="editclientname" disabled required value="<?php echo $title,$data['cust_name']; ?>"class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Client Email</label>
                                <input id="editclientemail" name="editclientemail" disabled required type="email" value="<?php echo $data['cust_email']; ?>"class="form-control validate[required, custom[email]]">
                            </div>

                            <div class="form-group">
                                <label>Date Registered</label>
                                <input id="editclientdate" name="editclientdate" disabled required type="text" value="<?php echo $data['date_registered']; ?>"class="form-control validate[required, custom[email]]">
                            </div>

                            <div class="form-group">
                                <label>Employee Status</label>
                                <select id="editclientstatus" required name="editclientstatus" class="form-control validate[required]">

                            <?php 
                                if($data['cust_status'] == 1){
                            ?>
                                  <option selected value="1">Activated</option>
                                   <option value="0">Deactivated</option>
                            <?php
                                }elseif($data['cust_status'] == 0){
                            ?>
                                  <option value="1">Activated</option>
                                    <option selected value="0">Deactivated</option>
                            <?php
                                }
                            ?>
   
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <!-- <a href="<?php echo base_url(). 'admin/clients'?>" class="btn btn-warning">Back</a> -->
                            <a href="<?php echo base_url(). 'index.php/admin/clients'?>" class="btn btn-warning">Back</a>
                            
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