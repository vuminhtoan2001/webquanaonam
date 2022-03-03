<!-- Cards -->
<div class="cardBox">
  <div class="cardBox__card">
    <div class="card-text">
      <div class="numbers">
        <?php
          if(isset($view)){
            echo $view;
          }
        ?>
      </div>
      <div class="cardName">View</div>
    </div>
    <div class="iconBx">
      <ion-icon name="eye-outline"></ion-icon>
    </div>
  </div>
  <div class="cardBox__card">
    <div>
      <div class="numbers">
        <?php
          if(isset($sale)){
            echo $sale;
          }
        ?>
      </div>
      <div class="cardName">Sale</div>
    </div>
    <div class="iconBx">
      <ion-icon name="cart-outline"></ion-icon>
    </div>
  </div>
  <div class="cardBox__card">
    <div>
      <div class="numbers">
        <?php
          if(isset($message)){
            echo $message;
          }
        ?>
      </div>
      <div class="cardName">Comments</div>
    </div>
    <div class="iconBx">
      <ion-icon name="chatbubbles-outline"></ion-icon>
    </div>
  </div>
  <div class="cardBox__card">
    <div>
      <div class="numbers">
        <?php
          if(isset($earning)){
            echo number_format($earning);
          }
        ?>đ
      </div>
      <div class="cardName">Daily Earning</div>
    </div>
    <div class="iconBx">
       <ion-icon name="cash-outline"></ion-icon>
    </div>
  </div>
</div>
<!-- detail List -->
<div class="details">
  <!-- Order -->
  <div class="recentOrders">
    <div class="cardHeader">
      <h2>Recent Orders</h2>
      <a href="#" class="btn">View All</a>
    </div>
    <table>
      <thead>
        <tr>
          <td>Name</td>
          <td style="text-align:center">Price</td>
          <td style="text-align:center">Payment</td>
          <td style="text-align:center">Status</td>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($recentOrders)){
          foreach($recentOrders as $row){
        ?>
          <tr>
          <td><?php echo $row['name'] ?></td>
          <td style="text-align:right"><?php echo number_format($row['total']) ?>đ</td>
          <td style="text-align:center"><?php echo $row['thanhtoan'] ?></td>
          <td style="text-align:center"><span class="status" status="<?php echo $row['status']  ?>" style="white-space: nowrap;">
                  <?php echo ($row['status'] == 0) ? 'Chưa duyệt' : 'Đã duyệt' ?>
                </span></td>
        </tr>
        <?php
          }
        }
        ?>

      </tbody>
    </table>
  </div>

  <!-- new customers -->
  <div class="recentCustomers">
    <div class="cardHeader">
      <h2>Recent Customers</h2>
    </div>
    <table>
      <?php
        if(isset($recentCustomers)){
          foreach($recentCustomers as $row){
      ?>
      <tr>
        <td width="60px"><div class="imgBx"> <img src="<?php echo _WEB_ROOT  ?>/public/assets/admin/image/client.jpg" alt="use-img"></div>
        </td>
        <td>
          <h4><?php echo $row['name'] ?></h4>
          <b style="font-size: 13px;">
            0<?php echo number_format($row['phone'], 0, '', ' ') ?>
          </b>
        </td>
      </tr>
      <?php
          }
        }
      ?>
    </table>
  </div>

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
