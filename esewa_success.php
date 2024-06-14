<?php
session_start();

include('server/connection.php');
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
        $transaction_id = $response_data['transaction_code'];
        $order_id = $_SESSION['order_id'];

        // Update order status in your database
        $sql_update = "UPDATE orders SET order_status = 'Paid' WHERE order_id = ?";
        $stmt = $conn->prepare($sql_update);
        
        if ($stmt) {
            $stmt->bind_param("i", $order_id);
            if ($stmt->execute()) {
                // Output success message
                echo '<section class="my-5 py-5">
                    <div class="container text-center mt-3 pt-5">
                        <h2>Payment Successful!</h2>';
                echo "<p>Transaction ID: {$transaction_id}</p>";
                echo "<p>Amount: Rs.{$response_data['total_amount']}</p>";
                echo '</div></section>';

                // Clear the stored order ID from session
                unset($_SESSION['order_id']);
            } else {
                // Payment failed or response not as expected
                echo "<h2>Payment Failed!</h2>";
            }
        } else {
            // Error preparing statement
            echo "<h2>Payment Failed!</h2>";
        }

        // Close statement
        $stmt->close();
    } else {
        // Payment failed or response not as expected
        echo "<h2>Payment Failed!</h2>";
    }
} else {
    // If data parameter is not set in the URL
    echo "<h2>Error: Invalid Request</h2>";
}

include('layouts/footer.php');
?>
