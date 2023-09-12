<?php
  $pageTitle = 'Donate';
  require 'header.php';
?>

    <div>
      <br></br>
    </div>

    <div class="container mx-auto" style="width: 90%">

      <h3 class="text-center">DONATE</h3>
      <hr width="50%"></hr>

      <p class="text-center">Your donations are always welcome. Donations are used for things like neighborhood beautification projects and other efforts to make North Loop a better place to live. Every dollar counts!

      <div class="row">

        <div class="col"></div>

        <div class="col">
          <div class="text-center">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick" />
              <input type="hidden" name="hosted_button_id" value="CGPPW5BL3QHG2" />
              <br></br>
              <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
              <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
            </form>
          </div>
        </div>

        <div class="col"></div>

      </div>

    </div>

<?php require 'footer.php'; ?>
