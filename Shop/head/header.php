<?php require_once 'connect/database.php'  ?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Yosef mokamel</title>
      <link href="style/font-awesome.css" rel="stylesheet" type="text/css">
      <link href="style/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="style/owl.carousel.css" rel="stylesheet" type="text/css">
      <link href="style/owl.theme.default.css" rel="stylesheet" type="text/css">
      <link href="style/style.css" rel="stylesheet" type="text/css">
      <link href='http://www.fontonline.ir/css/BYekan.css' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
      <link href="style/style.css" rel="stylesheet" type="text/css">

   </head>
   <body>
   <div class="top2">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="login">
                     <?php 
                     if(isset($_SESSION['user_id'])){
                     ?>
                        <a href="Sign/exit.php" class="mybtn"><i class="fa fa-user-plus"></i>  خروج از سایت</a>       
                     <?php }else{ ?>
                        <a href="Sign/Signup.php" class="mybtn"><i class="fa fa-user-plus"></i>ثبت نام</a>
                        <a href="Sign/Signin.php" class="mybtn"><i class="fa fa-user-o"></i>ورود</a>
                     <?php } ?>
                     <a href="Basket/index.php" class="mybtn"><i class="fa fa-cart-arrow-down"></i>سبد</a>  				
                  </div>
               </div>
               <div class="col-md-6">
                  <?php 
                     
                     if (isset($_POST['search_Btn'])){
                        $searchInput = $_POST['search_Input'];
                        $query1 = "SELECT * FROM products WHERE tags LIKE ?";
                        $search =null;
                        $search = $action->select($query1,["%$searchInput%"],"fetchall");
                     }
                  ?>
                  <form action="index.php" method="post" >
                     <input type="text" name="search_Input" placeholder="کالای مورد نظر را جستجو کنید">
                     <button type="submit" name="search_Btn" ><i class="fa fa-search"></i></button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      </div><!--top2-->      
      <!---------------------------------->        
      <div class="main-menu">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <ul>
                     <?php 
                        $query="SELECT * FROM category WHERE child=?";                        
                        $select=$action->select($query,[0],"fetchall");
                        foreach($select as $value){
                     ?>    
                        <li>
                           <a href="<?php echo "index.php?category=".$value->id;?>"><?php echo $value->catname; ?></a>
                           <ul>
                              <?php 
                                 $query1="SELECT * FROM category WHERE child=?";                        
                                 $selectCat=$action->select($query,[$value->id],"fetchall");
                                 foreach($selectCat as $item){
                              ?>
                              <li><a href="<?php echo "index.php?category=".$item->id ?>"> <?php echo $item->catname ?></a></li>
                              <?php }?>
                           </ul>
                        </li>
                     <?php }?>
                  </ul> 
               </div>
            </div>
         </div>
      </div>
      <br>
