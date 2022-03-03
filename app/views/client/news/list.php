<form class="container" style="margin-top: 20px;" method="GET">
  <h4 style="margin:30px auto; text-align:center; color:#005494;" class="">HOT NEWS</h4>
  <div class="row" style="margin-top:20px">
    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
        <div class="list-group">
        <button type="button" class="btn btn-dark active" aria-current="true">
        DANH MỤC TIN TỨC
        </button>
        <?php

            if($type_news){
            foreach($type_news as $r){
        ?>
        <a class="list-group-item list-group-item-action" href="<?php echo _WEB_ROOT ?>/news/category/<?php  echo $r['LOAITIN']; ?>">
            <?php
                echo $r['LOAITIN'];
            ?>
        </a>
        <?php
                }
            }
        ?>
    </div>
    </div>
    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
        <?php
        if($news_list){
            foreach($news_list as $r){
        ?>
            <div class="row">
            <div class="col-4">
                <img src="<?php echo _WEB_ROOT ?>/public/DataUpload/tintuc/<?php echo $r['ANH'];?>" alt="" width="100%">
            </div>
            <div class="col-8">
            <h5 class="tintuc=tieude">
                <a href="<?php echo _WEB_ROOT ?>/news/detail/<?php  echo $r['MATIN']; ?>" style="color:black"><?php echo $r['TIEUDE']; ?></a>
            </h5>
            <i class="far fa-calendar-alt" style="padding: 5px;">
                <?php
                    $date=date_create($r["NGAYDANG"]);
                    echo date_format($date,"d-m-Y");
                ?>
            </i>
            <p id="content"><?php echo $r['NDNGAN']; ?></p>
            </div>
            <hr style="margin-top: 10px">
            </div>
        <?php
                }
            }
        ?>
    </div>
  </div>
  <!-- pagination -->
  <?php
    if(file_exists(_DIR_ROOT.'/app/views/blocks/pagination.php') && isset($sum_page)){
        require_once _DIR_ROOT.'/app/views/blocks/pagination.php';
    }
  ?>
  <!-- pagination -->
</form>
