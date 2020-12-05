<?php 
    
	$title = 'Index';
	require_once 'includes/header.php';

?>

						<?php
						// define variables and set to empty values
						$nameErr = $emailErr = $genderErr = $websiteErr = "";
						$name = $email = $gender = $comment = $website = "";

						if ($_SERVER["REQUEST_METHOD"] == "POST") {
						if (empty($_POST["name"])) {
							$nameErr = "Name is required";
						} else {
							$name = test_input($_POST["name"]);
							// check if name only contains letters and whitespace
							if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
							$nameErr = "Only letters and white space allowed";
							}
						}
						
						if (empty($_POST["email"])) {
							$emailErr = "Email is required";
						} else {
							$email = test_input($_POST["email"]);
							// check if e-mail address is well-formed
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$emailErr = "Invalid email format";
							}
						}
							
						
						if (empty($_POST["comment"])) {
							$comment = "";
						} else {
							$comment = test_input($_POST["comment"]);
						}

						if (empty($_POST["gender"])) {
							$genderErr = "Gender is required";
						} else {
							$gender = test_input($_POST["gender"]);
						}
						}

						function test_input($data) {
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
						}
						?>


			<!-- Contact Section -->
			<section class="padding ptb-xs-40">
				<div class="container">

					<div class="row">

						<div class="col-lg-8">

							<div class="headeing pb-30">
								<h2>Let Us know what you thinking</h2>
								<span class="b-line l-left line-h"></span>
							</div>
							<!-- Contact FORM -->
							<!-- <p><span class="error">* required field</span></p>
							<form method="post" action="process.php"> -->
								<!-- IF MAIL IS NOT SENT SUCCESSFULLY -->
									<?php
									$Msg = '';
									if(isset($_GET['error']))
									{

										$Msg = "Please fill in the blank";
										echo'<div class ="alert alert-danger">'.$Msg.'</div>';
									}
									if(isset($_GET['success']))
									{

										$Msg = "Your message has been sent";
										echo'<div class ="alert alert-success">'.$Msg.'</div>';
									}
									
									
									
									?>
								<!-- END IF MAIL SENT SUCCESSFULLY -->
	<p><span class="error">* required field</span></p>

	<form method="post" action="/attendanceMerge/contactsuccess.php">  

			Name: <input type="text" name="UName" placehlder = "User Name" class="form-control mb-2">
			
			<br><br>
			E-mail: <input type="text" name="FromEmail" placehlder = "User Name" class="form-control mb-2">
			
			<br><br>
			Subject: <input type="text" name="Subject" placehlder = "User Name" class="form-control mb-2">
			
			<br><br>
			Comment: <textarea name="msg" rows="5" cols="40"  placehlder = "Write The Message"class="form-control"></textarea>
			<br><br>
			
			<br><br>
			<button class="btn btn-success" name=btn-send>Send </button>
</form>
							<!-- END Contact FORM -->
						</div>

						<div class="col-lg-4 contact mt-sm-30 mt-xs-30">
							<div class="headeing pb-20">
								<h2>Contact Info</h2>
								<span class="b-line l-left line-h"></span>
							</div>
							<div class="contact-info">

								<ul class="info">
									<li>
										<div class="icon ion-ios-location"></div>
										<div class="content">
											<p>
												
												7A Ardrenne Road
												
											</p>
											<p>
												Jamaica, Kingston 20
											</p>
										</div>
									</li>

									<li>
										<div class="icon ion-android-call"></div>
										<div class="content">
											<p>
												876 324 7412
											</p>
											<p>
												876 324 4578
											</p>
										</div>
									</li>
									<li>
										<div class="icon ion-ios-email"></div>
										<div class="content">
											<p>
											<span> <a href="mailto:jamaica.medicalctr@gmail.com.com">jamaica.medicalctr@gmail.com</a> </span>
											</p>
											
										</div>
									</li>
								</ul>
								<ul class="event-social">
								<li>
								<a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="https://www.linkedin.com/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="https://twitter.com/login"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="https://vimeo.com/join"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
							</li>
								</ul>
							</div>
						</div>

					</div>
				</div>
				<!-- Map Section -->

			</section>
			<!-- Map -->
			<section class="map-box">
				<div class="map">
					<div id="map"></div>
				</div>
			</section>
			<!-- Contact Section -->
			<!--End Contact-->
		 

			<?php require_once 'includes/footer.php'  ?>