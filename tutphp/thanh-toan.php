<?php   require_once __DIR__. "/autoload/autoload.php";	

	$user = $db->fetchID("users",intval($_SESSION['name_id']));

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$data = 
		[
			'amount' => $_SESSION['total'],
			'users_id' => $_SESSION['name_id'],
			'note' => postInput('note')
		];
		
		$idtran = $db->insert('transaction',$data);
		if($idtran > 0)
		{
			foreach ($_SESSION['cart'] as $key => $value) 
			{
				$data2 = 
				[
					'transaction_id' => $idtran,
					'product_id'	 => $key,
					'qty'			 => $value['qty'],
					'price' 		 => $value['price']
				];	

				$id_insert = $db->insert('orders', $data2);
			}

			unset($_SESSION['cart']);
   			unset($_SESSION['total']);
			
			$_SESSION['success'] = "Lưu thông tin thành công ! Chúng tôi sẽ liên hệ với bạn sớm nhất !";
			header("location: thong-bao.php");
		}
	}




?>
<?php  require_once __DIR__. "/layouts/header.php";?>

        <div class="col-md-9 bor">
            <h3 class="title-main"><a href=""> Thanh toán đơn hàng</a> </h3>
           <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
            	<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Tên Thành Viên</label>
            			<div class="col-md-8">
            				<input type="text" readonly="" name="name" placeholder="Hồ Hà Giang" class="form-control" value="<?php echo $user['name'] ?>">
							
            			</div>
            	</div>
            		
					
					<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Email</label>
            			<div class="col-md-8">
            				<input type="email" readonly="" name="email" placeholder="hhgiang.17it2@sict.udn.vn" class="form-control" value="<?php echo $user['email'] ?>">
            				
            			</div>
            	</div>

            		<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Số Điện Thoại</label>
            			<div class="col-md-8">
            				<input type="number" readonly="" name="phone" placeholder="0337302525" class="form-control" value="<?php echo $user['phone'] ?>">
            				
            			</div>
            	</div>

					<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Địa Chỉ</label>
            			<div class="col-md-8">
            				<input type="text" readonly="" name="address" placeholder="Vinh - Nghệ An" class="form-control" value="<?php echo $user['address'] ?>">
            				
            			</div>
            	</div>

            	<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Số Tiền Thanh Toán</label>
            			<div class="col-md-8">
            				<input type="text" readonly="" name="address" placeholder="address" class="form-control" value="<?php echo formatPrice($_SESSION['total']) ?>">
            				
            			</div>
            	</div>



					<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Ghi Chú</label>
            			<div class="col-md-8">
            				<input type="text" name="note" placeholder="Vinh - Nghệ An" class="form-control" value="">
            				
            			</div>
            	</div>

            		<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px "> Xác Nhận</button>

            	</form>	
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