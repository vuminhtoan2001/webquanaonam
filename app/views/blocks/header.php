<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
    <a class="navbar-brand" href="<?php echo _WEB_ROOT ?>"><img src="public/assets/clients/images/logo.jpg" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo _WEB_ROOT ?>">TRANG CHỦ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo _WEB_ROOT ?>/products">SẢN PHẨM</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo _WEB_ROOT ?>/store">CỬA HÀNG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo _WEB_ROOT ?>/news">TIN TỨC</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo _WEB_ROOT ?>/contact">LIÊN HỆ</a>
        </li>
      </ul>
      <form class="d-flex" method="POST"  action="index.php?go=search_submit" >
        <input class="form-control me-2" type="text" name="search" placeholder="Search"  style="width:400px;height:30px">
        <button class="btn btn-light search" type="submit" name="submit" style="width: 30px;height: 30px;position: relative;right: 40px"><i class="fa fa-search" aria-hidden="true" style="position:relative;bottom:3px;right:3px"></i></button>
      </form>
      <div style="margin-left: 15px;">
          <a class="navbar-brand icon" href="<?php echo _WEB_ROOT ?>/cart" style="position:relative;"><i class="fa fa-shopping-cart" >
            <?php
              if(isset($_SESSION["soluong"])){
              ?>
                <p style="width:fit-content;text-align: center;font-size:small;color: #fff;position: absolute;right: -10px; top: 3px;"><?php echo $_SESSION["soluong"];  ?></p>
              <?php
                  if($_SESSION["soluong"] == 0){
                    unset($_SESSION["soluong"]);
                  }
                }
              ?>
            </i>
          </a>
          <?php
              if(isset($_SESSION["user"])){
              ?>
                <a class="navbar-brand icon" href="<?php echo _WEB_ROOT."/logout" ?>"><i class="fas fa-sign-out-alt"></i></a>
              <?php
              }else{
              ?>
                <a class="navbar-brand icon" href="<?php echo _WEB_ROOT ?>/login" style="position:relative;"><i class="fa fa-user-circle" >
                  <?php

                    if(isset($_SESSION["user"])){
                    ?>
                    <p style="width: 100px;text-align: center;font-size:small;color: #fff;position: absolute;right: -40px; top: 30px;white-space: no-wrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                  ">
                    <?php echo $_SESSION["user"] ?>
                  </p>
                    <?php
                    }
                    ?>
                  </i>
                </a>
              <?php
              }
              ?>
      </div>
    </div>
</nav>