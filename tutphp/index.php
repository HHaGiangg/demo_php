<?php   
    
    require_once __DIR__. "/autoload/autoload.php";
    

    unset($_SESSION['cart']);
    $sqlHomecate = "SELECT name , id FROM  category WHERE home = 1  ORDER BY updated_at ";
    $CategoryHome = $db->fetchsql($sqlHomecate);    
    
   
   $data = [];

   foreach ($CategoryHome as $item ) {
      $cateId = intval($item['id']);
      
      $sql = "SELECT * FROM product WHERE category_id = $cateId";
      $ProductHome = $db->fetchsql($sql);
      $data[$item['name']] = $ProductHome;
   }
?>
    <?php   require_once __DIR__. "/layouts/header.php";?>
        <div class="col-md-9 bor">  
        <section id="slide" class="text-center" >
            <img src="./public/frontend/images/banner.jpg" class="weight="35%", height="30%" ">
        </section>
        <section class="box-main1">
            <?php foreach ($data as $key => $value): ?>
                <h3 class="title-main"><a href=""> <?php echo $key ?></a> </h3>
                <div class="showitem" style=" margin-top: 10px; margin-bottom: 10px;">
                <?php foreach ($value as $item): ?>
                    <div class="col-md-3 item-product height-product bor">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>?">
                            <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="80%">
                        </a>
                        <div class="info-item">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>?""><?php echo $item['name'] ?></a>
                            <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?> </b></p>
                        </div>
                        <div class="hidenitem">
                            <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>?""><i class="fa fa-search"></i></a></p>
                            <p><a href=""><i class="fa fa-heart"></i></a></p>
                            <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            <?php endforeach ?>
        </section>
    </div>
        </div>
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