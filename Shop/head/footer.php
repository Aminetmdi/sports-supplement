<?php
if(isset($_POST["btn_Newsletters"])){
   $email=$_POST["Newsletters"];
   if(isset($email) && !empty($email)){
      $query="SELECT * FROM newsletters WHERE email=?";
      $selectUsers=$action->select($query,[$email]);
      if($selectUsers == true)
      {
        $error="شما قبلا عضو خبرنامه شده اید";
      }
      else{
        $query1="INSERT INTO newsletters SET email=? ";
        $action->inud($query1,[$email]);
        if($action==true)
        {
          $success="شما با موفقیت عضو خبرنامه شدید ";
          //  $subject="موضوع";
          //  $body="شما با موفقیت عضو خبر نامه یوسف مکمل شدید ";
          //  sending($email,$subject,$body);  
        } 
      }
   }
}
?>



<div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="footer-description">
                     <ul>
                        <li>تضمین اصالت کالاهای فروخته شده</li>
                        <li>فروش برند های معتبر</li>
                        <li>پاسخگویی 24 ساعته</li>
                        <li>امکان پرداخت آنلاین با کارت بانکی و پرداخت در محل</li>
                        <li>امکان بازگشت تا یک هفته در صورت عدم رضایت مشتری</li>
                        <li>خرید آسان و مطمئن</li>
                        <li>قیمت های مناسب</li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="footer-description2">
                     <ul>
                        <li><i class="fa fa-truck"></i>تحویل پستی سریع</li>
                        <li><i class="fa fa-plane"></i>ارسال با پست پیشتاز و سفارشی</li>
                        <li><i class="fa fa-cart-arrow-down"></i>خرید آسان و راحت</li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="news-form">
                     <h5>در خبرنامه عضو شوید</h5>
                     <form method="POST" >
                        <input type="email" placeholder="ایمیل خود را وارد کنید" name="Newsletters" >
                        <button type="submit" name="btn_Newsletters"><i class="fa fa-envelope-o"></i></button>
                        <br>
                        <?php
                         if(isset($success)){
                           echo "<p class='msg' style='color:green;'> $success</p> ";
                         }
                         if(isset($error)){
                           echo "<p class='msg' style='color:red;'> $error</p> ";
                         }
                        
                        ?>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!----------------------------------> 
      <div class="copy-right">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  &copy;&nbsp;&nbsp;تمامی حقوق این سایت مطعلق به یوسوف مکمل میباشد !&nbsp;&nbsp;&nbsp;&nbsp;
                  <span>unity3duserserver@gmail.com</span>
               </div>
            </div>
         </div>
      </div>
      <!----------------------------------> 
      <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
      <script src="js/jquery.simple.timer.js" type="text/javascript"></script>
      <script src="js/bootstrap.js" type="text/javascript"></script>
      <script src="js/owl.carousel.min.js" type="text/javascript"></script>
      <script src="js/js.js" type="text/javascript"></script>