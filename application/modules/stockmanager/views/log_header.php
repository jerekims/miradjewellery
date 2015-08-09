     <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>">Mirad Jewelries</a>
                <!-- <a class="navbar-brand" href="<?php echo base_url().'index.php'?>">Mirad Jewelries</a> -->
     </div>

            <ul class="nav navbar-right top-nav">

               <li>
                    <a href="<?php echo base_url().''?>"><i class="fa fa-arrow-left"></i> Mirad HomePage</a>
                    <!-- <a href="<?php echo base_url().'index.php'?>"><i class="fa fa-arrow-left"></i> Mirad HomePage</a> -->
                </li>


            <?php if($this->session->userdata('logged_in')){
                      if($this->session->userdata('level_id') == 2){
             ?>
               <li>
                    <a href="<?php echo base_url().'admin/dashboard'?>"><i class="fa fa-arrow-right"></i> Back to Dashboard</a>
                    <!-- <a href="<?php echo base_url().'index.php/admin/dashboard'?>"><i class="fa fa-arrow-right"></i> Back to Dashboard</a> -->
                </li>
                <li>
                    <a href="<?php echo base_url(). 'admin/logout'?>"><i class="fa fa-power-off"></i> Log Out</a>
                    <!-- <a href="<?php echo base_url(). 'index.php/admin/logout'?>"><i class="fa fa-power-off"></i> Log Out</a> -->
                </li>
            <?php }elseif($this->session->userdata('level_id') == 3){ ?>

                <li>
                    <a href="<?php echo base_url().'stockmanager/dashboard'?>"><i class="fa fa-arrow-right"></i> Back to Dashboard</a>
                    <!-- <a href="<?php echo base_url().'index.php/stockmanager/dashboard'?>"><i class="fa fa-arrow-right"></i> Back to Dashboard</a> -->
                </li>
                <li>
                    <a href="<?php echo base_url(). 'admin/logout'?>"><i class="fa fa-power-off"></i> Log Out</a>
                    <!-- <a href="<?php echo base_url(). 'index.php/admin/logout'?>"><i class="fa fa-power-off"></i> Log Out</a> -->
                </li>

            <?php }elseif($this->session->userdata('level_id') == 1){?>

                 <li>
                    <a href="<?php echo base_url().'superadmin/dashboard'?>"><i class="fa fa-arrow-right"></i> Back to Dashboard</a>
                    <!-- <a href="<?php echo base_url().'index.php/superadmin/dashboard'?>"><i class="fa fa-arrow-right"></i> Back to Dashboard</a> -->
                </li>
                <li>
                    <a href="<?php echo base_url(). 'admin/logout'?>"><i class="fa fa-power-off"></i> Log Out</a>
                    <!-- <a href="<?php echo base_url(). 'index.php/admin/logout'?>"><i class="fa fa-power-off"></i> Log Out</a> -->
                </li>

            <?php 
                 } 
             }
            ?>
                

            </ul>