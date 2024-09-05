<?php
include 'connection.php';
include 'nav.php';

// Check if user_id is set in session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Prepare and execute the query
    $sqlorder = "SELECT o.order_id, o.order_date, o.status, p.title AS product_name, p.price AS product_price, o.quantity
    FROM orders o
    JOIN product p ON o.product_id = p.p_id
    WHERE o.user_id = ?";
    $stmt = $con->prepare($sqlorder);
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    // Close statement and connection
    $stmt->close();
} else {
    echo "User not logged in.";
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #007bff;
            height: 100vh;
            padding-top: 20px;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            margin: 10px 0;
        }
        .sidebar a:hover {
            background-color: #0056b3;
        }
        .content {
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: transparent;
            border-bottom: none;
        }
        .progress-bar {
            border-radius: 5px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .table .status {
            font-weight: bold;
        }
        .status.delivered {
            color: green;
        }
        .status.cancelled {
            color: red;
        }
        .status.pending {
            color: orange;
        }
        .chart-container {
            position: relative;
            height: 200px;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>User Dashboard</h2>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Purchases</h5>
                        <h3>$12,345</h3>
                        <p class="text-success">5% Increase from Last Month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Loyalty Points</h5>
                        <h3>1,230</h3>
                        <p class="text-success">10% Increase from Last Month</p>
                        <p>Redeemable Amount: $123</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Delivery Status</h5>
                        <div class="mb-3">
                            <p>Order #12345</p>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p>Order #12346</p>
                            <div class="progress">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p>Order #12347</p>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title">Order History</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product</th>
                                    <th>Purchase Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    if ($row) {
                                        // Calculate the difference between current date and order date
                                        $orderDate = new DateTime($row['order_date']);
                                        $currentDate = new DateTime();
                                        $interval = $currentDate->diff($orderDate);
                                        $days = $interval->days;
                                        $returnButton = '';

                                        // Check if the order date is within the last 7 days
                                        if ($days <= 7) {
                                            $returnButton = '<a href="return_order.php?order_id=' . htmlspecialchars($row['order_id']) . '" class="btn btn-secondary">Return</a>';
                                        }

                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($row['order_id']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['product_name']) . '</td>';
                                        echo '<td>' . htmlspecialchars($row['order_date']) . '</td>';
                                        echo '<td>$' . htmlspecialchars($row['product_price']) . '</td>';
                                        echo '<td class="status ' . htmlspecialchars($row['status']) . '">' . htmlspecialchars($row['status']) . '</td>';
                                        echo '<td>' . $returnButton . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>
