<?php
include 'connection.php';
include 'nav.php';
?>
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
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control me-2" placeholder="Search Here">
                    <i class="fas fa-bell me-3"></i>
                    <i class="fas fa-user-circle"></i>
                </div>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#12345</td>
                                        <td>MacBook Pro</td>
                                        <td>01 Jan 2023</td>
                                        <td>$2,000</td>
                                        <td class="status delivered">Delivered</td>
                                    </tr>
                                    <tr>
                                        <td>#12346</td>
                                        <td>iPhone 13</td>
                                        <td>15 Jan 2023</td>
                                        <td>$1,000</td>
                                        <td class="status pending">Pending</td>
                                    </tr>
                                    <tr>
                                        <td>#12347</td>
                                        <td>Apple Watch</td>
                                        <td>20 Jan 2023</td>
                                        <td>$500</td>
                                        <td class="status cancelled">Cancelled</td>
                                    </tr>
                                    <tr>
                                        <td>#12348</td>
                                        <td>iPad Pro</td>
                                        <td>25 Jan 2023</td>
                                        <td>$800</td>
                                        <td class="status delivered">Delivered</td>
                                    </tr>
                                    <tr>
                                        <td>#12349</td>
                                        <td>AirPods</td>
                                        <td>30 Jan 2023</td>
                                        <td>$200</td>
                                        <td class="status delivered">Delivered</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>