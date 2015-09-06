  <!-- Header Top Starts -->
    <div class="header-top">
      <div class="container">
        <div class="row">
        <!-- Header Links Starts -->
          <div class="col-sm-12 col-xs-12">
            <div class="header-links">
              <ul class="nav navbar-nav pull-left">
                <li>
                  <a href="<?php echo base_url().'index.php/home'?>">
                    <i class="fa fa-home hidden-lg hidden-md" title="Home"></i>
                    <span class="hidden-sm hidden-xs">
                      Home
                    </span>
                  </a>
                </li>
               <!--  <li>
                  <a href="#">
                    <i class="fa fa-user hidden-lg hidden-md" title="My Account"></i>
                    <span class="hidden-sm hidden-xs">
                      My Account
                    </span>
                  </a>
                </li> -->
                <li>
                  <a href="<?php echo base_url().'index.php/home/shopcart'?>">
                    <i class="fa fa-shopping-cart hidden-lg hidden-md" title="Shopping Cart"></i>
                    <span class="hidden-sm hidden-xs">
                      Shopping Cart
                    </span>
                  </a>
                </li>
<!--                 <li>
                  <a href="#">
                    <i class="fa fa-crosshairs hidden-lg hidden-md" title="Checkout"></i>
                    <span class="hidden-sm hidden-xs">
                      Checkout
                    </span>
                  </a>
                </li> -->
                <li>
                  <a href="<?php echo base_url().'index.php/home/login'?>">
                    <i class="fa fa-lock hidden-lg hidden-md" title="Login"></i>
                    <span class="hidden-sm hidden-xs">
                      Register | Login
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        <!-- Header Links Ends -->
        </div>
      </div>
    </div>
  <!-- Header Top Ends -->
  <!-- Main Header Starts -->
    <div class="main-header">
      <div class="container">
        <div class="row">
        <!-- Search Starts -->
          <div class="col-md-9">
            <div id="search">
            <form method="POST" action="<?php echo base_url().'index.php/home/searchproduct/'?>">
               <div class="input-group">
                <input type="text" name="search"  class="form-control input-lg" placeholder="Search for a jewellery here" style="width:80%;background:none;box-shadow:none;">
                <input class="btn btn-lg" type="submit" value="search">
                
              </div>
            </form> 
            </div>  
          </div>
        <!-- Search Ends -->
        <!-- Logo Starts -->
          <div class="col-md-3">
            <div id="logo">
              <a href="<?php echo base_url().'index.php/home'?>">Mirad Jewellery</a>
            </div>
          </div>
        <!-- Logo Starts -->        
        </div>
      </div>
    </div>
  <!-- Main Header Ends -->
  <!-- Main Menu Starts -->
    <nav id="main-menu" class="navbar" role="navigation">
      <div class="container">
      <!-- Nav Header Starts -->
        <div class="navbar-header">
          <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <i class="fa fa-bars"></i>
          </button>
        </div>
      <!-- Nav Header Ends -->
      <!-- Navbar Cat collapse Starts -->
        <div class="collapse navbar-collapse navbar-cat-collapse">
          <ul class="nav navbar-nav">
          <?php foreach ($navigations as $key => $nav) {?>
            <li><a href="<?php echo base_url().'index.php/home/product_category/'?><?php echo $nav['Category id']?>"><?php echo $nav['Category Name'];?></a></li>        
         <?php  }?>
          </ul>
        </div>
      <!-- Navbar Cat collapse Ends -->
      </div>
    </nav>