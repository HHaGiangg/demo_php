<?php  
     require_once __DIR__. "/autoload/autoload.php";
     

     $data =
    [
        'email'=> postInput("email"),
        'password' =>(postInput("password"))
        
    ];

    $error = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if($data['email'] == '')
        {
            $error['email'] = " Email không được để trống !";
        }


        if($data['password'] == '')
        {
            $error['password'] = " Mật khẩu không được để trống !";
        }
        

        if(empty($error))
        {
            $is_check = $db->fetchOne("users"," email ='".$data['email']."' AND password = '".md5($data['password'])."' ");
          
           
           if($is_check != NULL)
           {
            $_SESSION['name_user'] = $is_check['name'];
            $_SESSION['name_id']   = $is_check['id'];
            echo "<script>alert('Đăng nhập thành công');location.href='index.php'</script>";
           }
           else
           {
            $_SESSION['error'] = "Đăng nhập thất bại";  
           }
        }
    }


         
?>
<?php  require_once __DIR__. "/layouts/header.php";?>

        <div class="col-md-9 bor">

        <section class="box-main1">
        <h3 class="title-main"><a href=""> Đăng Nhập </a></h3>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                  <strong style="color: #3c763d;">Success!</strong> <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                </div>
            <?php endif ?>

             <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                  <strong style="color: red;">Error!</strong> <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                </div>
            <?php endif ?>
            
             <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
                
                    
                    <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2"></div>
                        <label class="col-md-2 col-md-offset-1"> Email</label>
                        <div class="col-md-8">
                            <input type="email" name="email" placeholder="hhgiang.17it2@sict.udn.vn" class="form-control">
                            <?php if (isset($error['email'])): ?>
                                <p class="text-danger"><?php echo $error['email'] ?></p>
                            <?php endif ?>
                        </div>
                </div>
                    
                    <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2"></div>
                        <label class="col-md-2 col-md-offset-1"> Mật Khẩu</label>
                        <div class="col-md-8">
                            <input type="password" name="password" placeholder="********" class="form-control">
                            <?php if (isset($error['password'])): ?>
                                <p class="text-danger"><?php echo $error['password'] ?></p>
                            <?php endif ?>
                        </div>
                </div>
                    
                    <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px "> Đăng Nhập</button>

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