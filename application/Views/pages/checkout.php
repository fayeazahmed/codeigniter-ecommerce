<?php
	if(isset($_SESSION['customer'])) {
		$customer = $_SESSION['customer'];
		?>
			<div class="container">
				<p class="checkout-message">Hello <?= $customer['name'] ?>, hopefully your order will be at <?= $customer['address']?> soon.</p>
			</div>
		<?php
	} else {
		$total = 0;
		foreach ($cart as $cartItem) {
			$total += $cartItem['price'];
		}
		?>
			<form class="container w-25 m-auto text-left" action="/cart/checkout" method="post">
				<input placeholder="Name" class="form-control mt-3 text-left" type="text" name="customername" required>
				<input placeholder="Phone no" class="form-control mt-3 text-left" type="text" name="customercontact" required>
				<input placeholder="Address" class="form-control mt-3 text-left" type="text" name="customeraddress" required>
				<h4 class="mt-2">Total: <?= $total ?></h4>
				<input class="btn btn-block btn-success mt-2" type="submit" value="Place order">
			</form>
		<?php
	}
?>
