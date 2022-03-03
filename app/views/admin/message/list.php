<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
      </div>
      <div class="sticky-table">
        <table id="myTable" >
          <thead>
            <tr>
              <th>#</th>
              <th>Id </th>
              <th>Tên khách hàng </th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th>Nội dung</th>
              <th style="min-width:50px;width:60px">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if($message){
                $stt=0;
                foreach($message as $row){
                  $stt++;
            ?>
              <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row["ID"]; ?></td>
                <td><?php echo $row["TENKH"]; ?></td>
                <td><?php echo $row["SDT"]; ?></td>
                <td><?php echo $row["EMAIL"]; ?></td>
                <td><?php echo $row["ND"]; ?></td>
                <td class="text-center">
                  <div class="btn-action" style="display:block">
                    <button key="<?php echo $row["ID"];?>"
                    class="btn-delete" id="btn_delete" onclick="handleDelete(this)">
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
  </div>

