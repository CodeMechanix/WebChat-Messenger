<?php
	include_once "classes/chatbox.php";
	$chtbox = new chatbox();
?>

<!DOCTYPE html>
<html>
	<head> 
			<title>Messenger</title>
			<link rel="stylesheet" href="style.css"/>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script>
				$(function(){

					//send messge method
					$("#msg_form").submit(function(event){

						send_message(event);

					});
					$(".click").click(function(event){


						alert("Sent Successfully.");

					});

					function send_message(){
						event.preventDefault();
						$.ajax({
							method: "POST",
							url: "some.php",
							data:{name:$("#name").val(), body:$("#body").val()}
						})
						.done(function( msg ) {
							$("#name").val("");
							$("#body").val("");
						})
					}
					//end send messge method

					function load_msg(){
						$.ajax({
							method: "GET",
							url: "some.php"
						})
						.done(function( msg ) {

							$("#chat").html(msg);
						})
					}

					setInterval(function(){ 
						load_msg() 
					}, 1000);

				});
			</script>
   </head>


	<body>
		<div class="wrapper clear">
			
			<header class="headsection clear">
				<h2>Online Chatbox</h2>
			</header>
			<section class="content clr">
				<div class="box">
					<ul id="chat">
					</ul>
				</div>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$chatboxdata = $chtbox->insertData($_POST);
	}
?>
				<div class="shoutform clr">
					<form action="" method="post" id="msg_form">
						<table>
							<tr>
								<td>Name</td>
								<td>:</td>
								<td><input type="text" name="name" required id="name"></td>
							</tr>
							<tr>
								<td>Message</td>
								<td>:</td>
								<td><input type="text" name="body" required id="body"></td>
							</tr>

							<tr>
								<td></td>
								<td></td>
								<td><input type="submit" value="Send" class="click"></td>
							</tr>
						</table>
					</form>
				</div>

			</section>

			<footer class="footsection clear">
				<h2>&copy; Develop By - Hasan Mahmud</h2>
			</footer>

		</div>
	</body>
</html>