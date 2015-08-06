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
                                   <a class="crumbs" href="<?php echo base_url(). 'stockmanager/comments'?>">Comments</a> >

                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/comments'?>">Employee</a> > -->
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
                            foreach ($commentdetails as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>

                <!-- The form that allows viewing and editing of category It uses admin.js into a function with form ID -> #categoryediting -->
                        <form id="commentediting" name="commentediting" role="form" enctype="multipart/form-data" method="POST">
                       
                        <div class="control-group">
                                <label class="control-label">Comment ID: <?php echo $data['comm_id']; ?></label>

                                <div class="controls">
                                    <input name="editcommentid" type="hidden" required value="<?php echo $data['comm_id']; ?>" class="span6 m-wrap form-control"/>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label>Date Sent</label>
                                <input id="editcommentdate" name="editcommentdate" disabled required value="<?php echo $data['date_sent']; ?>" class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Comment Status</label>
                                <select id="editcommentstatus" required name="editcommentstatus" class="form-control validate[required]">

                            <?php 
                                if($data['comm_status'] == 0){
                            ?>
                                  <option value="1">Active</option>
                                   <option selected value="0">Deactivated</option>
                            <?php
                                }elseif($data['comm_status'] == 1){
                            ?>
                                  <option selected value="1">Active</option>
                                    <option value="0">Deactivated</option>
                            <?php
                                }
                            ?>
   
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input id="editcommentsubject" name="editcommentsubject" disabled required value="<?php echo $data['comm_subject']; ?>"class="form-control validate[required]">
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <textarea id="editcommentmessage" name="editcommentmessage" disabled required class="form-control validate[required]"><?php echo $data['comm_message']; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <a href="<?php echo base_url(). 'stockmanager/comments'?>" class="btn btn-warning">Back</a>
                            <!-- <a href="<?php echo base_url(). 'index.php/stockmanager/comments'?>" class="btn btn-warning">Back</a> -->
                            
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