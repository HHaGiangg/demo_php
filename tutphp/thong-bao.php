<?php   require_once __DIR__. "/autoload/autoload.php";	

	unset($_SESSION['cart']);
    unset($_SESSION['total']);
    
 	$_SESSION['success'] = "Lưu thông tin thành công ! Chúng tôi sẽ liên hệ với bạn sớm nhất !";


?>
<?php  require_once __DIR__. "/layouts/header.php";?>

        <div class="col-md-9 bor">
            <h3 class="title-main"><a href="">Thông báo thanh toán</a> </h3>
                            <?php if (isset($_SESSION['success'])): ?>
								<div class="alert alert-success">
									<strong style="color: #3c763d;">Success!</strong> <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
								</div>
							<?php endif ?>
                            <a href="index.php" class="btn btn-success">Trở về trang chủ</a>
           
                </div>
            </section>
        </div>
<?php  require_once __DIR__. "/layouts/footer.php";?>











<!DOCTYPE html>
<html>
	<head>
        <title>LapTop Shop</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/frontend/css/bootstrap.min.css">
        <script  src="<?php echo base_url(); ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url(); ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
    </head>
<body>
	<div>
		<?php  require_once __DIR__. "/layouts/header.php";?>
	</div>


	<div>
		<?php  require_once __DIR__. "/layouts/footer.php";?>
	</div>

</body>
</html>