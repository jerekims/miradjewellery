
<div class="row ">
     <div class="navbar-static top_navigation"><!--navigation-->
        <nav>
            <div class="nav-wrapper navigation">
              <ul class="left hide-on-med-and-down" >
                <li><a href=""><i class="material-icons left">call</i>Contact Support</a></li>
              </ul>
             
             <ul class= "right hide-on-med-and-down">

                <li><a href="<?php  echo base_url().'home/login'?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Log In/Sign Up</a></li>
                <li><a href="<?php echo  base_url().'home/register'?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                <li><a href=""><i class="material-icons right">shopping_basket</i>WishList</a></li>
                <li><a href=""><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Shopping Bag</a></li>
                
              </ul>
        </nav>
      </div>  <!--End of navigation-->
</div>

  <div class="row">
  <nav class="navbar navigation" style="border-radius:0px;"><!--Navbar for main items-->
        <div class="logo left hide-on-med-and-down" >
          <ul>
            <li><a href="<?php echo base_url().'home/index'?>">MIRAD</a></li>
          </ul>   
        </div>

        <div class="nav-wrapper" class="categories">
          <ul class="right hide-on-med-and-down">
          <?php echo $navbarcategory;?> 
          </ul>
        </div><!-- end of the nav-wrapper -->
  </nav><!--End of navbar main items-->
</div>

  