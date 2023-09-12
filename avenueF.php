<?php

// Server info
  $servername = "192.185.4.107";
  $username = "jth2698_NLNAdb";
  $password = "cEhz5HwM19w0";
  $dbname = "jth2698_aveF";

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
    $suggestion = addslashes(htmlspecialchars($_POST['suggestion']));

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($address) && !empty($suggestion)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$sql = "INSERT INTO `aveF` (`Name`, `Email`, `Address`, `Suggestion`) VALUES ('$name', '$email', '$address', '$suggestion')";
				if ($conn->query($sql) === TRUE) {
					// Database updated
					$msg = 'Thank you for your feedback!';
					$msgClass = 'alert-success';
          header("Refresh:3; url=https://northloopatx.org", true, 303);
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
  $pageTitle = 'AvenueF';
  require 'header.php';
?>

    <div>
      <br></br>
    </div>

    <div class="container mx-auto" style="width: 90%">

      <h3 class="text-center">AVENUE F SURVEY</h3>
      <hr width="50%"></hr>

      <p class="text-center">In April, 2020, Councilmember Greg Casar advised us that Council had earmarked <b>$168,000.00</b> to address the traffic and safety issues on Avenue F between North Loop (53rd) and Koenig. If you live on or use this stretch of Avenue F, we need your feedback on how you think these funds could best be used.</p>
      <p class="text-center">Please let us know your thoughts below!</p>

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
                <input type="text" name="address" class="form-control"><?php echo isset($_POST['address']) ? $address : ''; ?></input>
                <label for="address">Your address</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <textarea type="text" name="suggestion" class="form-control" rows="5"><?php echo isset($_POST['suggestion']) ? $suggestion : ''; ?></textarea>
                <label for="suggestion">Your suggestions for Avenue F</label>
              </div>
            </div>
          </div>
  	      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

<?php require 'footer.php'; ?>
