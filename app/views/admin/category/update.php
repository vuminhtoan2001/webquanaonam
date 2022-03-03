<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
      </div>
			<?php
			if($category) {
			?>
				<form action="" method="post" enctype="multipart/form-data" class="form-main">
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label for="TENLOAI">
									Tên loại sản phẩm
								</label>
								<input type="text" class="form-control" id="TENLOAI" name="TENLOAI" value="<?php echo $category['TENLOAI']; ?>" placeholder="Tên sản phẩm">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="MALOAI">
								Mã loại sản phẩm</label>
								<input type="text" class="form-control" id="MALOAI" name="MALOAI"
								value="<?php echo $category['MALOAI'] ?>" disabled>
							</div>
						</div>
					</div>
					<div class="btn-directional">
						<button type="submit" class="btn btn-primary" name="btnUpdate"					style="text-align:right">
						Cập nhật
						</button>
						<a href="<?php echo _WEB_ROOT."/admin/category" ?>" class="btn btn-primary"> Trở về</a>

					</div>
				</form>
			<?php }else {
				echo "Loại sản phẩm này không tồn tại nên không thể sửa!";
			}

			?>
    </div>
  </div>
	<!--  -->
