<div class="hero-div">
	<div class="product-categories">
		<a class="card" href="/category/Phone">
			<h3>Phone</h3>
		</a>
		<a class="card" href="/category/laptop">
			<h3>Laptop</h3>
		</a>
		<a class="card" href="/category/computer">
			<h3>Computer</h3>
		</a>
		<a class="card" href="/category/tv">
			<h3>TV</h3>
		</a>
	</div>
	<div class="products-div d-flex justify-content-around flex-wrap">
		<?php
			if($products) {
				foreach ($products as $product) {
					?> 	<div class="product-container mt-2">
							<h4 class="card-title text-left"><?= $product['name'] ?></h4>
							<h5 class="text-left">$<?= $product['price'] ?></h5>
							<h5 class="card-title text-left"><?= $product['description'] ?></h5>
							<img height=140 src="/uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
							<?php
								if(array_search($product['id'], $cartItemsId)) {
									?> <button disabled class="btn btn-block btn-primary mt-2">
										Already in cart
									</button> 
									<?php
								} else {
									?>
										<a href="/cart/addproduct/<?= $product['id'] ?>" class="btn btn-block btn-primary mt-2">
										Add to cart
										</a>
									<?php
								}
							?>
									
						</div> 
					<?php
				}
			}
		?>
	</div>
</div>