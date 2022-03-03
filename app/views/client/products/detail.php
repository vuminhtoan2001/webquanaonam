     <div class="row" id="relative" style="height: 40px;line-height: 40px;background-color: #f5f4f3;padding-left: 20px;">
        <div class="aohongnhat" style="font-size :15px;">
        <a href="<?php echo _WEB_ROOT ?>" style="color: black"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ </a>/ <a href="<?php echo _WEB_ROOT ?>/products" style="color: black">Sản phẩm</a> / <?php echo $product['TENSP'];?>
        </div>
    </div>
    <div class="container " style="margin-top: 20px;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <?php $product['ANH'] = !empty($product['ANH']) ? $product['ANH'] : 'no-image.png'?>
                       <img src="<?php echo _WEB_ROOT ?>/public/DataUpload/<?php echo $product['ANH'] ;?>">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo _WEB_ROOT ?>/public/DataUpload/<?php echo $product['ANH'] ;?>">
                      </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                <p><h4><b><?php echo $product['TENSP']?></b></h4></p>
                <hr>
                <p><h6>MSP: <?php echo $product['MASP']?></h6></p>
                <?php
                  if($product['GIA_SALE'] == 0){
                ?>
                <p><h4 style="color: red;"><?php echo number_format($product['GIA'],0)?>đ</h4></p>
                <?php
                  }else{
                ?>
                  <p>
                    <h4 style="color: red;"><?php echo number_format($product['GIA_SALE'],0)?>đ</h4>
                    <span style="text-decoration:line-through"><?php echo number_format($product['GIA'],0)?>đ </span>
                  </p>

                <?php
                  }
                ?>
                <hr>
                <div class="row">
                  <div class="col-12 col-sm-9 col-md-9 col-lg-9">
                      <div style="margin-bottom:20px"><p  style="color: black"><strong>Lượt xem :</strong> <?php echo number_format($product['VIEW'],0)?> <i class="fa fa-eye" aria-hidden="true"></i></p></div>

                  </div>

                </div>

                <div class="row">
                  <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                    <div>
                      <a href="<?php echo _WEB_ROOT."/cart/single_cart"?>/<?php echo $product['MASP']?>" class="btn btn-dark">Mua ngay</a>
                      <a class="btn btn-dark" href="<?php echo _WEB_ROOT ?>/cart/addtocart/<?php echo $product['MASP']?>"><i class="far fa-shopping-cart"></i>Thêm vào giỏ</a>
                    </div>
                  </div>
                </div>
                <hr>
                <div>
                  <p><b>Hotline <span style="color: red;"> <i class="fas fa-phone"></i>  098765432</span></b></p>
                  <p><b>TƯ VẤN MIỄN PHÍ</b></p>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Đê lại số điện thoại hoặc email để được tư vấn">
                  <button type="button" class="btn btn-dark" id="gui">Gửi</button>
                </div>


                <div>
                <p><h4 style="text-align:center"><b>MÔ TẢ SẢN PHẨM</b></h4></p>
                  <p><b>HÃNG SẢN XUẤT: </b> <?php echo $product['MAHANGSX']?></p>
                  <p><b>CHI TIẾT</b>
                    <p><?php echo $product['MOTA']?></p>

                  </p>
                  <p><b>CHẤT LIỆU </b><br>
                    <?php echo $product['CHATLIEU']?>
                  </p>

                </div>
            </div>
        </div>
  </div>
