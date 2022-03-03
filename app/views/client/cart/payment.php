<form action="" method="POST">
<div class="container" style="margin-top:50px;margin-bottom:30px;">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <a href="<?php echo _WEB_ROOT."/cart"?>" class="gh">Giỏ hàng</a> > Đơn vị vận chuyển
      <p><h6>Thông tin thanh toán</h6></p>
      <p>Bạn đã có tài khoản? <a href="<?php echo _WEB_ROOT."/login"?>">Đăng nhập</a></p>
      <div class="mb-3">
        <input type="text" class="form-control" name="hoten" placeholder="Họ và tên">
      </div>
      <div class="row g-3 mb-3">
        <div class="col-8">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="col-4">
          <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
        </div>
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" name="diachi" placeholder="Địa chỉ">
      </div>
      <div>
        <h6>Phương thức thanh toán</h6>
        <ul class="list-group">
          <li class="list-group-item">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="cash" value="Thanh toán khi giao hàng" id="flexRadioDefault1" >
              <label class="form-check-label" for="flexRadioDefault1">
                Thanh toán khi giao hàng
              </label>
            </div>
          </li>
          <li class="list-group-item">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="credit" value="Thanh toán qua thẻ ngân hàng" id="flexRadioDefault2">
              <label class="form-check-label" for="flexRadioDefault2">
                Chuyển khoản qua ngân hàng
              </label>
            </div>
          </li>
          <li class="list-group-item list-group-item-secondary text-center">
            Nội dung chuyển khoản: Tên + Số điện thoại + Mã đơn hàng <br>
            Quý khách có thể gửi qua 1 trong 3 ngân hàng sau: <br>
            1.Ngân hàng BIDV Chi nhánh Ba Đình - Số TK: 12610000006864 - Chủ TK: Lại Văn Biên <br>
            2.Ngân hàng Techcom bank - chi nhánh cát linh - Số TK: 19121155876010 - Chủ TK: Vũ Minh Toán <br>
            3. Ngân hàng Vietcombank - Chi nhánh Hoàng Mai - Số TK: 0931004190506 - Chủ TK: Nguyễn Quang Linh
          </li>
        </ul>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
      <h6>Danh sách sản phẩm thanh toán</h6>
      <table class="table">
        <tbody>
        <?PHP   foreach($_SESSION["cart"] as $k=>$val){?>
          <tr style="vertical-align:middle">
            <td width="20%" style="position: relative;"><img src="<?php echo _WEB_ROOT."/public/DataUpload"?>/<?php echo $val["ANHSP"]?>" width=100px >
              <p style="width: 1.4rem;text-align: center;font-size:small;background:rgba(153,153,153,0.9);color: #fff;position: absolute;right: 6px; top: 0px;border-radius: 0.8em;font-weight: 500;padding: 0.15em 0.35em;"><?php echo $val['qty'] ?></p>
            </td>
            <td width="50%"><?php echo $val['TENSP'] ?></td>
            <td id="col3" width="30%"><?php echo number_format($val["GIATIEN"]*$val["qty"],0) ?>đ</td>
          </tr>
          <?php } ?>
          <tr>
            <td colspan="2"><b>Tổng tiền</b></td>
            <td><b><?php echo number_format($tongtien,0) ?>₫</b></td>
          </tr>
        </tbody>
      </table>
      <!-- <input type="submit" class="btn btn-dark" name="save_dh" style="margin-left: 43%;" value="Đặt hàng"> -->
      <button class="button-82-pushable" role="button" type="submit" name="save_dh"  style="margin-left: 40%;">
        <span class="button-82-shadow"></span>
        <span class="button-82-edge"></span>
        <span class="button-82-front text">
          Đặt hàng
        </span>
      </button>
    </div>
  </div>
</div>
</form>



