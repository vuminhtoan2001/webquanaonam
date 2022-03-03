<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
      </div>
			<?php
			if($account) {
			?>
				<form action="" method="post" enctype="multipart/form-data" class="form-main">
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<label for="username">
									Tên đăng nhập
								</label>
								<input type="text" class="form-control" id="username" name="username" value="<?php echo $account['username']; ?>" placeholder="Tên sản phẩm">
							</div>
							<div class="form-group">
								<label for="email">
									Email
								</label>
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $account['email']; ?>" placeholder="Tên sản phẩm">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="password">
								Mật khẩu</label>
								<input type="text" class="form-control" id="password" name="password"
								value="<?php echo $account['password'] ?>">
							</div>
							<div class="form-group">
								<label for="level">
								Quyền</label>
								<select class="form-select" name="level" >
									<option value="<?php echo $account['level'] ?>">
									<?php
										if($account['level'] == 1){
											echo "Admin";
										}else if($account['level'] == 0){
											echo "Client";
										}else{
											echo "Boss";
										}
									?>
									</option>
									<option value="#">__Quyền__</option>
									<option value="0">Client</option>
									<option value="1">Admin</option>
									<option value="9">Boss</option>
								</select>
							</div>
						</div>
					</div>
					<div class="btn-directional">
						<a href="<?php echo _WEB_ROOT."/admin/account" ?>" class="btn btn-primary"> 		<ion-icon name="arrow-back-outline" style="font-size: 1.6rem;
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
				echo "Tài khoản này không tồn tại nên không thể sửa!";
			}

			?>
    </div>
  </div>
	<!--  -->
