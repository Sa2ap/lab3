<?php 
	include("configurations/connection.php");

		if(isset($_POST['send'])==1){
			
			$name = $_POST['name'];
			$message = mysqli_real_escape_string($dbc, $_POST['message']);

			$q = "INSERT INTO chatroom (name, message) VALUES ('$name', '$message')";
			$r = mysqli_query($dbc,$q);

			$q = "SELECT COUNT(id) AS num FROM chatroom ORDER BY id ASC";
			$r = mysqli_fetch_assoc(mysqli_query($dbc,$q));

			if($r['num']>6){
				$q = "DELETE FROM chatroom LIMIT 1;";
				mysqli_query($dbc,$q);
			}					
			
			header("Location: index.php?name=".$name);

		}

	$q="SELECT * FROM chatroom";
	$r=mysqli_query($dbc,$q);

	while($row=mysqli_fetch_assoc($r)){
		if($row['name']==$_GET['name']){
 ?>

<p><b><u style="color: blue;">You</u> : </b><?php echo $row['message']; ?></p>

<?php }else{ ?>

<p><b><u><?php echo $row['name']; ?></u> : </b><?php echo $row['message']; ?></p>

<?php }} ?>