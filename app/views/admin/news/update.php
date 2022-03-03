<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
      </div>
			<?php
			if($news) {
			?>
				<form action="" method="post" enctype="multipart/form-data" class="form-main">
          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
								<label for="TIEUDE">
									Tiêu đề
								</label>
								<input type="text" class="form-control" id="TIEUDE" name="TIEUDE" value="<?php echo $news['TIEUDE']; ?>" >
							</div>
							<div class="form-group">
								<label for="NOIDUNG">
									Nội dung</label>
									<textarea type="text" class="form-control summernote" name="NOIDUNG"
									style="height:100px;"><?php echo $news['NOIDUNG'] ?></textarea>
							</div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
								<label for="ANH">Ảnh</label>
								<input type="file" name="ANH" class="form-control" id='file-news-1'
								value ="<?php echo $news['ANH'] ?>"
								>
								<img src ="<?php echo _WEB_ROOT ?>/public/DataUpload/tintuc/<?php echo $news['ANH'] ?>" id="img-news-1" style="margin-top:20px;height:210px">
							</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
								<label for="TIEUDE2">
									Tiêu đề 2
								</label>
								<input type="text" class="form-control" id="TIEUDE2" name="TIEUDE2" value="<?php echo $news['TIEUDE2']; ?>" >
							</div>
							<div class="form-group">
								<label for="ND2">
									Nội dung 2</label>
									<textarea type="text" class="form-control summernote" name="ND2"
									style="height:100px;"><?php echo $news['ND2'] ?></textarea>
							</div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
								<label for="ANH2">Ảnh 2</label>
								<input type="file" name="ANH2" class="form-control" id='file-news-2'
								value ="<?php echo $news['ANH2'] ?>"
								>
								<img src ="<?php echo _WEB_ROOT ?>/public/DataUpload/tintuc/<?php echo $news['ANH2'] ?>" id="img-news-2" style="margin-top:20px;height:210px">
							</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
								<label for="TIEUDE3">
									Tiêu đề 3
								</label>
								<input type="text" class="form-control" id="TIEUDE3" name="TIEUDE3" value="<?php echo $news['TIEUDE3']; ?>" >
							</div>
							<div class="form-group">
								<label for="ND3">
									Nội dung</label>
									<textarea type="text" class="form-control summernote" name="ND3"
									style="height:100px;"><?php echo $news['ND3'] ?></textarea>
							</div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
								<label for="ANH3">Ảnh 3</label>
								<input type="file" name="ANH3" class="form-control" id='file-news-3'
								value ="<?php echo $news['ANH3'] ?>"
								>
								<img src ="<?php echo _WEB_ROOT ?>/public/DataUpload/tintuc/<?php echo $news['ANH3'] ?>" id="img-news-3" style="margin-top:20px;height:210px">
							</div>
            </div>
          </div>
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label for="NDNGAN">
									Nội dung ngắn</label>
									<textarea type="text" class="form-control summernote" name="NDNGAN"
									style="height:100px;"><?php echo $news['NDNGAN'] ?></textarea>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="MATIN">
								Mã tin tức</label>
								<input type="text" class="form-control" id="MATIN" name="MATIN"
								value="<?php echo $news['MATIN'] ?>"
								disabled
								>
							</div>
							<div class="form-group">
								<label for="NGAYDANG">
								Ngày nhập</label>
									<input type="date" class="form-control" id="NGAYDANG" name="NGAYDANG"
									value="<?php echo $news['NGAYDANG']; ?>"
									>
							</div>
							<div class="form-group">
								<label for="LOAITIN">
								Loại tin</label>
								<input type="text" class="form-control" id="LOAITIN" name="LOAITIN"
								value="<?php echo $news['LOAITIN']; ?>"
								>
							</div>
						</div>
					</div>
					<div class="btn-directional">
						<a href="<?php echo _WEB_ROOT."/admin/news" ?>" class="btn btn-primary"> 				<ion-icon name="arrow-back-outline" style="font-size: 1.6rem;
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
				echo "Mục tin tức này không tồn tại nên không thể sửa!";
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