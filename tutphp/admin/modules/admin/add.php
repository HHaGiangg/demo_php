
<?php
    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";

     $data =
        [
            "name" => postInput('name'),
            "email" =>postInput("email"),
            "phone" => postInput("phone"),
            "password" => MD5(postInput("password")),
            "address" => postInput("address"),
            "level" => postInput("level")

        ];

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       

        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Mời bạn nhập tên ";
        }

        $error = [];
        if(postInput('email') == '')
        {
            $error['email'] = "Mời bạn nhập email ";
        }

        if(postInput('phone') == '')
        {
            $error['phone'] = "Mời bạn nhập số điện thoại ";
        }

        if(postInput('password') == '')
        {
            $error['password'] = "Mời bạn nhập mật khẩu ";
        }
        if(postInput('address') == '')
        {
            $error['address'] = "Mời bạn nhập địa chỉ ";
        }

        if($data['password'] != MD5(postInput("re_password")))
        {
            $error['password'] = "Mật khẩu không khớp" ;
        }

        //error trống nghĩa là không có lỗi
        if(empty($error))
        {
           
          $id_insert = $db->insert("admin", $data);
          if($id_insert)
          {
            
            $_SESSION['success'] = "Thêm mới thành công";
            redirectAdmin("admin");
            }
            else
            {
                $_SESSION['error'] = "Thêm mới thất bại";
            }
          }
     }
    require_once __DIR__. "/../../layouts/header.php";
?>
<!-- Page Heading Noi Dung-->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
           Thêm Mới Admin
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li>
                <i></i>  <a href="">Admin</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Thêm Mới
            </li>
        </ol>
         <!--thông báo lỗi -->
        <?php  require_once __DIR__. "/../../../partials/notification.php"; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
            
            

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Họ Và Tên</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Tên Danh Mục" name="name" >
                    <?php if (isset($error['name'])): ?>
                        <p class="text-danger">
                            <?php echo $error['name']?>
                        </p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="hhgiang.17it2@sict.udn.vn" name="email" >
                    <?php if (isset($error['email'])): ?>
                        <p class="text-danger">
                            <?php echo $error['email']?>
                        </p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Số Điện Thoại</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="0337302525" name="phone">
                                <?php if (isset($error['phone'])): ?>
                                    <p class="text-danger">
                                        <?php echo $error['phone']?>
                                    </p>
                                <?php endif ?>
                            </div>
                        </div>
                
                <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Mật Khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputEmail3" placeholder="********" name="password">
                                <?php if (isset($error['password'])): ?>
                                    <p class="text-danger">
                                        <?php echo $error['password']?>
                                    </p>
                                <?php endif ?>
                            </div>
                        </div>


                <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"> Nhập Lại Mật Khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputEmail3" placeholder="********" name="re_password" required="">
                                <?php if (isset($error['re_password'])): ?>
                                    <p class="text-danger">
                                        <?php echo $error['re_password']?>
                                    </p>
                                <?php endif ?>
                            </div>
                        </div>

                <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Địa Chỉ</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Vinh - Nghệ An" name="address" >
                    <?php if (isset($error['address'])): ?>
                        <p class="text-danger">
                            <?php echo $error['address']?>
                        </p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                <div class="col-sm-8">
                    <select class="form-control" name="level">
                        <option value="1" >CTV</option>
                        <option value="2" >Admin</option>
                    </select>
                    <?php if (isset($error['level'])): ?>
                        <p class="text-danger">
                            <?php echo $error['level']?>
                        </p>
                    <?php endif ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>