<?php
include_once'header.php';
?>
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<h2>Log In</h2
	<!-- form ---------------------->

					  <form action="includes/login.inc.php" method="post">

						<div class="field half first">
							<label for="email">Email</label>
							<input name="uemail" type="text" placeholder="Email">
						</div>
						<div class="field half">
							<label for="password">Password</label>
							<input name="pwd" type="password" placeholder="Password">
						</div>
						<ul class="actions">
							<li><input value="submit" name="submit" class="button alt" type="submit"></li>
						</ul>
					</form>



			<?php
			include_once'Footer.php';
			?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>



	</body>
</html>
