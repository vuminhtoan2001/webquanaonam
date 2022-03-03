<?php
   if($news){
?>
    <div class="container-fluid"  style="background-color: #f5f4f3;padding:10px">
        <div class="menu" style="font-size :15px;">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ </a>/ <a href="index.php?go=tintuc">Tin tức</a> / <?php echo $news['TIEUDE'];?>
        </div>
    </div>
    <div class="container" style="margin-top: 40px">
        <h3 style="color:#005494; font-weight:bold">
            <?php echo $news['TIEUDE']; ?>
        </h3>
        <i class="far fa-calendar-alt" style="padding: 5px;">
        <?php
            $date=date_create($news["NGAYDANG"]);
            echo date_format($date,"d-m-Y");
        ?>
        </i>
        <hr>
        <div class="row">
            <div class="col-12 col-md-9">
                <p><?php  echo $news['NOIDUNG']?></p>
                <b><?php echo $news['TIEUDE2'] ?></b>
                <img src="<?php echo _WEB_ROOT ?>/public/DataUpload/tintuc/<?php echo $news['ANH2'] ?>"  class=" img container-fluid" style=" margin-top:30px">


                <p style="margin-top:30px"><?php echo $news['ND2'] ?></p>

                <b><?php echo $news['TIEUDE3'] ?></b>
                <img src="DataUpload/<?php echo $news['ANH3'] ?>" alt="" class=" img container-fluid" style="margin-top:20px">
                <p style="margin-top:30px"><?php echo $news['ND3'] ?></p>

            </div>
            <div class="col-12 col-md-3">
                <?php
                    if($newnews){ ?>
                        <hr>
                        <h5 style="color:#005494">HOT NEW</h5>
                    <?php
                        foreach($newnews as $r){
                ?>
                <a href="<?php echo _WEB_ROOT?>/news/detail/<?php  echo $r['MATIN']; ?>" >
                    <img src="<?php echo _WEB_ROOT ?>/public/DataUpload/tintuc/<?php echo $r['ANH'] ?>" alt="" width="100%" style="margin-top:20px">
                    <h6 style="color:black; margin-top:20px" ><b><?php echo $r['TIEUDE'] ?></b></h6>
                </a>
                <?php
                        }
                ?>
                    <a href="<?php echo _WEB_ROOT ?>/news" style="color: #005494">Xem thêm ></a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
<?php
}
?>