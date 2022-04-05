<?php

	if($_POST){

		$error ="";
		$successMsg ="";
		
		if(!$_POST["email"]){
			$error .= "An eMail is required. </br>";
		}
		if(!$_POST["subject"]){
			$error .= "An subject is required. </br>";
		}
		if(!$_POST["content"]){
			$error .= "An comment is required. </br>";
		}

			
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  			$error .= "Invalid email format </br>";
		}

		if($error!=""){
			$error = '<div class="alert-danger" role alert><strong> SERVER ALERT:</br>'.$error .'</strong></div>';
		}else{
			$emailTo = "info@victortesthostpackage.com";
			$subject = $_POST['subject'];
			$content = $_POST['content'];
			$headers = "From: ".$_POST['email'];

			if(mail($emailTo, $emailTo, $content, $headers)){
				$successMsg = '<div class="alert-success" role alert><strong> Formulario enviado correctamente </strong></div>';
			} else {
				$error = '<div class="alert-danger" role="alert"><strong> FALLO DURANTE EL ENVIO DEL FORMULARIO</strong></div>';
			}

		}

	}

?>




<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Hello, world!</title>
</head>


<body style="max-width: 500px;">


	<form method="POST">
		<div class="mb-3">
			<label for="Email" class="form-label">Email address</label>
			<input  type="email" class="form-control" id="mail" name="email" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/</div>
		</div>

		<div class="mb-3">
			<label for="Subject" class="form-label">Subject</label>
			<input type="Subject" class="form-control" name="subject" id="Subject">
		</div>

		<div class="mb-3">
			<textarea  class="form-control " placeholder="Leave a comment here" id="Comments" name="content" style="height: 100px"></textarea>
			<label for="floatingTextarea2" class="form-label">Comments</label>
		</div>

		<div class="mb-3">
			<button type="submit" id="submit" class="btn btn-primary">Submit</button>
		</div>

		<div class="mb-3">
			<div style = "display: none" id="error"  class="alert" role="alert" ><? echo $error .$successMsg ; ?></div>
		</div>

	</form>


	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
	<script type="text/javascript">

		$("form").submit(function(e) {
			
			var error = "";
			var EmailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;;
			if($("#mail").val() == "") {
            	error += "Please enter your email address.</br>";

			}else if(!EmailRegex.test($("#mail").val())) {
				error += "Enter a valid email address.</br>";
			}

			if ($("#Subject").val() == "") {
				error += "Subject field required.</br>";
			}

			if ($("#Comments").val() == "") {
				error += "Comments field required.</br>";
			}

			if(error!=""){
				e.preventDefault();
				$("#error").fadeIn();
				$("#error").attr("class","alert alert-danger");
				$("#error").html(
					"<strong>There is some errors:</strong></br>"+ error);

			}else{
				$("#error").fadeIn()
				$("#error").html("All rigth");
				$("#error").attr("class","alert alert-success");
				$("form").off("submit").submit();		
				return;	
			}		

		});

	</script>


</body>

</html>