<?php
include('layouts/header.php');

if (isset($_POST['order_pay_btn'])) {
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
    $order_id = uniqid(); // Generate a unique order ID
    $_SESSION['order_id'] = $order_id; // Store the order ID in session
}

$order_total_price = $_POST['order_total_price'] ?? 0;
$order_id = $_SESSION['order_id'] ?? '';

// Prepare the message according to the specified order of signed field names
$message = "total_amount={$order_total_price},transaction_uuid={$order_id},product_code=EPAYTEST";
echo $message;
// Secret key for HMAC-SHA256
$secret_key = '8gBm/:&EnhH.1/q';

// Generate the HMAC-SHA256 hash and then encode it in Base64
$hash = hash_hmac('sha256', $message, $secret_key, true);
$signature = base64_encode($hash);


?>

<!--Payment-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="font-weight-bold">--Payment--</h2>
        <hr class="mx-auto">
    </div>

    <div class="mx-auto container text-center">
        <?php if ($order_total_price > 0) { ?>
            <p>Total payment: Rs.<?php echo $order_total_price; ?></p>
            
            <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                <input type="hidden" id="amount" name="amount" value="<?php echo $order_total_price; ?>" required>
                <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
                <input type="hidden" id="total_amount" name="total_amount" value="<?php echo $order_total_price; ?>" required>
                <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="<?php echo $order_id; ?>" required>
                <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
                <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                <input type="hidden" id="success_url" name="success_url" value="http://localhost/ecom/esewa_success.php" required>
                <input type="hidden" id="failure_url" name="failure_url" value="http://localhost/ecom/esewa_failure.php" required>
                <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                <input type="hidden" id="signature" name="signature" value="<?php echo $signature; ?>" required>
                <input src="assets/imgs/esewa.webp" type="image" height="80px" width="130px">
            </form>
        <?php } else { ?>
            <p>You don't have any order for payment</p>
        <?php } ?>
    </div>
</section>

<?php
include('layouts/footer.php');
?>
