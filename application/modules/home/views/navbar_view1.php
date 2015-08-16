<div class="row">
  <nav class="navbar-static-top  navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand " href="<?php echo base_url().'index.php/home/index'?>">Mirad</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
      </form>

      <ul class="nav navbar-nav navbar-right ">
        <?php if($this->session->userdata('logged_in')){ ?>
               <li><a href="<?php  echo base_url().'index.php/home/logout'?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Log Out</a></li>
        <?php }else{ ?>
               <li><a href="<?php  echo base_url().'index.php/home/login'?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Log In/Sign Up</a></li>
        <?php } ?>
        <li><a href="#"> <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp;Contact</a></li>
        <li><a href="#"> <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>&nbsp;&nbsp;Wishlist</a></li>
        <li><a href="<?php echo base_url(). 'index.php/home/shopcart'?>"> <span class="glyphicon glyphicon-Shopping-cart" aria-hidden="true"></span>&nbsp;&nbsp;Shopping Bag</a></li>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
  
  