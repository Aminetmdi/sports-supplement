
<?php require_once '../connect/database.php'; require_once '../mail/send.php';?>
<?php 

if(isset($_POST["btn_register"]))
{
  $email=$_POST["email"];
  $password1=$_POST["password1"];
  $password2=$_POST["password2"];
  if(isset($email) && !empty($email) && isset($password1)  && !empty($password1) && isset($password2)  && !empty($password2))
  {
    if($password1==$password2)
    {
      $query="SELECT * FROM users WHERE email=? OR password=?";
      $selectUsers=$action->select($query,[$email,$password1]);
      if($selectUsers == true)
      {
        $mojod="با این ایمیل قبلا ثبت نام شده";
      }
      else
      {
        $query1="INSERT INTO users SET email=? , password=? ";
        $action->inud($query1,[$email ,md5(sha1($password1))]);
        if($action==true)
        {
          // $subject="موضوع";
          //  $body="ثبت نام شما با موفیقت انجام شد";
          //  sending($email,$subject,$body);    //برای ارسال ایمیل بعد از ثبت نام کاربر
          $success="ثبت نام شما با موفیقت انجام شد";
          $_SESSION['user_email']=$selectUsers->email;
          header("Location:../index.php");
        }
      }
    }else{
      $errorPass = "پسورد شما ناهماهنگ است";
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
    <title>ثبت نام</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="container">
          <div class="row justify-content-center">
           <div class="col-12 col-md-6 text-center">
             <form method="post" action="Signup.php" class="align-items-center form-sign">
                <h4 class="h4-sign mb-5">ایجاد حساب کاربری</h4>
                <input class="sign-input mt-2" type="email"    placeholder="ایمیل خود را وارد کنید" name="email">
                <input class="sign-input mt-4" type="password" placeholder="کلمه عبور خود را وارد کنید" name="password1">
                <input class="sign-input mt-4" type="password" placeholder="کلمه عبور خود را وارد کنید" name="password2">
                <br>
                <input type="submit" class="mt-4 sign-input" value="ثبت نام" name="btn_register">   
             </form>
             <a href="Signin.php" style="color: #FFFFFF;font-size: 20px;" > قبلا ثبت نام کردید؟</a>
           </div>
          </div>
        </div>
  
</body>
</html>