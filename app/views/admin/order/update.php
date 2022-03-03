<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
      </div>
			<?php
			if($order) {
			?>
				<form action="" method="post" enctype="multipart/form-data" class="form-main">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="name_cus">
									Tên khách hàng
								</label>
								<input type="text" class="form-control" id="name_cus" name="name_cus" value="<?php echo $order['name']; ?>" placeholder="Tên khách hàng">
							</div>
							<div class="form-group">
								<label for="email_cus">
									Email
								</label>
								<input type="text" class="form-control" id="email_cus" name="email_cus" value="<?php echo $order['email']; ?>" placeholder="Email...">
							</div>
							<div class="form-group">
								<label for="phone_cus">
									Số điện thoại
								</label>
								<input type="text" class="form-control" id="phone_cus" name="phone_cus" value="<?php echo $order['phone']; ?>" placeholder="Số điện thoại...">
							</div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Địa chỉ</label>
								<input type="text" class="form-control" id="address" name="address"
								value="<?php echo $order['address'] ?>"
								>
							</div>
              <div class="form-group">
								<label for="ngaydathang">
								Ngày đặt hàng</label>
                <input type="date" class="form-control" id="ngaydathang" name="ngaydathang"
                value="<?php echo $order['ngaydathang']; ?>"
                >
              </div>
              <div class="form-group">
								<label for="thanhtoan">
								Phương thức thanh toán</label>
								<select class="form-select" name="thanhtoan" id="thanhtoan" >
                  <option value="<?php echo $order['thanhtoan']; ?>"><?php echo $order['thanhtoan']; ?></option>
						      <option value="Chưa chọn phương thức thanh toán">-- CÁC PHƯƠNG THỨC THANH TOÁN --</option>
						      <option value="Thanh toán qua thẻ ngân hàng">Thanh toán qua thẻ ngân hàng</option>
                  <option value="Thanh toán khi giao hàng">Thanh toán khi giao hàng</option>

                </select>
							</div>
							<div class="form-group">
                <label for="total">
                Tổng tiền</label>
                <input type="number" class="form-control" id="total" name="total"
                value="<?php echo $order['total']; ?>"
                disabled
                >
							</div>
						</div>
					</div>
					<div class="btn-directional">
					<a href="<?php echo _WEB_ROOT."/admin/order" ?>" class="btn btn-primary"> 		<ion-icon name="arrow-back-outline" style="font-size: 1.6rem;
								color: white;
								width: 50px;">
							</ion-icon>
						</a>
						<button type="submit" class="btn btn-primary" name="btnUpdate"					style="text-align:right">
						Cập nhật
						</button>

					</div>
				</form>
			<?php }else {
				echo "Sản phẩm này không tồn tại nên không thể sửa!";
			}

			?>
    </div>
  </div>
	<!--  -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
  <script type="text/javascript">
    $('.summernote').summernote({
      placeholder: 'Enter content...',
      tabsize: 2,
      fontsize:32,
      height: 110,
      minHeight: 60,
      codemirror: {
        theme: 'monokai'
      }
    });

		const btn_update = document.querySelector("#btn_update")
		btn_update.onclick = function(e) {
			Swal.fire({
				icon: 'success',
				title: 'Cập nhật dữ liệu thành công',
				showConfirmButton: false,
				timer:1000
			})
  }

  </script>