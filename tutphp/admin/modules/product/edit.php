
<?php
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";



$id = intval(getInput('id'));


    $Editproduct = $db->fetchID("product", $id);
    if(empty($Editproduct))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại ";
        redirectAdmin("product");
    }

   
    $category = $db->fetchAll("category");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput("slug")),
            "category_id" => postInput("category_id"),
            "price" => postInput("price"),
            "number" => postInput("number"),
            "content" => postInput("content"),

        ];

        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Mời bạn nhập đầy đủ tên danh mục ";
        }
         $error = [];
        if(postInput('slug') == '')
        {
            $error['slug'] = "Mời bạn nhập đầy đủ tên danh mục ";
        }

        $error = [];
        if(postInput('category_id') == '')
        {
            $error['category_id'] = "Mời bạn chọn tên danh mục ";
        }

        if(postInput('price') == '')
        {
            $error['price'] = "Mời bạn nhập giá sản phẩm ";
        }

        if(postInput('number') == '')
        {
            $error['number'] = "Mời bạn nhập số lượng ";
        }
        if(postInput('content') == '')
        {
            $error['content'] = "Mời bạn nhập nội dung sản phẩm ";
        }

        if(! isset($_FILES['thunbar']))
        {


            $error['thunbar'] = "Mời bạn chọn hình ảnh ";
        }





        //error trống nghĩa là không có lỗi
        if(empty($error))
        {
            if ( isset($_FILES['thunbar'])) 
           {
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_erro = $_FILES['thunbar']['error'];

                if ($file_erro == 0)
                {
                    $part = ROOT ."/product/";
                    $data['thunbar'] = $file_name;
                }
           }
            $update = $db->update("product",$data,array("id"=>$id));
            if($update > 0)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = "Cập nhật thành công";

                redirectAdmin("product");
            }
            else
               {
                $_SESSION['error'] = "Cập nhật thất bại";
                redirectAdmin("product");
               }
        }
    }

    require_once __DIR__. "/../../layouts/header.php";
?>
<!-- Page Heading Noi Dung-->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
           Thêm Mới Sản Phẩm
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>
                <a href="index.html">Dashboard</a>
            </li>
            <li>
                <i></i>
                <a href="">Sản Phẩm</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i>
                Thêm Mới
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
                <label for="inputEmail3" class="col-sm-2 control-label">Danh Mục Sản Phẩm</label>
                <div class="col-sm-8">
                    <select class="form-control col-md-8" name="category_id">
                        <option value=""> - Mời Bạn Chọn Danh Mục Sản Phẩm - </option>
                        <?php foreach ($category as $item): ?>
                            <option value="<?php echo $item['id'] ?>"<?php echo $Editproduct['category_id'] == $item['id'] ? "select = 'selected'" : '' ?> ><?php echo $item['name']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Tên Danh Mục" name="name">
                    <?php if (isset($error['category'])): ?>
                        <p class="text-danger">
                            <?php echo $error['category']?>
                        </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tên Sản Phẩm</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Tên Danh Mục" name="name" value="<?php echo $Editproduct['name'] ?>">
                    <?php if (isset($error['name'])): ?>
                        <p class="text-danger">
                            <?php echo $error['name']?>
                        </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Giá</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="24.000.000" name="price" value="<?php echo $Editproduct['price'] ?>" >
                    <?php if (isset($error['price'])): ?>
                        <p class="text-danger">
                            <?php echo $error['price']?>
                        </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Giarm giá</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="10%" name="sale" value="<?php echo $Editproduct['sale'] ?>">
                    
                </div>
            </div>
             <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Hình Ảnh</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="inputEmail3" name="thunbar">
                    <?php if (isset($error['thunbar'])): ?>
                        <p class="text-danger"> <?php echo $error['thunbar']?> </p>
                    <?php endif ?>
                    <img src="<?php echo uploads() ?>product/<?php echo $Editproduct['thunbar']?>" width="40px"; height="40px" >
                    </div>
            </div>
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Số Lượng</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="100" name="number" value="<?php echo $Editproduct['number'] ?>">
                                <?php if (isset($error['number'])): ?>
                                    <p class="text-danger">
                                        <?php echo $error['number']?>
                                    </p>
                                <?php endif ?>
                            </div>
                        </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nội Dung</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="content" rows="10"><?php echo $Editproduct['content'] ?></textarea>
                    <?php if (isset($error['content'])): ?>
                        <p class="text-danger">
                            <?php echo $error['content']?>
                        </p>
                    <?php endif
                     ?>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success" >Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.row -->
<?php require_once __DIR__. "/../../layouts/footer.php";  ?>