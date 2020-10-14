<?php   
	
	require_once __DIR__. "/autoload/autoload.php";	

	$sum = 0;
	
	if( ! isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    {
        echo "<script>alert('Không có sản phẩm trong giỏ hàng'); location.href='index.php'</script>"; 
    }








?>
<?php  require_once __DIR__. "/layouts/header.php";?>

        
<div class="col-md-9 ">
    <section class="box-main1">
        <h3 class="title-main"><a href=""> Giỏ hàng của bạn </a> </h3>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <strong style="color: #3c763d;">Success!</strong> <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
            </div>
        <?php endif ?>
        <table class="table table-hover" id="shoppingcart-info">
               <thead>
                  <tr>
                     <th>STT</th>
                     <th>Tên sản phầm</th>
                     <th>Hình ảnh</th>
                     <th>Số lượng</th>
                     <th>Giá</th>
                     <th>Tổng tiền</th>
                     <th>Thao tác</th>
                 </tr>
             </thead>

             <tbody>
                <?php $stt = 1 ;foreach ($_SESSION['cart'] as $key => $value): ?>                      		
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td>
                            <img src="<?php echo uploads() ?>product/<?php echo $value['thunbar'] ?>" width="80px" height="80px">
                        </td>
                        <td>
                            <input type="number" name="qty" value="<?php echo $value['qty'] ?>" class=" qty" id="qty" min="0">
                        </td>
                        <td><?php echo formatPrice($value['price']); ?></td>
                        <td><?php echo formatPrice($value['price'] * $value['qty']); ?></td>
                        <td>
                            <a href="remove.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i>Remove</a>
                            <a href="" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?>><i class="fa fa-refresh"></i>Update</a>
                        </td>
                    </tr>
                <?php $sum += $value['price'] * $value['qty']; $_SESSION['tongtien'] = $sum; ?>
                <?php $stt++; endforeach ?>
            </tbody>


    </table>
    <div class="col-md-5 pull-right">   
        <ul class="list-group">
            <li class="list-group-item">    
                <h3> Thông tin đơn hàng </h3>
            </li>

            <li class="list-group-item">    
                <span class="badge"><?php echo formatPrice($_SESSION['tongtien']); ?></span>
                Số tiền
             </li>

             <li class="list-group-item">    
                 <span class="badge">10%</span>
                 Thuế vật
             </li>

             <li class="list-group-item">    
                 <span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien'] * 110/100; echo 
                 formatPrice($_SESSION['total']); ?></span>
                 Tổng tiền thanh toán
             </li>

             <li class="list-group-item">    
                 <a href="index.php" class="btn btn-success">Tiếp tục mua hàng</a>
                 <a href="thanh-toan.php" class="btn btn-success">Thanh toán</a>
             </li>
        </ul>
    </div>
</section>
</div>
	
</div>
	
            			
            		





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