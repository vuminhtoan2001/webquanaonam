<div class="main-table">
    <div class="detail-table">
      <div class="cardHeader">
        <h2><?php echo (!empty($nameTable)) ? $nameTable : 'Chưa có tên bảng'; ?></h2>
        <a href="news/form_add" class= "btn btn-primary btn-sm">
          <span><ion-icon name="add-outline"></ion-icon></span>
          <span>Create product</span>
        </a>
      </div>
      <div class="sticky-table">
        <table id="myTable">
          <thead>
            <tr>
            <th>#</th>
              <th>Mã tin </th>
              <th>Tiêu đề</th>
              <th style = "min-width :150px">Ảnh</th>
              <th style="min-width:300px">Nội dung</th>
              <th style="min-width:300px">Nd ngắn</th>
              <th>Tiêu đề 2</th>
              <th style = "min-width :150px">Ảnh 2</th>
              <th style="min-width:300px">Nội dung 2</th>
              <th>Tiêu đề 3</th>
              <th style = "min-width :150px">Ảnh 3</th>
              <th style="min-width:300px">Nội dung 3</th>
              <th>Ngày đăng</th>
              <th>Loại tin</th>
              <th style="min-width:50px;">Action</th>
            </tr>
          </thead>
          <tbody style="text-align:right">
            <?php
              if($news){
                $stt=0;
                foreach($news as $row){
                  $stt++;
            ?>
              <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row["MATIN"]; ?></td>
		            <td><?php echo $row["TIEUDE"]; ?></td>
                <td><img width="80px" style="margin:auto" src="<?php echo _WEB_ROOT ?>/public/DataUpload/tintuc/<?php echo $row['ANH'];?>"></td>
                <td><?php echo $row["NOIDUNG"]; ?></td>
			          <td><?php echo $row["NDNGAN"]; ?></td>
		            <td><?php echo $row["TIEUDE2"]; ?></td>
                <td><img width="80px" style="margin:auto" src="<?php echo _WEB_ROOT ?>/public/DataUpload/tintuc/<?php echo $row['ANH2'];?>"></td>
                <td><?php echo $row["ND2"]; ?></td>
		            <td><?php echo $row["TIEUDE3"]; ?></td>
                <td><img width="80px" style="margin:auto" src="<?php echo _WEB_ROOT ?>/public/DataUpload/tintuc/<?php echo $row['ANH3'];?>"></td>
                <td><?php echo $row["ND3"]; ?></td>
                <td><?php echo $row["NGAYDANG"]; ?></td>
			          <td><?php echo $row["LOAITIN"]; ?></td>
                <td class="text-center">
                  <div class="btn-action">
                    <a href="news/form_update/<?php echo $row["MATIN"];?>" class="btn-edit" id ="btn_edit">
                    <ion-icon name="create-outline"></ion-icon></a>
                    <button key="<?php echo $row["MATIN"];?>"class="btn-delete" id="btn_delete" onclick="handleDelete(this)">
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