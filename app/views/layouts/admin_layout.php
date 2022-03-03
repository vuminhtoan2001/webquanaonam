<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo (!empty($title)) ? $title : 'Trang quản trị'; ?></title>
  <!-- font icon -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- plugin datatables.net -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <!-- Summer note -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
  <!-- Sweet Alert -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.css'>
  <!--  -->
  <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/admin/css/style.css">
</head>
<body>
  <div class="admin">
    <div class="navigation">
      <?php $this->render('blocks/navigation') ?>
    </div>
    <div class="main">
      <?php
        $this->render('blocks/topbar');
        if(!empty($err)){
          ?>
             <div class="err"><?php echo $err; ?></div>
       <?php     }
        $this->render($content, $sub_content);
      ?>
    </div>
  </div>

  <!-- Style JS -->
  <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/js/script.js"></script>
  <!-- Sweet alert -->
  <script src = "https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.js"></script>
  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  <!-- Data table -->
  <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable({
      lengthMenu:[5,7,10,25,50, "All"],
    });
} );
  </script>
</body>
</html>