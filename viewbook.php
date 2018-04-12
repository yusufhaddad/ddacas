<?php
include_once'header.php';

?>
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<h2>VIEW BOOKING</h2
	<!-- form -->

  <form action="includes/viewbook.inc.php" method="POST">
  <!---->

  <?php

  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "CMS";

  //getting data from db
  //php fucntion conncetion
  $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

  		$sql = "SELECT * FROM booking WHERE userb_name = '{$_SESSION['user_name']}'";
  		$result = mysqli_query($conn, $sql);

  		echo"<table border='1'>";
  		echo "<tr><td><b>Container Type</td><td><b>Container From</td><td><b>Container To</td><td><b>Departure</td><td><b>Client</td></tr>";
  		while ($row = mysqli_fetch_assoc($result)) {
  		echo "<tr><td>{$row['conb_type']}</td><td>{$row['conb_from']}</td><td>{$row['conb_to']}</td><td>{$row['conb_dep']}</td><td>{$row['userb_name']}</td></tr>";
  		}
  		echo "</table>";

  ?>
        <br>
  <!---->

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
