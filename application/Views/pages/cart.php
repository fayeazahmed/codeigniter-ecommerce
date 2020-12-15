<?php
	if($cart && count($cart) > 0) {
		$total = 0;
		?>
		<div class="container w-50 m-auto text-right">
			<div class="d-flex flex-column">
				<div class="d-flex row bg-">
					<p class="col-3">IMAGE</p>
					<p class="col-6">NAME</p>
					<p class="col-3">PRICE</p>
				</div>
		<?php
		foreach ($cart as $cartItem) {
			$total += $cartItem['price'];
			?>
				<div class="cart-item d-flex row mt-3">
					<div class="col-3">
						<img height=60 src="/uploads/<?= $cartItem['image'] ?>" alt=<?= $cartItem['name']?>>
					</div>
					<h4 class="text-left col-6"><?= $cartItem['name'] ?></h4>
					<h5 class="col-3"><?= $cartItem['price'] ?></h5>
				</div>
			<?php
		}
		?>
			<p class="cart-total">Total: <?= $total ?></p>
			</div>
			<a class="btn btn-success mr-4" href="/cart/checkout">Check out<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
		</div>
		<?php
	} else {
		?>
		<h2 class="cart-no-item">No items</h2>
		<?php
	}
?>