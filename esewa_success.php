<?php
session_start();

include('layouts/header.php');


if (isset($_GET['data'])) {
    // Decode the URL-encoded data parameter
    $url_encoded_data = $_GET['data'];
    $decoded_data = urldecode($url_encoded_data);

    // Decode the base64-encoded JSON
    $base64_encoded_json = base64_decode($decoded_data);
    $response_data = json_decode($base64_encoded_json, true);

    // Check if the response indicates successful payment
    if (isset($response_data['status']) && $response_data['status'] === 'COMPLETE') {
        // Payment is successful
        echo '<section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2>Payment Successful!</h2>';
    echo "<p>Transaction ID: {$response_data['transaction_code']}</p>";
    echo "<p>Amount: Rs.{$response_data['total_amount']}</p>";
    // Handle any further processing as needed (e.g., updating order status)
    echo '</div>
        </section>';

        // Clear the stored order ID from session
        unset($_SESSION['order_id']);
    } else {
        // Payment failed or response not as expected
        echo "<h2>Payment Failed!</h2>";
        // You might display an error message or handle differently
    }
} else {
    // If data parameter is not set in the URL
    echo "<h2>Error: Invalid Request</h2>";
}



include('layouts/footer.php');
?>
