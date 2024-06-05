<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 hblack" id="exampleModalToggleLabel2">Check Out</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
            include "doodles-db.php";
            $id = $_SESSION['id'];
            $total = 0;
            $orderQuery = "SELECT * FROM user_tbl INNER JOIN order_tbl ON user_tbl.User_ID = order_tbl.Order_User_ID WHERE order_tbl.Order_User_ID = $id";
            $orderResult = $conn->query($orderQuery);
            $orderRow = $orderResult->num_rows;
            while ($orderTotal = $orderResult->fetch_assoc()) {
                $total += $orderTotal['Order_Price'];
            }
            if ($orderRow) {
                echo "
                <div class='row'>
                    <h2 class='hpurple'>Your Cart</h2>
                    <div class='col-6'>
                        <p>You are buying $orderRow item/s</p>
                    </div>
                    <div class='col-6'>
                        <p>Total Amount: &#8369;$total</p>
                    </div>
                </div>
                ";
                $orderQuery1 = "SELECT * FROM user_tbl INNER JOIN order_tbl ON user_tbl.User_ID = order_tbl.Order_User_ID WHERE order_tbl.Order_User_ID = $id";
                $orderResult1 = $conn->query($orderQuery);
                while ($orderShow = $orderResult1->fetch_assoc()) {
                echo "
                    <div class='row byellow text-center'>
                        <input type='hidden' name='id' value='$orderShow[Order_ID]'>
                        <div class='col-4'><h4 class='hpink'>$orderShow[Order_Name]</h4></div>
                        <div class='col-4'><h6 class='hpurple pt-2'><span>Quantity:</span> $orderShow[Order_Qty]</h6>
                        <h6 class='hpurple pt-2'><span>Size:</span> $orderShow[Order_Size]</h6>
                        <h6 class='hpurple pt-2'><span>Price:</span> $orderShow[Order_Price]</h6>
                        </div>
                        <div class='col-4 p-0'><img src='img/$orderShow[Order_Image]' alt='' class='w-100 bcyan'/></div>
                    </div>
            ";
            }
            echo "
            <form action='' class='row d-flex form-col1 g-3 justify-content-center bgreen mt-2'>
                    <h2 class='hcyan'>Shipping Address</h2>
                     <div class='col-md-5'>
                         <label for='first-name'>Name</label>
                         <input type='text' class='form-control' required>
                     </div>
                     <div class='col-md-5'>
                         <label for='last-name'>Last Name</label>
                         <input type='text' class='form-control' required>
                     </div>
                     <div class='col-md-5'>
                         <label for='address1'>Address 1</label>
                         <input type='text' class='form-control' required>
                     </div>
                     <div class='col-md-5'>
                         <label for='address2'>Address 2 (optional)</label>
                         <input type='text' class='form-control'>
                     </div>
                     <div class='col-md-5'>
                         <label for='city'>City</label>
                         <input type='text' class='form-control' id='city' required>
                         <div class='invalid-feedback'>
                             Please provide a valid city.
                         </div>
                     </div>
                     <div class='col-md-3'>
                         <label for='state'>State</label>
                         <input type='text' class='form-control' id='state' required>
                         <div class='invalid-feedback'>
                             Please select a valid state.
                         </div>
                     </div>
                     <div class='col-md-2'>
                         <label for='zipcode'>Zip code</label>
                         <input type='text' class='form-control'>
                         <div class='invalid-feedback' id='zipcode' required>
                             Please provide a valid zip.
                         </div>
                     </div>
                     <h3 class='hpink'>Payment</h3>
                     <div class='col-md-5 mt-0'>
                         <label for='card-number'>Card Number</label>
                         <input type='number' class='form-control' placeholder='0000 0000 0000 0000' id='card-number' required>
                     </div>
                     <div class='col-md-3 mt-0'>
                         <label for='card-expiry'>Expiry Date</label>
                         <input type='date' class='form-control' placeholder='MM/YY' id='card-expiry' required>
                     </div>
                     <div class='col-md-2 mt-0'>
                         <label for='card-cvv'>CVV</label>
                         <input type='number' class='form-control' placeholder='CVV' id='card-cvv' required>
                     </div>
                     <div class='col-12'>
                         <div class='form-check'>
                           <input class='form-check-input' type='checkbox' value=' id='invalidCheck' required>
                           <label class='form-check-label' for='invalidCheck'>
                             Agree to terms and conditions
                           </label>
                           <div class='invalid-feedback'>
                             You must agree before submitting.
                           </div>
                         </div>
                     </div>
                     <div class='col-md-8 text-center'>
                             <button type='submit' class='btn orange bpink mb-2'>Purchase</button>
                     </div>
                 </form>";
            }
            else {
                echo "<h2>Your Cart is Empty!</h2>";
            }
            
        ?>
      </div>
      <div class="modal-footer">
        <button class="btn purple bcyan" data-bs-target="#cartModal" data-bs-toggle="modal">Back to Cart</button>
      </div>
    </div>
  </div>
</div>