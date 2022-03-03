<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
      </div>
      <form action="" method="post"  class="form-main">
        <div class="row">
          <div class="col-md-9">
            <div class="form-group">
              <label for="TENHANG">
                Tên nhãn hiệu
              </label>
              <input type="text" class="form-control" id="TENHANG" name="TENHANG" >
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="MAHANGSX">
              Mã nhãn hiệu</label>
              <input type="text" class="form-control" id="MAHANGSX" name="MAHANGSX"	>
            </div>
          </div>
        </div>
        <div class="btn-directional">
          <button type="submit" class="btn btn-primary" name="btnGhiLai"					style="text-align:right">
          Thêm mới
          </button>
          <a href="<?php echo _WEB_ROOT."/admin/brand" ?>" class="btn btn-primary"> Trở về</a>

        </div>
      </form>
    </div>
  </div>
	<!--  -->
