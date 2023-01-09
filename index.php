<?php //error_reporting(0); ?>

<!DOCTYPE html>
<html>
<head>

	<title>Chatbox</title>

	<?php include("configurations/css.php"); ?>
	
	<?php include("configurations/js.php"); ?>

</head>
<body>
	<div class="container">
		<h1 style="color: #ffffff; text-align: center; text-shadow: 1px 1px 3px black;">Chatbox</h1>

	    <div id="display">

	    	<!-- for chatlog -->
	    
	    </div>

		<input type="text" name="name" id="name" value="<?php echo $_GET['name']; ?>" hidden></input>
		<div style="padding: 5px;">
			<textarea style="width: 100%;" id="message" name="message" placeholder="Enter your message"></textarea>
	    	<input id="sendMessageBtn" name="send" type="button" value="Send">
    	</div>
	</div>

</body>
</html>