<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
      </div>
      <form action="" method="post"  class="form-main">
        <div class="row">
          <div class="col-md-9">
            <div class="form-group">
              <label for="username">
                Tên đăng nhập
              </label>
              <input type="text" class="form-control" id="username" name="username" >
            </div>
            <div class="form-group">
              <label for="email">
                Email
              </label>
              <input type="text" class="form-control" id="email" name="email" >
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="password">
              Mật khẩu</label>
              <input type="text" class="form-control" id="password" name="password"	>
            </div>
            <div class="form-group">
              <label for="level">
              Quyền</label>
              <select class="form-select" name="level" >
                <option value="0">Client</option>
                <option value="1">Admin</option>
                <option value="9">Boss</option>
              </select>
            </div>
          </div>
        </div>
        <div class="btn-directional">
          <button type="submit" class="btn btn-primary" name="btnGhiLai"					style="text-align:right">
          Thêm mới
          </button>
          <a href="<?php echo _WEB_ROOT."/admin/account" ?>" class="btn btn-primary"> Trở về</a>

        </div>
      </form>
    </div>
  </div>
	<!--  -->
