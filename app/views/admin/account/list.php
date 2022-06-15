<div class="main-table">
  <div class="detail-table">
    <div class="cardHeader">
      <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
      <a href="account/form_add" class= "btn btn-primary btn-sm">
        <span><ion-icon name="add-outline"></ion-icon></span>
        <span>Create product</span>
      </a>
    </div>
    <div class="sticky-table">
      <table id="myTable" >
        <thead>
          <tr>
            <th>#</th>
            <th>Id </th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Email</th>
            <th>Quyền</th>
            <th style="min-width:50px;width:60px">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($account){
              $stt=0;
              foreach($account as $row){
                $stt++;
          ?>
            <tr>
              <td><?php echo $stt; ?></td>
              <td><?php echo $row["ID"]; ?></td>
              <td><?php echo $row["username"]; ?></td>
              <td><?php echo $row["password"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["level"]; ?></td>
              <td class="text-center">
                <div class="btn-action">
                  <a href="account/form_update/<?php echo $row["ID"];?>" class="btn-edit" id ="btn_edit">
                  <ion-icon name="create-outline"></ion-icon></a>
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

