<form class="container " method="POST">
    <div class="row" style="margin-top: 20px;">
        <div class="col-12 ">
            <div class="text-center "  >
                <h4><?php echo $title ?></h4>
            </div>
        </div>
    </div>
    <div class="row ">
      <div class="col-12 col-md-3 col-lg-3 filter_pc"  >
        <div class="position " >
            <h6 >DANH MỤC SẢN PHẨM</h6>

            <div class='row'>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="products_category" style="padding:3px;width:100%;" name="category">
                        <div class="category_item_link">
                            <a href="<?php echo _WEB_ROOT."/products"?>">Tất cả</a>
                        </div>
                        <?php
                            if($category_list){
                                foreach($category_list as $category){
                        ?>
                                    <div class="category_item_link">
                                        <a href="<?php echo _WEB_ROOT."/products/category/".$category['MALOAI'] ?>"><?php echo $category['TENLOAI']?></a>
                                    </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <hr>
            <h6>KHOẢNG GIÁ</h6>
            <div class="row">
                <div class="col-4 col-md-12 col-lg-12" style="margin-bottom:10px">
                    <select class="selectpicker" class="loc" style="padding:3px;width:100%;" name="price">
                        <option value="" disabled selected>Tất cả</option>
                        <option value="1">Nhỏ hơn 200,000đ</option>
                        <option value="2">Từ 200,000đ - 500,000đ</option>
                        <option value="3">Từ 500,000đ - 1,000,000đ</option>
                        <option value="4">Từ 1,000,000đ - 3,000,000đ</option>
                        <option value="5">Lớn hơn 3,000,000đ</option>
                    </select>
                </div>
            </div>
            <hr>
            <h6>THƯƠNG HIỆU</h6>
            <div class="row" style="padding-left:10px">

                <?php
                        if($brand_list){
                            foreach($brand_list as $brand){
                    ?>

                                <div class="form-check .col-sm-6 col-md-6">
                                    <input class="form-check-input" type="radio" name="brand" id="<?php echo $brand['MAHANGSX'] ?>" value="<?php echo $brand['MAHANGSX'] ?>" >
                                    <label class="form-check-label" for="<?php echo $brand['MAHANGSX'] ?>">
                                        <?php echo $brand['TENHANG'] ?>
                                    </label>
                                </div>
                    <?php
                            }
                        }
                    ?>
            </div>
            <hr>
            <h6>Sắp xếp </h6>
            <div   class="list-group" >
                <div class="input-group mb-3">
                    <select class="form-select" aria-label="Default select example" name="sort">
                        <option value="" selected disabled > Option</option>
                        <option value="DESC">Giá giảm dần</option>
                        <option value="ASC">Giá tăng dần</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-dark" name="btnSearch">Tìm kiếm</button>
        </div>
      </div>
      <label for="nav_mobile_input" class="nav_filter_icon">
          <i class="fa fa-filter" aria-hidden="true"></i>
          <i class="fa fa-align-right" aria-hidden="true"></i>
        </label>
      <input type="checkbox" name="" id="nav_mobile_input" class="nav_mobile_input">
      <label for="nav_mobile_input" class="filter_overlay"></label>
      <div class="col-12 col-md-3 col-lg-3 filter_mobile"  >
          <div class="position" >
            <label for="nav_mobile_input" class="filter_close">
                <i class="fa fa-times" aria-hidden="true"></i>
            </label>
            <h6 >DANH MỤC SẢN PHẨM</h6>
            <div class='row'>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="dropdown">
                        <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục sản phẩm
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php
                                if($category_list){
                                    foreach($category_list as $category){
                            ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo _WEB_ROOT."/products/category/".$category['MALOAI'] ?>"><?php echo $category['TENLOAI']?></a>
                            </li>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <h6>KHOẢNG GIÁ</h6>
            <div class="row">
                <div class="col-4 col-md-12 col-lg-12" style="margin-bottom:10px">
                    <select class="selectpicker" class="loc" style="padding:3px;;" name="price">
                        <option value="" disabled selected>Tất cả</option>
                        <option value="1">Nhỏ hơn 200,000đ</option>
                        <option value="2">Từ 200,000đ - 500,000đ</option>
                        <option value="3">Từ 500,000đ - 1,000,000đ</option>
                        <option value="4">Từ 1,000,000đ - 3,000,000đ</option>
                        <option value="5">Lớn hơn 3,000,000đ</option>
                    </select>
                </div>
            </div>
            <hr>
            <h6>THƯƠNG HIỆU</h6>
            <div class="row" style="padding-left:10px">
                <?php
                        if($brand_list){
                            foreach($brand_list as $brand){
                    ?>
                        <div class="form-check .col-sm-6">
                            <input class="form-check-input" type="radio" name="brand" id="<?php echo $brand['MAHANGSX'] ?>" value="<?php echo $brand['MAHANGSX'] ?>" >
                            <label class="form-check-label" for="<?php echo $brand['MAHANGSX'] ?>">
                                <?php echo $brand['TENHANG'] ?>
                            </label>
                        </div>
                    <?php
                            }
                        }
                    ?>
            </div>
            <hr>
            <h6>Sắp xếp </h6>
            <div   class="list-group" >
                <div class="input-group mb-3">
                    <select class="form-select" aria-label="Default select example" name="sort">
                        <option value="" selected disabled > Option</option>
                        <option value="DESC">Giá giảm dần</option>
                        <option value="ASC">Giá tăng dần</option>
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-secondary" type="submit" class="btn btn-outline-dark" name="btnSearch">Tìm kiếm</button>
            </div>
          </div>
      </div>
      <div class="col-12 col-md-9 col-lg-9 list_products " style="margin-top: 20px;" >
          <div class="row">
            <?php
                if($product_list){
                    foreach($product_list as $product){
            ?>
                <div class=" col-6 col-sm-4">
                        <div class="text-center img product-item">
                            <a href="products/detail/<?php echo $product['MASP'] ?>"><img src="public/DataUpload/<?php echo $product['ANH'] ;?>"width="100%"></a>
                            <a href="products/detail/<?php echo $product['MASP'] ?>"><p><?php echo $product['TENSP']  ?></p></a>
                            <p class="product-price">
                                <?php
                                    if($product['GIA_SALE'] == 0) {
                                ?>
                                <b><?php  echo number_format($product['GIA'],0) ?>đ</b>
                                <?php
                                    }else {
                                ?>
                                <span class="current-price"><b><?php  echo number_format($product['GIA_SALE'],0) ?>đ</b></span>
                                <span class="original-price"><?php  echo number_format($product['GIA'],0) ?>đ</span>
                                <?php
                                    }
                                ?>
                            </p>
                            <?php
                                $discount = round(($product['GIA_SALE'] / $product['GIA']) *100);
                                if($discount > 0) {
                                ?>
                                    <div class="product-tags">
                                        <span class="tag-sale">
                                        <?php echo "- ".(100 -$discount)."%";?>
                                        </span>
                                    </div>
                                <?php
                                }
                                ?>
                        </div>
                </div>
            <?php
                    }
                }else{
                    echo "Không có sản phẩm nào!";
                }
            ?>
            <!-- pagination -->
            <?php
                if(file_exists(_DIR_ROOT.'/app/views/blocks/pagination.php') && isset($sum_page)){
                    require_once _DIR_ROOT.'/app/views/blocks/pagination.php';
                }
                ?>
            <!-- pagination -->

          </div>
      </div>
    </div>
</form>
<hr>