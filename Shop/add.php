<?php include_once 'connect/database.php';

if (isset($_POST['add-slide'])){
    $file = $_FILES['file'];
    $explode = explode('.',$file['name']);
    $end = end($explode);
    $new = "img-".time().'.'.$end; // img-211545.png
    move_uploaded_file($file['tmp_name'],"image/slider/".$new);
    $query = "INSERT INTO slider SET pic=?";
    $action->inud($query,[$new]);
    if ($action == true){
        $success = "تصویر مورد نظر با موفقیت انجام شد";
    }else{
        echo "no";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Add</title>
</head>
<body>
<div class="boxfather">
        <div class="leftbox" style="margin-top: 15px">
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="alert alert-secondary">افزودن تصویر به اسلایدر</div>
                        <?php
                        if (isset($success)) {
                            echo "<div class='alert alert-success'>$success</div>";
                        }
                        ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" class="form-control" name="file">
                            </div>
                            <button type="submit" name="add-slide" class="btn btn-success btn-block mt-3"> افزودن</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
   