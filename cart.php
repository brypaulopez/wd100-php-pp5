<!-- CART MODAL -->
<div class="modal fade" id="cartModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 hblack" id="staticBackdropLabel">Cart</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                            include "doodles-db.php";
                            $id = $_SESSION['id'];
                            $cartQuery = "SELECT * FROM user_tbl INNER JOIN order_tbl ON user_tbl.User_ID = order_tbl.Order_User_ID WHERE order_tbl.Order_User_ID = $id";
                            $cartResult = $conn->query($cartQuery);
                            $cartRow = $cartResult->num_rows;
                            if ($cartRow) {
                                while ($cartShow = $cartResult->fetch_assoc()) {
                                    echo "
                                        <form action='cart-getter-modify.php' method='POST'>
                                            <div class='row byellow text-center'>
                                                <input type='hidden' name='id' value='$cartShow[Order_ID]'>
                                                <div class='col-3'><h4 class='hpink'>$cartShow[Order_Name]</h4></div>
                                                <div class='col-2'><h6 class='hpurple'><span>Quantity:</span> $cartShow[Order_Qty]</h6>
                                                <h6 class='hpurple'><span>Size:</span> $cartShow[Order_Size]</h6>
                                                <h6 class='hpurple'><span>Price:</span> $cartShow[Order_Price]</h6></div>
                                                <div class='col-4'><img src='img/$cartShow[Order_Image]' alt='' class='w-100 bcyan'/></div>
                                                <div class='col-3'><button class='p-0 m-0 btn green bpink'>Remove</button></div>
                                            </div>
                                        </form>
                                    ";
                                }
                            }
                            else {
                                echo "<h2>Your Cart is Empty!</h2>";
                            }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cyan bpurple" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn purple bcyan" data-bs-target="#checkoutModal" data-bs-toggle="modal">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>