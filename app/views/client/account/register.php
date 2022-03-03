
<div class="dangky">
  <h3 class="text-center">ĐĂNG KÝ</h3>
  <?php
    if(isset($_SESSION['thongbao'])){ ?>
      <div class="form-group ">
        <div class="col-sm-12  erron">
          <?php
                echo $_SESSION['thongbao'];
                unset($_SESSION['thongbao']);
          ?>
        </div>
      </div>
  <?php }?>
  <form class="form-horizontal" action="" method="POST">
      <div class="form-group ">
        <div class="col-sm-12 ">
          <input type="text" class="form-control " name="username" placeholder="Tên đăng nhập">
        </div>
      </div>
      <div class="form-group ">
        <div class="col-sm-12 ">
          <input type="email" class="form-control " name="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu">
        </div>
      </div>
      <div class=" col-sm-12 ">
          <button class="btn btn-dark " type="submit" name="submit-register">Đăng ký</button>
      </div>
      <div class="text-center">
          <a href="<?php echo _WEB_ROOT ?>/login">Trở về</a>
      </div>
  </form>
</div>