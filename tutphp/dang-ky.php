<?php   require_once __DIR__. "/autoload/autoload.php";	
	if(isset($_SESSION['name_id']))
	{
		echo "<script>alert('Bạn đã có tài khoản nên không thể vào trang');location.href='index.php'</script>";
	}
	
	$data =
	[
		'name' => postInput("name"),
		'email'=> postInput("email"),
		'password' =>(postInput("password")),
		'address'=> postInput("address"),
	    'phone'   =>postInput("phone")

	];
	$error = [];

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($data['name'] == '')
		{
			$error['name'] = " Tên không được để trống !";
		}

		if($data['email'] == '')
		{
			$error['email'] = " Email không được để trống !";
		}
		else
		{
			$is_check = $db->fetchOne("users"," email ='".$data['email']."' ");
			if($is_check != NULL)
			{
				$error['email'] = "Email đã tồn tại! Mời bạn nhập email khác";
			}
		}


		if($data['password'] == '')
		{
			$error['password'] = " Mật khẩu không được để trống !";
		}
		else
		{
			$data['password'] = MD5(postInput("password"));
		}

		if($data['phone'] == '')
		{
			$error['phone'] = " Số điện thoại không được để trống !";
		}

		
		if($data['address'] == '')
		{
			$error['address'] = " Địa chỉ không được để trống !";
		}

		if(empty($error))
		{
			$idinsert = $db->insert("users",$data);
			if($idinsert > 0)
			{
				$_SESSION['success'] = "Đăng Ký Thành Công ";
				header("location:dang-nhap.php");
			}
			else
			{
				
			}
		}
	
	}

 ?>

<?php  require_once __DIR__. "/layouts/header.php";?>
        <div class="col-md-9 bor">
            <section class="box-main1">
            	<h3 class="title-main"><a href=""> Đăng Ký Thành Viên </a></h3>
            	<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
            	<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Tên Thành Viên</label>
            			<div class="col-md-8">
            				<input type="text" name="name" placeholder="Hồ Hà Giang" class="form-control" value="<?php echo $data['name'] ?>">
							<?php if (isset($error['name'])): ?>
								<p class="text-danger"><?php echo $error['name'] ?></p>
							<?php endif ?>
            			</div>
            	</div>
            		
					
					<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Email</label>
            			<div class="col-md-8">
            				<input type="email" name="email" placeholder="hhgiang.17it2@sict.udn.vn" class="form-control" value="<?php echo $data['email'] ?>">
            				<?php if (isset($error['email'])): ?>
								<p class="text-danger"><?php echo $error['email'] ?></p>
							<?php endif ?>
            			</div>
            	</div>
            		
            		<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Mật Khẩu</label>
            			<div class="col-md-8">
            				<input type="password" name="password" placeholder="********" class="form-control" value="<?php echo $data['password'] ?>">
            				<?php if (isset($error['password'])): ?>
								<p class="text-danger"><?php echo $error['password'] ?></p>
							<?php endif ?>
            			</div>
            	</div>
            		
            		<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Số Điện Thoại</label>
            			<div class="col-md-8">
            				<input type="number" name="phone" placeholder="0337302525" class="form-control" value="<?php echo $data['phone'] ?>">
            				<?php if (isset($error['phone'])): ?>
								<p class="text-danger"><?php echo $error['phone'] ?></p>
							<?php endif ?>
            			</div>
            	</div>

					<div class="form-group">
            		<div class="col-sm-10 col-sm-offset-2"></div>
            			<label class="col-md-2 col-md-offset-1"> Địa Chỉ</label>
            			<div class="col-md-8">
            				<input type="text" name="address" placeholder="Vinh - Nghệ An" class="form-control" value="<?php echo $data['address'] ?>">
            				<?php if (isset($error['address'])): ?>
								<p class="text-danger"><?php echo $error['address'] ?></p>
							<?php endif ?>
            			</div>
            	</div>

            		<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px "> Đăng Ký</button>

            	</form>	
                
            </section>
        </div>
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