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
                                   <a class="crumbs" href="<?php echo base_url(). 'stockmanager/dashboard'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'stockmanager/comments'?>"><?php echo $admin_subtitle?></a>
                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/stockmanager/comments'?>"><?php echo $stockmanager_subtitle?></a> -->
                                   
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                   <div class="col-lg-12">
                   <h2 class="table-title">Comments</h2>
                   <div class="table-responsive">
                     <div class="table-toolbar">
                       <div class="btn-group pull-right table-buttons">

                       
                       <!-- <a class="left stockmanageradd" href="<?php echo base_url(). 'stockmanager/addcomment'?>">Add <?php echo $stockmanager_subtitle?></a> -->
                       <!-- <a class="left stockmanageradd" href="<?php echo base_url(). 'index.php/stockmanager/addcomment'?>">Add <?php echo $stockmanager_subtitle?></a> -->
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Exports <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="<?php echo base_url(). 'stockmanager/allcomments/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'stockmanager/allcomments/excel'?>">Export to Excel</a></li>

                           <!-- <li><a href="<?php echo base_url(). 'index.php/stockmanager/allcomments/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'index.php/stockmanager/allcomments/excel'?>">Export to Excel</a></li> -->
                         </ul>
                       </div>
                     </div>
                     <table class="table table-striped" id="comment-table"><!-- The table created in the page -->
                       <thead>
                        <tr>
                          <th>#</th>
                          <th>Subject</th>
                          <th>Message</th>
                          <th>Date Sent</th>
                          <th>View</th>
                          <!-- <th>Edit</th> -->
                          <th>Deactivate</th>
                        </tr>
                       </thead>
                        <?php
                          echo $all_comments;
                        ?>
                   </table>

                     
                   </div>
                 </div>
                </div>
                <!-- /.row -->


        </div>

        </div>
        <!-- /#page-wrapper -->