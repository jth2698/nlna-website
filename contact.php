<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = addslashes(htmlspecialchars($_POST['name']));
		$email = addslashes(htmlspecialchars($_POST['email']));
		$message = addslashes(htmlspecialchars($_POST['message']));

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'webmaster@northloopatx.org';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: northloopatx.org <noreply@northloopatx.org>". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your message has been sent';
					$msgClass = 'alert-success';
          header("Refresh:3; url=https://northloopatx.org", true, 303);
				} else {
					// Failed
					$msg = 'Your message was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>

<?php
  $pageTitle = 'Contact';
  require 'header.php';
?>

    <div>
      <br></br>
    </div>

    <div class="container mx-auto" style="width: 90%">

      <h3 class="text-center">CONTACT</h3>
      <hr width="50%"></hr>
      <p class="text-center">Please let us know if you have any questions about the NLNA or if just want to get in touch. We look forward to hearing from you!</p>

			<br></br>

			<div class="container">
    	<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>"></input>
                <label for="name" class="">Your name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>"></input>
                <label for="email" class="">Your email</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                <label for="message">Your message</label>
              </div>
            </div>
          </div>
  	      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

<?php require 'footer.php'; ?>
