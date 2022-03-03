<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
      </div>
			<?php
			if($product) {
			?>
				<form action="" method="post" enctype="multipart/form-data" class="form-main">
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label for="TENSP">
									Tên sản phẩm
								</label>
								<input type="text" class="form-control" id="TENSP" name="TENSP" value="<?php echo $product['TENSP']; ?>" placeholder="Tên sản phẩm">
							</div>
							<div class="form-group">
								<label for="MOTA">
									Mô tả</label>
									<textarea type="text" class="form-control summernote" name="MOTA"
									style="height:100px;"><?php echo $product['MOTA'] ?></textarea>
							</div>
							<div class="form-group">
								<label for="CHATLIEU">
								Chất liệu</label>
								<textarea type="text" class="form-control summernote" name="CHATLIEU"
								style="height:100px;"	><?php echo $product['CHATLIEU'] ?></textarea>
							</div>
							<div class="form-group">
								<label for="ANH">Ảnh</label>
								<input type="file" name="ANH" class="form-control" id='file'
								value ="<?php echo $product['ANH'] ?>"
								>
								<img src ="<?php echo _WEB_ROOT ?>/public/DataUpload/<?php echo $product['ANH'] ?>" id="img-product" width="20%" style="margin-top: 5px">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="MASP">
								Mã sản phẩm</label>
								<input type="text" class="form-control" id="MASP" name="MASP"
								value="<?php echo $product['MASP'] ?>"
								disabled
								>
							</div>
							<div class="form-group">
								<label for="MALOAI">
								Mã loại</label>
								<select class="form-select" name="MALOAI" id="MALOAI" >
									<option value="<?php echo $product['MALOAI'] ?>"><?php echo $product['TENLOAI'] ?></option>
									<option value="#">Loại sản phẩm</option>
									<?php
										if($category){
											foreach($category as $category){
									?>
										<option value="<?php echo $category['MALOAI']; ?>"><?php echo $category['TENLOAI']; ?></option>
										<?php
													}
											}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="MAHANGSX">Mã hàng sản xuất</label>
									<select class="form-select" name="MAHANGSX" id="MAHANGSX" >
										<option value="<?php echo $product['MAHANGSX'] ?>">
											<?php echo $product['TENHANG'] ?>
										</option>
										<option value="#">Loại sản phẩm</option>

										<?php
											if($brand){
												foreach($brand as $brand){
										?>
												<option value="<?php echo $brand['MAHANGSX']; ?>"><?php echo $brand['TENHANG']; ?></option>
										<?php
												}
											}
										?>
									</select>
							</div>
							<div class="form-group">
								<label for="GIA">
									Giá</label>
								<input type="number" class="form-control" id="GIA" name="GIA"
								value="<?php echo $product['GIA']; ?>"
								>
							</div>
							<div class="form-group">
								<label for="GIA_SALE">
								Giá nhập</label>
								<input type="number" class="form-control" id="GIA_SALE" name="GIA_SALE"
								value="<?php echo $product['GIA_SALE']; ?>"
								>
							</div>
							<div class="form-group">
								<label for="SOLUONG">
								Số lượng</label>
									<input type="number" class="form-control" id="SOLUONG" name="SOLUONG"
									value="<?php echo $product['SOLUONG']; ?>"
									>
							</div>
							<div class="form-group">
								<label for="NGAYNHAP">
								Ngày nhập</label>
									<input type="date" class="form-control" id="NGAYNHAP" name="NGAYNHAP"
									value="<?php echo $product['NGAYNHAP']; ?>"
									>
							</div>
							<div class="form-group">
								<label for="MAUSAC">
								Màu sắc</label>
								<input type="text" class="form-control" id="MAUSAC" name="MAUSAC"
								value="<?php echo $product['MAUSAC']; ?>"
								>
							</div>
						</div>
					</div>
					<div class="btn-directional">
						<a href="<?php echo _WEB_ROOT."/admin/products" ?>" class="btn btn-primary"> 				<ion-icon name="arrow-back-outline" style="font-size: 1.6rem;
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