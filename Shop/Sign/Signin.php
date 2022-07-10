<?php require_once '../connect/database.php';?>
<?php 

if(isset($_POST["btn_login"]))
{
  $email=$_POST["email"];
  $password=$_POST["password"];
  if(isset($email) && isset($password) && !empty($email) && !empty($password))
  {
    $query="SELECT * FROM users WHERE email=? OR password=?";
    $selectUsers=$action->select($query,[$email,$password]);
    if($selectUsers == true)
    {
      session_regenerate_id();
      $_SESSION['user_id']=$selectUsers->id;
      header("Location:../index.php");
    }
    else
    {
      $error="کاربری با این ایمیل و پسورد یافت نشد";
    }

  }else{
    $empty="لطفا مقادیر را با دقت وارد کنید";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-12 col-md-6 text-center">
            <form method="POST" class="align-items-center form-sign">
                <h4 class="h4-sign mb-5">ورود به حساب کاربری</h4>
                <input class="sign-input mt-2" type="email" placeholder="ایمیل خود را وارد کنید" name="email" >
                <input class="sign-input mt-4" type="password" placeholder="کلمه عبور خود را وارد کنید" name="password">
                <br>
                <input type="submit" class="mt-4 sign-input" value="ورود" name="btn_login">
            </form>
           </div>
          </div>
        </div>
  
</body>
</html>