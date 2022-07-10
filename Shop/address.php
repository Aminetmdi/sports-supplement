<?php require_once "connect/database.php" ?>
<?php 
if(isset($_POST['send'])){
    if(!empty($_POST['address'])){
        $query = "UPDATE basket SET address=? WHERE userid=? AND status=?";
        $action->inud($query,[$_POST['address'],$_SESSION['user_id'],0]);
        header('Location:pay/Pardakht.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap.css">
    <title>Document</title>
    <style>
        .p-title{
            color: black;
            font-family: shabnam;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form method="post">   
        <div class="container">
          <div class="row mt-4 ">
            <div class="col-6 col-md-4 order-last text-right">
               <p class="p-title">لطفا آدرس خود را وارد کنید </p>
            </div>
            <div class="col-6 col-md-8 text-center">
               <input class="typi text-right" name="address" style="width: 100%; border-radius: 10px ;padding: 5px ; border: 2px solid orange;" type="text" name="address" id="">
            </div>
            <br>     
          </div>  
          <div class="col-5 justify-content-center">
            <input class="btn btn-warning" type="submit"  name="send" value="جهت پرداخت سفارش کلیک کنید">
          </div>
        </div>
    </form>
</body>
</html>
