<?php 

	if($_POST["submit"]) {

		if(!$_POST["name"]) {

			$error = "Please enter your name!";

		}

		if(!$_POST["email"]) {

			$error.= "<br />Please enter your email adress!";

		}

		if(!$_POST["message"]) {

			$error.= "<br />Please enter your message!";

		}

		if($_POST["email"]!="" AND !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

			$error.= "<br />Please enter a valid email adress!";

			/* If javascript(bootstrap validation) is disabled */

		}

		if($error) {

			$result = '<div class="alert alert-danger">'.$error.'</div>';

		} else {

			$emailTo = "enterYourEmailHere@.com";
			$subject =  "Form message from: ".$_POST["name"];
			$body = $_POST["message"];
			$headers = "From: ".$_POST["email"];

			if (mail($emailTo, $subject, $body, $headers)) {

				$result = "<div class='alert alert-success'>Thank you! I'll be in touch.</div>";

				$_POST["name"] = "";
				$_POST["email"] = "";
				$_POST["message"] = "";

			} else {

				$result = '<div class="alert alert-danger">Sorry, there was an error while sending your message.Please try again later.</div>';

			}

		}

	}

?>


<!doctype html>
<html>
<head>
    <title>My email form</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<link rel="stylesheet" href="style.css">

</head>

<body>

	<div class="container">

		<div class="row">

			<div class="col-md-6 col-md-offset-3" id="emailForm">

				<h1> My email form</h1>

				<?php echo $result; ?>

				<p class="lead">Please get in touch - I'll get back to you as soon as I can.</p>

				<form method="post">

					<div class="form-group">

						<label for="name">Your Name</label>
						<input name="name" type="text" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name']; ?>"/> <br /><br />
					
					</div>

					<div class="form-group">

						<label for="email">Your Email</label>
						<input name="email" type="email" class="form-control" placeholder="Your Email" value="<?php echo $_POST['email']; ?>" /> <br /><br />

					</div>

					<div class="form-group">

						<label for="message">Your Message</label>
						<textarea name="message" type="text" class="form-control"><?php echo $_POST["message"]; ?></textarea> <br /><br />

					</div>


					<input type="submit" name="submit" class="btn btn-default" value="Submit"/>

				</form>

			</div>

		</div>

	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>
