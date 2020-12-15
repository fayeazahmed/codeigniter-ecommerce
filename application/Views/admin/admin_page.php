<a class="btn btn-warning float-right" href="/admin/logout">
	<i class="fa fa-sign-out" aria-hidden="true"></i>
</a>
<form class="container w-25 m-auto text-left" action="/admin/adminpage" method="post" enctype='multipart/form-data'>
	<?php
		if(isset($_SESSION['added'])) echo "<h5 class='alert alert-success'>".$_SESSION['added']."</h5>";
	?>
	<input class="form-control mt-3 text-left" type="text" name="productname" placeholder="Name" required>
	<input class="form-control mt-3 text-left" type="text" name="productdescription" placeholder="Description" required>
	<select class="form-control mt-3 text-left" name="productcategory" required>
		<option value="Category" disabled selected>Category</option>
		<option value="Phone">Phone</option>
		<option value="Computer">Computer</option>
		<option value="Laptop">Laptop</option>
		<option value="TV">TV</option>
	</select>
	<input class="form-control mt-3 text-left" type="number" name="productprice" placeholder="Price" required>
	<input class="form-control mt-2" type="file" name="productimage" required>
	<input class="btn btn-primary mt-2" type="submit" value="Add product"/>
</form>
