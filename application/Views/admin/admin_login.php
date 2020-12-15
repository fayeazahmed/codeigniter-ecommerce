<form class="container w-50 m-auto text-left" action="/admin" method="post">
	<?php if(isset($auth)) echo "<h5 class='alert alert-danger w-50 m-auto'>Unauthorized!</h5>" ?>
	<input class="form-control mt-3 text-left w-50 mx-auto" type="text" name="adminname" placeholder="Name..." required>
	<input class="form-control mt-3 text-left w-50 mx-auto" type="password" name="password" placeholder="Password..." required>
	<input class="d-none" type="submit">
</form>