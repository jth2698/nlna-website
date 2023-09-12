<?php

// Server info
  $servername = "192.185.4.107";
  $username = "jth2698_NLNAdb";
  $password = "cEhz5HwM19w0";
  $dbname = "jth2698_NLNAmembers";

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = addslashes(htmlspecialchars($_POST['name']));
		$email = addslashes(htmlspecialchars($_POST['email']));
		$address = addslashes(htmlspecialchars($_POST['address']));

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($address)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$sql = "INSERT INTO `NLNAmembers` (`Name`, `Email`, `Address`, `Join Date`) VALUES ('$name', '$email', '$address', CURRENT_DATE())";
				if ($conn->query($sql) === TRUE) {
					// Database updated
					$msg = 'Thank you for joining!';
					$msgClass = 'alert-success';
          header("Refresh:3; url=https://northloopatx.org/payment", true, 303);
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
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
  $pageTitle = 'Join';
  require 'header.php';
?>

    <div>
      <br></br>
    </div>

    <div class="container mx-auto" style="width: 90%">

      <h3 class="text-center">JOIN!</h3>
      <hr width="50%"></hr>

      <p class="text-center">Please join us! Membership is open to all residents, non-resident property owners and business owners within the boundaries of the neighborhood. Dues are only $5 per year per resident and $10 per year per non-resident property or business owner.</p>

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
                <input name="address" class="form-control"><?php echo isset($_POST['address']) ? $message : ''; ?></input>
                <label for="message">Your address</label>
              </div>
            </div>
          </div>
  	      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

<?php require 'footer.php'; ?>
