<?php
    $tong=0;
    $soluong=0;
?>
<form action="<?php echo _WEB_ROOT."/cart\/update_cart"?>" method="POST">
  <div class="container" >
      <div style="margin-top: 20px" >
        <h4>
            GIỎ HÀNG CỦA BẠN
                (
                    <?php if(isset($_SESSION["soluong"])){  ?>
                    ĐANG CÓ
                    <?php
                        echo ($_SESSION["soluong"]==""? 0 : $_SESSION["soluong"]); ?>  SẢN PHẨM )
                    <?php  }else{
                          echo "CHƯA CÓ SẢN PHẨM NÀO )";
                      }

                ?>

        </h4>
        <table class="table ">
          <thead>
            <tr>
              <th scope="col">Sản phẩm</th>
              <th scope="col">Đơn giá</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Thành tiền</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
            <?php
              if(isset($_SESSION["cart"])){
                  foreach($_SESSION["cart"] as $k=>$val){
            ?>

                  <tr>
                  <td><a href=""><img src="<?php echo _WEB_ROOT ?>/public/DataUpload/<?php echo $val['ANHSP'] ;?>" style="width:80px; height:auto"></a>      <b><?php echo $val["TENSP"]?></b></td>
                  <td><?PHP  echo number_format($val["GIATIEN"],0)?>đ</td>
                  <td>
                      <div class="btn-group form-check-inline" role="group" aria-label="Basic outlined example">

                              <input type="number" min="1" value= "<?php echo $val["qty"];  ?>" name="qty[<?php echo $k; ?>]" >

                      </div>

                  </td>

                  <td><?PHP  echo number_format($val["GIATIEN"]*$val["qty"],0); $tong+=$val["GIATIEN"]*$val["qty"];?>đ</td>

                  <td> <a href="<?php echo _WEB_ROOT ?>/cart/delete_cart/<?php echo $k; ?>"><i class="far fa-trash-alt" style="color:black;font-size:20px"></i></a></td>
              </tr>
            <?php

                  }
              }else{
                  echo "Chưa có sản phẩm nào trong giỏ hàng.";
              }
            ?>

          </tbody>
        </table>
      </div>

    <div class="row">
          <div class="col-6 col-sm-7 col-md-8 col-lg-9">
              <div class="mb-3">
                  <label for="note" class="form-label">Ghi chú cho cửa hàng</label>
                  <textarea class="form-control" id="note" rows="3"></textarea>
              </div>
          </div>
          <div class="col-6 col-sm-5 col-md-4 col-lg 3">
              <p></p>
              <b>Tổng: <?php echo number_format($tong,0) ?>đ</b>
              <p></p>
              <div >
                  <input class="btn btn-dark" type="submit" name="submit" value="Cập nhật">
              </div>
          </div>
      </div>
      <div class="row">
      <div class="col-6 ">
        <div class="mb-3">

            <a href="<?php echo _WEB_ROOT."/products";?>"  class="btn btn-dark"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng </a>
        </div>
      </div>
      <div class="col-6" style="text-align:right">

              <a href="<?php echo _WEB_ROOT."/cart/payment";?>" class="btn btn-dark btn-lager">Thanh toán <i class="fa fa-angle-right"></i></a>

      </div>
    </div>
  </div>
</form>