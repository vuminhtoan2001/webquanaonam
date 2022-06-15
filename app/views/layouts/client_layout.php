<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="<?php echo _WEB_ROOT; ?>/public/favicon.ico" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo !empty($title) ? $title : 'Trang chủ'; ?></title>
  <!--Thư viện ngoài -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="./public/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./public/slick/slick-theme.css">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="style.css"> <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  <!-- Sweet Alert -->
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.css'>
  <!-- End -->
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/slick.css">
  <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/clients/css/style.css">
</head>
<body>
  <?php $this->render('blocks/header'); ?>
  <div class="container">
  <?php $this->render($content, $sub_content); ?>
  </div>
  <?php $this->render('blocks/footer'); ?>
  <button class="back-to-top" onclick="backToTop()">⇧</button>
  <!-- JavaScript slick -->
  <!-- Sweet alert -->
  <script src = "https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="public/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script>
    // if(document.documentElement.clientWidth > 768){
    //   itemSlides=4;
    // }else if(document.documentElement.clientWidth > 576 && document.documentElement.clientWidth <= 768 ){
    //   itemSlides=3;
    // }else{
    //   itemSlides=2
    // }
    // $(document).on('ready', function() {
    //       $(".regular").slick({
    //       autoplay: true,
    //       autoplaySpeed: 2000,
    //       dots: false,
    //       infinite: true,
    //       slidesToShow: itemSlides,
    //       slidesToScroll: 1
    //       });

    //   });
  </script>
<!-- Script -->
  <script type="text/javascript" src="<?php echo _WEB_ROOT; ?>/public/assets/clients/js/script.js"> </script>
  <script type="text/javascript" src="<?php echo _WEB_ROOT; ?>/public/assets/clients/js/slick.js"> </script>

</body>
</html>