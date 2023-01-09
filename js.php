<script src="configurations/jquery-3.2.1.min.js"></script>

<script>

	$(document).ready(function(){
 		
        var exists = document.location.href.indexOf('?name=');
        var x="";
        var url="";
        
        if(exists < 0){
	 		x = prompt('Please enter your name to continue: ');
			url = document.location.href + '?name=' + x;
            window.location = url;
        }

        var url_string = window.location.href;
        url = new URL(url_string);
		x = url.searchParams.get("name");

		$(function() {
		    $("#message").keypress(function (e) {
		        if(e.which == 13 && !e.shiftKey && $("#message").val()!="") {
					$.ajax({
					     url: 'chatlog.php',
					     type: 'POST',
					     data: {
					     	send: $("#sendMessageBtn").val(),
					     	name: $("#name").val(),
					     	message: $("#message").val()
					     },
					     success: function(data){
					     	$("#message").val("");
					     },
				    });
		            e.preventDefault();
		        }
		    });
		});

		$("#sendMessageBtn").on("click",function(){
			if($("#message").val()!=""){
				$.ajax({
				     url: 'chatlog.php',
				     type: 'POST',
				     data: {
				     	send: $("#sendMessageBtn").val(),
				     	name: $("#name").val(),
				     	message: $("#message").val()
				     },
				     success: function(data){
				     	$("#message").val("");
				     },
			    });
			}
		});

		setInterval(function(){
			$.ajax({
			     url: 'chatlog.php',
			     type: 'GET',
			     data: {
			     	name: $("#name").val(),
			     },
			     success: function(data){
			     	$('#display').html("<span style='font-weight: bold;'>.&emsp;.&emsp;.&emsp;.&emsp;.&emsp;.&emsp;.&emsp;.&emsp;.&emsp;.</span><br>"+data);
			     },
		    });
		}, 500);
	});

</script>