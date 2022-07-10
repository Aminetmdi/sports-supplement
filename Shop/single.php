<?php  ob_start(); require_once 'head/header.php';
if (isset($_GET['product'])) {
   $query = "SELECT * FROM products WHERE id=?";
   $selectpro = $action->select($query, [$_GET['product']]);
 //  $query2 = "SELECT * FROM cat WHERE id=?";
 //  $selectcat = $action->select($query2, [$selectpro->catid]);
}
?>
<!---------------------------------->  
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="single-box">

            <div class="row">
               <div class="col-md-7">
                  <h6> <?php echo $selectpro->title ?> </h6>
                  <hr>
                  <div class="row">
                     <div class="col-md-7">
                        <div class="single-content-right">
                           <ul class="brand-ul">
                              <li>برند : <a href="#"><?php echo $selectpro->brand ?></a></li>
                              <li>دسته بندی : <a href="#"><?php echo $selectpro->tags ?></a></li>
                           </ul>
                           <br>
                           <span>مشخصات مختصر محصول :</span><br>
                           <ul class="product-ul">
                              <li></li>
                              <?php       
                                $ex = explode(',', $selectpro->product_info);
                                foreach ($ex as $item) {
                                echo "<li>$item</li>";
                                } 
                              ?>  
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-5">
                        <div class="single-content-left">
                           <ul>
                           <span>  وضعيت : <?php if($selectpro->status == 0){echo "نا موجود";}else{echo "موجود در انبار";} ?>  </span><br><br>
                              <br>
                              <li>
                                 طعم : 
                                 <ul> 
                                    <?php 
                                     $ex_color = explode(',', $selectpro->color);
                                     $ex_taste = explode(',', $selectpro->taste);
                                     if($ex_color[0]==null){
                                       echo $ex_taste[0];
                                     }
                                     else{
                                       for ($x = 0; $x < count($ex_color); $x++) { 
                                         echo "<li><i class='fa fa-square' style='color:#$ex_color[$x]'></i>$ex_taste[$x]</li>" ;
                                       }
                                    }
                                    ?> 
                                 </ul>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <hr>
                  
                  <h3><?php echo $selectpro->price; ?> تومان</h3>
                  <?php if(isset($_POST['add'])){
                    $q_basket="INSERT INTO basket SET userid=? ,product_id=?";
                    $action->inud($q_basket,[$_SESSION['user_id'],$_GET['product']]);
                    if($action == true){
                     header('Location:Basket/index.php?basket=ok');
                    }
                  } 
                  ?>
                  <form method="post" >
                     <?php 
                       if(isset($_SESSION['user_id'])){
                     ?>
                        <button lass="fa fa-cart-plus" name="add">خرید آنلاین</button>

                     <?php }else{?> 

                        <button lass="fa fa-cart-plus"><a href="Sign/Signin.php">خرید آنلاین</a></button>

                     <?php } ?>
                  </form>  
               </div>
               <div class="col-md-5">
                  <div class="single-img">
                     <figure>
                        <?php echo '<img src="data:image;base64,'.base64_encode($selectpro->image) .'" class="w-100 s-img">' ?> 
                     </figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!---------------------------------->  
<div class="container">
   <span class="releated-products">محصولات مرتبط</span>
   <hr>
   <div class="row">
      <div class="col-md-12">
         <div class="single-two-slider">
            <div class="owl-carousel owl-theme ov-single-two">
            <?php
               $query1 = "SELECT * FROM products WHERE brand=? LIMIT 0,6";
               $selectpro = $action->select($query1, [$selectpro->brand], "fetchAll");
               foreach ($selectpro as $value) {
                  if($value->id != $_GET['product']){
            ?>
               <div class="item">
                  <figure>
                     <a href="<?php echo "single.php?product=". $value->id ?>" ><?php echo '<img src="data:image;base64,'.base64_encode($value->image) .'" class="w-100">' ?></a>
                  </figure>
                  <h5> <?php echo $value->title ?></h5>
                  <span><?php echo $value->price ?> تومان</span>
               </div>
            <?php }} ?>
            </div>
         </div>
      </div>
   </div>
</div>

<!---------------------------------->  
<?php require_once 'head/footer.php' ?>
