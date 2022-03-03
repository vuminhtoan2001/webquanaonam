<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
        <!-- <a href="products/form_add" class= "btn btn-primary btn-sm">
          <span><ion-icon name="add-outline"></ion-icon></span>
          <span>Create</span>
        </a> -->
      </div>
      <div class="sticky-table">
        <table id="myTable" >
          <thead>
            <tr>
              <th>#</th>
              <th>Id </th>
              <th>Tên khách hàng</th>
              <th>Số điện thoại</th>
              <!-- <th>Email</th>
              <th>Địa chỉ</th> -->
              <th>Ngày đặt hàng</th>
              <th>Tổng tiền</th>
              <th>Phương thức thanh toán</th>
              <th>Trạng thái</th>
              <th>Chi tiết</th>
              <th style="min-width:50px; max-width:60px;padding:0 10px">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              date_default_timezone_set("Asia/Ho_Chi_Minh");
              if($order){
                $stt=0;
                foreach($order as $row){
                  $stt++;
            ?>
              <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td>0<?php echo number_format($row['phone'], 0, '', ' '); ?></td>

                <td>
                  <?php
                    $date=date_create($row["ngaydathang"]);
                    echo date_format($date,"d-m-Y");
                  ?>
                </td>
                <td><?php echo number_format($row['total'], 0, '', ' '); ?></td>
                <td><?php echo $row["thanhtoan"]; ?></td>
                <td><span class="status" status="<?php echo $row['status']  ?>" style="white-space: nowrap;">
                  <?php echo ($row['status'] == 0) ? 'Chưa duyệt' : 'Đã duyệt' ?>
                </span></td>
                <td id="detail_order" data-toggle="modal" data-target="<?php echo '#Order-'.$row['id'] ?>">
                  <ion-icon name="eye-outline" ></ion-icon>
                </td>
                <td class="text-center">
                  <div class="btn-action">
                    <a href="order/form_update/<?php echo $row["id"];?>" class="btn-edit" id ="btn_edit">
                    <ion-icon name="create-outline"></ion-icon></a>
                    <button key="<?php echo $row["id"];?>"class="btn-delete" id="btn_delete" onclick="handleDelete(this)">
                    <ion-icon name="trash-outline"></ion-icon></button>
                  </div>
                </td>
              </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>

    </div>
    <!-- Button trigger modal -->
  <?php
    if($order){
      foreach($order as $order){
  ?>
    <div class="modal fade" id="<?php echo 'Order-'.$order['id'] ?>" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><?php echo 'Order detail #'.$order['id'] ?></h4>
            <?php
              if($order['status'] == 1){
            ?>
                <div class="img-checked">
                  <img src="<?php echo _WEB_ROOT.'/public/assets/admin/image/checked.png' ?>" alt="">
                </div>
            <?php
              }
            ?>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body" style="font-size:1.2em">
              <div class="row">
                <div class="col-md-4 detail_customer">
                  <div class="detail_customer_title">
                    <h6>Detail Customer</h6>
                  </div>
                  <div class="detail_customer_item">
                    <span class="bold_text">Name:</span>
                    <p><?php echo $order['name'] ?></p>
                  </div>
                  <div class="detail_customer_item">
                    <span class="bold_text">Phone:</span>
                    <p><?php echo $order['phone'] ?></p>
                  </div>
                  <div class="detail_customer_item">
                    <span class="bold_text">Email:</span>
                    <p><?php echo $order['email'] ?></p>
                  </div>
                  <div class="detail_customer_item">
                    <span class="bold_text">Order date:</span>
                    <p>
                      <?php
                        $date=date_create($row["ngaydathang"]);
                        echo date_format($date,"d-m-Y");
                      ?>
                    </p>
                  </div>
                  <div class="detail_customer_item">
                    <span class="bold_text">Address:</span>
                    <p><?php echo $order['address'] ?></p>
                  </div>

                </div>
                <div class="col-md-8 detail_order">
                  <div class="detail_order_title">
                    <h6>Detail Order</h6>
                  </div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Products</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col" style="text-align:center">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $stt=0;
                        $subTotal=0;
                        $order_items= $orderDetails[$order['id']];
                        foreach ($order_items as $detail){
                          // echo "<pre>";
                          // print_r($detail);
                          $stt++;
                          $total = $detail['giatien'] * $detail['soluong'];
                          $subTotal+=$total;
                      ?>

                      <tr>
                        <th scope="row"><?php echo $stt ?></th>
                        <td><?php echo $detail['tensp'] ?></td>
                        <td style="text-align:center"><?php echo number_format($detail['giatien'], 0, '', ' ') ?></td>
                        <td style="text-align:center">x<?php echo $detail['soluong'] ?></td>
                        <td style="text-align:right"><?php echo number_format($total, 0, '', ' ') ?>đ</td>
                      </tr>
                      <?php
                        }
                      ?>
                      <tr>
                        <th scope="row"></th>
                        <th colspan="3">SubTotal:</th>
                        <td style="text-align:right;font-weight:bold"><?php echo number_format($subTotal, 0, '', ' ') ?>đ</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <th colspan="1">Payment method:</th>
                        <td colspan="3" style="text-decoration:underline;text-align:right"><?php echo $order['thanhtoan'] ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <?php
              if($order['status'] == 0){
            ?>
                <button class="button-handleOrder" key="<?php echo $order['id'] ?>" onclick="handleOrder(this)" role="button">Checked</button>
            <?php
              }else{
            ?>
                <button class="button-handleOrder" key="<?php echo $order['id'] ?>" onclick="handleRemoveChecked(this)" role="button">Remove checked</button>
            <?php
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  <?php
      }
    }
  ?>
</div>

<script type="text/javascript">
  var list_Status= document.querySelectorAll('.status')
  list_Status.forEach((item,index) =>{
    let value = item.getAttribute("status")
    console.log(value);
    if(value == 0){
      item.classList.add("return");
    }else{
      item.classList.add("delivered");
    }
  })
</script>
