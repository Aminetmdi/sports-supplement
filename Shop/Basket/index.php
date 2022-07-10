<?php require_once '../connect/database.php'  ?>
<
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>سبد خرید</title>
	<link type="text/css" href="css/style.css" rel="stylesheet" />
</head>
<body>
<button onclick="window.history.back();" style="cursor: pointer;;margin-bottom: 20px;background: none;border-radius: 8px; color: orange; padding: 6px; border: 2px solid orange;" >بازگشت</button>
	<div class="content">
		<?php if(isset($_GET['basket'])){
        ?>
			<p class="msg" style="color:green;"> محصول شما با موفقیت به سبد اضافه شد</p>
		<?php } ?>

		<?php 
			if(isset($_GET['delete'])){
				$q_delete="DELETE FROM basket WHERE id=?";
				$action->inud($q_delete,[$_GET['delete']]);
			}
		?>
	
	
		
		<h1>سبد خرید</h1>
		<p>تعداد محصولات را اضافه و کم کنید و سبد خود را آپدیت کنید.</p>
		<!-- start undo button -->
		<!-- end undo button -->


		<table class="items">
			<thead>
			<!-- start table head -->
			<tr>
				<th>نام محصول</th>
				<th>قیمت</th>
				<th>تعداد</th>
				<th>مجموع</th>
			</tr>
			<!-- end table head -->
			</thead>
			<tbody>
			<!-- start table body -->
			<?php 
			$query="SELECT * FROM basket WHERE userid=? AND status=?";
			$selectpro=$action->select($query,[$_SESSION['user_id'],0],"fetchall");
			foreach($selectpro as $value){
				$query1="SELECT * FROM products WHERE id=?";
				$select=$action->select($query1,[$value->product_id]);
			?>
			<tr>
				<!-- start item one -->
				<td>
					<div class="item">
						<div class="item-front">
							< <?php echo '<img src="data:image;base64,'.base64_encode($select-> image) .'" >' ?>
						</div>
						<div class="item-back">
					     	< <?php echo '<img src="data:image;base64,'.base64_encode($select-> image) .'" >' ?>
						</div>
					</div>
					<p><span class="itemNum"><?php echo $select->title ?></span></p>
				</td>
				<td><?php echo $select->price  ?> تومان</td>
				<td>
					<input type="number" class="quantity" value="1" min="1" />
					<a href="<?php echo"index.php?delete=".$value->id;?>" class="remove">حذف</a>
				</td>
				<td class="itemTotal"><?php echo $select->price ?>تومان</td>
				<!-- end item one -->
			</tr>
        <?php } ?>
		</table>

		<!-- start checkout list -->
		<div class="cost">
			<h2>پیش فاکتور</h2>

			<table class="pricing">
				<tbody>
				<tr>
					<td>قیمت کل</td>
					<td class="subtotal"></td>
				</tr>
				<tr>
					<td>مالیات</td>
					<td class="tax"></td>
				</tr>
				<tr>
					<td>هزینه ارسال</td>
					<td class="shipping">15,000 تومان</td>
				</tr>
				<tr>
					<td><strong>مجموع:</strong></td>
					<td class="orderTotal"></td>
				</tr>
				</tbody>
			</table>
			<a class="cta" href="../address.php">خرید</a>
		</div><!-- end checkout list -->
	</div> <!-- End Content -->


	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script  src="js/scripts.js"></script>
</body><!-- This template has been downloaded from Webrubik.com -->
</html>
