<?php
  $pageTitle = 'Payment';
  require 'header.php';
?>

    <div>
      <br></br>
    </div>

    <div class="container mx-auto" style="width: 90%">

      <h3 class="text-center">DUES</h3>
      <hr width="50%"></hr>
      <p class="text-center">Dues are only $5 per year per resident and $10 per year per non-resident property or business owner. Pay now or at our next <a href="https://northloopatx.org/meetings">meeting</a>.

      <br></br>

      <div class = row>

        <div class=col>
          <h5 class="p-3 mb-2 bg-secondary text-white text-center">Resident</h5>
          <div class="text-center">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="DGN3GCQ9LYG3J">
              <table>
              <select name="os0">
              	<option value="1 Member">1 Member $5.00 USD</option>
              	<option value="2 Members">2 Members $10.00 USD</option>
              </select>
              </table>
              <input type="hidden" name="currency_code" value="USD">
              <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>
        </div>

        <br></br>

        <div class = col>
          <h5 class="p-3 mb-2 bg-secondary text-white text-center">Non-Resident</h5>
          <div class="text-center">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="3XEY3REJGBB2E">
              <table>
              <select name="os0">
              	<option value="1 Member">1 Member $10.00 USD</option>
              	<option value="2 Members">2 Members $20.00 USD</option>
              </select>
              </table>
              <input type="hidden" name="currency_code" value="USD">
              <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>
        </div>

        <br></br>

        <div class = col>
          <h5 class="p-3 mb-2 bg-secondary text-white text-center">Business</h5>
          <div class="text-center">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="NA45SZU7K53VL">
              <table>
              <select name="os0">
              	<option value="1 Member">1 Member $10.00 USD</option>
              </select>
              </table>
              <input type="hidden" name="currency_code" value="USD">
              <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          </div>
        </div>

      </div>

      <br></br>

      <div>
        <h5 class="p-3 mb-2 bg-secondary text-white text-center">Pay Later</h5>
        <div class="text-center">
        <a href="https://northloopatx.org" button type="button" class="btn btn-primary btn-lg">Finish and Return Home</a>
        </div>
      </div>

    </div>

<?php require 'footer.php'; ?>
