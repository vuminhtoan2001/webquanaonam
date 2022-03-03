<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Sản phẩm'; ?></h2>
      </div>

			<form action="" method="post" enctype="multipart/form-data" class="form-main">
			<div class="row">
				<div class="col-md-9">
					<div class="form-group">
						<label for="TENSP">
							Tên sản phẩm
						</label>
				  	<input type="text" class="form-control" id="TENSP" name="TENSP" >
					</div>
					<div class="form-group">
						<label for="MOTA">
							Mô tả</label>
							<textarea type="text" class="form-control summernote" name="MOTA" style="height:100px;"></textarea>
					</div>
					<div class="form-group">
						<label for="CHATLIEU">
						Chất liệu</label>
						<textarea type="text" class="form-control summernote" name="CHATLIEU" style="height:100px;"	></textarea>
					</div>
					<div class="form-group">
						<label for="ANH">Ảnh</label>
						<input type="file" name="ANH" class="form-control" id='file'>
						<img id="img-product" width="20%" style="margin-top: 5px">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="MASP">
						Mã sản phẩm</label>
				 	 	<input type="text" class="form-control" id="MASP" name="MASP" >
					</div>
					<div class="form-group">
						<label for="MALOAI">
						Mã loại</label>
						<select class="form-select" name="MALOAI" id="MALOAI" >
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
								<option value="#">Hãng sản phẩm</option>
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
				 		<input type="number" class="form-control" id="GIA" name="GIA" >
					</div>
					<div class="form-group">
						<label for="GIA_SALE">
						Giá nhập</label>
				  	<input type="number" class="form-control" id="GIA_SALE" name="GIA_SALE" >
					</div>
					<div class="form-group">
						<label for="SOLUONG">
						Số lượng</label>
							<input type="number" class="form-control" id="SOLUONG" name="SOLUONG" >
					</div>
					<div class="form-group">
						<label for="NGAYNHAP">
						Ngày nhập</label>
							<input type="date" class="form-control" id="NGAYNHAP" name="NGAYNHAP" >
					</div>
					<div class="form-group">
						<label for="MAUSAC">
						Màu sắc</label>
						<input type="text" class="form-control" id="MAUSAC" name="MAUSAC" >
					</div>
				</div>
			</div>
			<div class="btn-directional">
				<button type="submit" class="btn btn-primary" name="btnGhiLai" style="text-align:right">
					Thêm mới
				</button>
			</div>
		</form>

    </div>
  </div>
	<!--  -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
  <script type="text/javascript">
    $('.summernote').summernote({
      placeholder: 'Enter content....',
      tabsize: 2,
      fontsize:32,
      height: 110,
      minHeight: 60,
      codemirror: {
        theme: 'monokai'
      }
    });

  </script>