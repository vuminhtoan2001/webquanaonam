<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
        <a href="storages/form_add" class= "btn btn-primary btn-sm">
          <span><ion-icon name="add-outline"></ion-icon></span>
          <span>Create product</span>
        </a>
      </div>
      <div class="sticky-table">
        <table id="myTable" >
          <thead>
            <tr>
              <th scope="col"># </th>
              <th scope="col">Mã sản phẩm </th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Ảnh</th>
              <th scope="col">Số lượng hiện có</th>
              <th scope="col">Số lượng bán</th>
              <th scope="col">Số lượng tồn kho</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if($storages){
                $stt=0;
                foreach($storages as $row){
                  $stt++;
            ?>
              <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row["MASP"]; ?></td>
                <td><?php echo $row["TENSP"]; ?></td>
                <td><img width="80px" style="margin:auto" src="<?php echo _WEB_ROOT ?>/public/DataUpload/<?php echo $row['ANH'];?>"></td>
                <td style="font-size: large;"><?php echo $row["SOLUONG"]; ?></td>
                <td style="font-size: large;"><b><?php echo $row["xuatsoluong"]; ?></b></td>
                <td
                <?php
                  if($row["tonkho"] <=0){
                    echo 'style="font-size: large;background-color: #EC7E94
                    ;color:white"';
                  }
                ?>
                >
                <b><?php echo $row["tonkho"]; ?></b></td>
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

