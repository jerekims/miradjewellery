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
                                   <a class="crumbs" href="<?php echo base_url(). 'admin/comments'?>"><?php echo $admin_subtitle?></a>
                                   <!-- <a class="crumbs" href="<?php echo base_url(). 'index.php/admin'?>">Manager Dashboard</a> > 
                                   <a class="crumbs" href="<?php echo base_url(). 'index.php/admin/comments'?>"><?php echo $admin_subtitle?></a> -->
                                   
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

                       
                       <a class="left adminadd" href="<?php echo base_url(). 'admin/addcomment'?>">Add <?php echo $admin_subtitle?></a>
                       <!-- <a class="left adminadd" href="<?php echo base_url(). 'index.php/admin/addcomment'?>">Add <?php echo $admin_subtitle?></a> -->
                         <button data-toggle="dropdown" class="btn dropdown-toggle btn-warning right ">Exports <span class="caret"></span></button>
                         <ul class="dropdown-menu">
                           <li><a href="<?php echo base_url(). 'admin/allcomments/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'admin/allcomments/excel'?>">Export to Excel</a></li>

                           <!-- <li><a href="<?php echo base_url(). 'index.php/admin/allcomments/pdf'?>">Export to PDF</a></li>
                           <li><a href="<?php echo base_url(). 'index.php/admin/allcomments/excel'?>">Export to Excel</a></li> -->
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