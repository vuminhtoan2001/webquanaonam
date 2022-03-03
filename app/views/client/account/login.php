<div class="dangky">
    <form class="form-horizontal" action="" method="POST">
        <h3 class="text-center">ĐĂNG NHẬP</h3>
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
        <div class="form-group ">
          <div class="col-sm-12  ">
            <input type="text" class="form-control " name="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
          </div>
        </div>
        <div class=" col-sm-12 ">
            <button class="btn btn-dark " type="submit" name="submit-login">Đăng nhập</button>
        </div>

        <div class="text-center">
            <a href="<?php echo _WEB_ROOT ?>/register">Đăng ký</a>
        </div>
        <div class="text-center">
            <a href="<?php echo _WEB_ROOT ?>/forget_password">Quên mật khẩu?</a>
        </div>
        <div class="text-center">
            <a href="<?php echo _WEB_ROOT ?>">Trở về</a>
        </div>

    </form>
</div>