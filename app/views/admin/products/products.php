<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
        <a href="products/form_add" class= "btn btn-primary btn-sm">
          <span><ion-icon name="add-outline"></ion-icon></span>
          <span>Create product</span>
        </a>
      </div>
      <div class="sticky-table">
        <table id="myTable" >
          <thead>
            <tr>
              <th>#</th>
              <th>Mã sản phẩm </th>
              <th>Tên sản phẩm</th>
              <th>Giá sale</th>
              <th>Giá bán</th>
              <th>Số lượng</th>
              <th>Ngày nhập</th>
              <th style = "min-width :150px">Ảnh</th>
              <th style="min-width:300px">Mô tả  </th>
              <th>Màu sắc</th>
              <th style="min-width:300px">Chất liệu</th>
              <th>Mã hàng sản xuất</th>
              <th>Mã loại</th>
              <th>View</th>
              <th style="min-width:50px;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if($products){
                $stt=0;
                foreach($products as $row){
                  $stt++;
            ?>
              <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row["MASP"]; ?></td>
                <td><?php echo $row["TENSP"]; ?></td>
                <td><?php echo $row["GIA_SALE"]; ?></td>
                <td><?php echo $row["GIA"]; ?></td>
                <td><?php echo $row["SOLUONG"]; ?></td>
                <td><?php echo $row["NGAYNHAP"]; ?></td>
                <td><img width="80px" style="margin:auto" src="<?php echo _WEB_ROOT ?>/public/DataUpload/<?php echo $row['ANH'];?>"></td>
                <td><?php echo $row["MOTA"]; ?></td>
                <td><?php echo $row["MAUSAC"]; ?></td>
                <td><?php echo $row["CHATLIEU"]; ?></td>
                <td><?php echo $row["MAHANGSX"]; ?></td>
                <td><?php echo $row["MALOAI"]; ?></td>
                <td><?php echo $row["VIEW"]; ?></td>
                <td class="text-center">
                  <div class="btn-action">
                    <a href="products/form_update/<?php echo $row["MASP"];?>" class="btn-edit" id ="btn_edit">
                    <ion-icon name="create-outline"></ion-icon></a>
                    <button key="<?php echo $row["MASP"];?>"
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

