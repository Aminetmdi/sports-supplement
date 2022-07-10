<?php require_once 'head/header.php' ;?>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="slider-box">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                     </ol>

                     <div class="carousel-inner">
                        <?php
                           $query="SELECT * FROM slider WHERE child=?";                        
                           $select=$action->select($query,[0],"fetchall");
                           foreach($select as $number => $value){
                              if($number==0){
                        ?>
                        <div class="carousel-item active">
                           <div class="col-12">
                              <?php echo '<img src="data:image;base64,'.base64_encode($value->picture) .'" class="w-100">' ?>                             
                           </div>
                        </div>
                        <?php }else{ ?>
                        <div class="carousel-item ">
                           <div class="col-12">
                           <?php echo '<img src="data:image;base64,'.base64_encode($value->picture) .'" class="w-100">' ?>
                           </div>
                        </div>
                        <?php }} ?>
                     </div>
                  </div>
               </div>
               <!--slider-box-->
            </div>
         </div>
      </div>
      <!----------------------------------> 
      <div class="container">
         <div class="row">
            <?php 
            $q_offer = "SELECT * FROM offer";
            $select_offer = $action->select($q_offer, []);
            ?>
            <div class="col-md-3">
               <div class="coopen">
                  <?php echo '<img src="data:image;base64,'.base64_encode($select_offer->ads_image) .'" class="w-100">' ?>
               </div>
            </div>
            <div class="col-md-9">
               <div class="vizheh">
                  <div class="col-md-6">
                     <div class="vizheh-img">
                        <?php echo '<img src="data:image;base64,'.base64_encode($select_offer->p_image) .'" class="w-100">' ?>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="vizheh-content">
                        <div><del><?php echo $select_offer->fake_price; ?> تومان</del></div>
                        <h4><?php echo $select_offer->price; ?></h4>
                        <h3><?php echo $select_offer->title; ?></h3>
                        <ul>
                           <?php       
                                $ex = explode(',', $select_offer->tag);
                                foreach ($ex as $item) {
                                echo "<li>$item</li>";
                                } 
                           ?>  
                        </ul>
                        <hr>
                        <span>زمان باقیمانده تا پایان سفارش</span> 
                        <div class="counter" data-minutes-left="1000"></div>
                     </div>
                  </div>
                  <div class="vizheh-tag">
                     <span>فرصت ویژه</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!---------------------------------->   
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="two-slider">
                  <div class="owl-carousel owl-theme ov2">
                  <?php
                     global $search; 
                     $selectpro=$search;
                     if(isset($_GET['category'])){
                        $query1 = "SELECT * FROM products WHERE category_id=?";
                        $selectpro = $action->select($query1,[$_GET['category']],"fetchAll");
                     }elseif($search==null){
                        $query1 = "SELECT * FROM products ORDER BY RAND() LIMIT 6";
                        $selectpro = $action->select($query1,[],"fetchAll");
                     }
                      foreach ($selectpro as $value){
                  ?>
                     <div class="item">
                        <figure>
                        <a href="<?php echo "single.php?product=". $value->id ?>" ><?php echo '<img src="data:image;base64,'.base64_encode($value->image) .'" class="w-100">' ?></a>
                        </figure>
                        <h5><?php echo $value->title ?></h5>
                        <span><?php echo  $value->price ?> تومان</span>
                     </div>  
                  <?php }?>   
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!----------------------------------> 
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="bodybulding-baner">
               <?php
                  $query="SELECT * FROM slider WHERE child=?";                        
                  $select=$action->select($query,[2]);
               ?>
                  <a href="#"><?php echo '<img src="data:image;base64,'.base64_encode($select->picture) .'" class="w-100">' ?></a>
                  <h4>مکمل های ورزشی</h4>
               </div>
            </div>
         </div>
      </div>
      <!----------------------------------> 
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="one-slider">
                  <h4>جدیدترین محصولات</h4>
                  <div class="owl-carousel owl-theme ov1">
                     <?php
                        $q_newProduct = "SELECT * FROM `products` ORDER BY `products`.`id` DESC LIMIT 7";
                        $select = $action->select($q_newProduct, [], "fetchAll");
                        foreach($select as $value){
                     ?>
                     <div class="item">
                        <figure>
                        <a href="<?php echo "single.php?product=". $value->id ?>" ><?php echo '<img src="data:image;base64,'.base64_encode($value->image) .'" class="w-100">' ?></a>
                        </figure>
                        <h5><?php echo $value->title ?></h5>
                        <span><?php echo $value->price ?> تومان</span>
                     </div>  
                     <?php }?>   
               </div>
            </div>
            </div>
         </div>
      </div>

      <!----------------------------------> 

      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="book-baner">
               <?php
                  $query="SELECT * FROM slider WHERE child=?";                        
                  $select=$action->select($query,[1]);
               ?>
                  <a href="#"><?php echo '<img src="data:image;base64,'.base64_encode($select->picture) .'" class="w-100">' ?></a>
                  <h4>مکمل</h4>
               </div>
            </div>
         </div>
      </div>
      <!---------------------------------->  
      <div class="container">
         <div class="row">
            <?php 
               $query="SELECT * FROM article";
               $selectproduct = $action->select($query, [], "fetchAll");
               $tedad = count($selectproduct);
               $count = ceil($tedad / 3);
               if (!isset($_GET['page'])) {
                  $cn = 0;
               } else {
                  $cn = ($_GET['page'] - 1) * 3;
               }
               $query1 = "SELECT * FROM `article` ORDER BY `article`.`id` DESC LIMIT {$cn},3";
               $select = $action->select($query1, [], "fetchAll");
               foreach($select as $value){
            ?>
            <div class="col-md-4">
               <div class="blog-content">
                  <figure>
                     <?php echo '<img src="data:image;base64,'.base64_encode($value->image) .'" class="w-100">' ?>
                  </figure>
                  <h5><i class="fa fa-title"></i><?php $value->title ?></h5>
                  <p><?php echo $value->text ?> </p>
                     <li><i class="fa fa-bars"></i>   دسته بندی :<?php echo $value->category ?></li>
                     <li><i class="fa fa-calendar-o"></i> نوشته شده در :<?php echo $value->date ?> </li>
                     <li><i class="fa fa-user-o"></i>  نویسند :<?php echo $value->author ?></li>
                  </ul>
                  <a href="#" class="mybtn"><i class="fa fa-continuous"></i>ادامه مطلب&raquo;</a>
               </div>
            </div>
            <?php } ?>
         </div>
         <div style="margin: 0 auto;height: 50px;text-align: center;">
         <?php
         for ($z = 1; $z <= $count; $z++) {
            ?>
            <a href="<?php echo "index.php?page=".$z?>" style="line-height: 50px;background-color: #FC9294;width: 50px;padding: 2px 18px;text-decoration: none;color: #ffffff;font-size: 12px"><?php echo $z?></a>
         <?php } ?>
            </div>
      </div>
      <!---------------------------------->  
<?php require_once 'head/footer.php' ?>








