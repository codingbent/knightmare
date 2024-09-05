<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        .status.received {
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
    <div class="d-flex">
        <div class="sidebar col-2">
            <a href="#"><i class="fas fa-home"></i> Home</a>
            <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#"><i class="fas fa-address-book"></i> Contact</a>
            <a href="#"><i class="fas fa-calendar-alt"></i> Calendar</a>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
            <a href="#"><i class="fas fa-sign-out-alt"></i> Sign out</a>
        </div>
        <div class="content col-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Dashboard</h2>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control me-2" placeholder="Search Here">
                    <i class="fas fa-bell me-3"></i>
                    <i class="fas fa-user-circle"></i>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Sale</h5>
                            <h3>₹2435</h3>
                            <p class="text-success">37% Last Week</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Visitors</h5>
                            <h3>6547</h3>
                            <p class="text-success">23% Last Week</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">New Orders</h5>
                            <h3>1523</h3>
                            <p class="text-success">17% Last Week</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Customers</h5>
                            <h3>2310</h3>
                            <p class="text-success">14% Last Week</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Revenue <small class="text-muted">This Year</small></h5>
                            <h3>₹18,00,000 <small class="text-muted">All Time</small></h3>
                            <div class="chart-container">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Reviews <small class="text-muted">This Month</small></h5>
                            <div class="chart-container">
                                <canvas id="reviewChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Recent Orders <small class="text-muted">This Week</small></h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Customer</th>
                                        <th>Purchase On</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Tracking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#0218076</td>
                                        <td>Branice Hays</td>
                                        <td>21 Aug 2019</td>
                                        <td>₹676</td>
                                        <td class="status received">Received</td>
                                        <td>DFOHJY</td>
                                    </tr>
                                    <tr>
                                        <td>#0234078</td>
                                        <td>Toll Holder</td>
                                        <td>24 Aug 2019</td>
                                        <td>₹456</td>
                                        <td class="status cancelled">Cancelled</td>
                                        <td>JHBKL</td>
                                    </tr>
                                    <tr>
                                        <td>#0256953</td>
                                        <td>Shane Will</td>
                                        <td>09 Sep 2019</td>
                                        <td>₹645</td>
                                        <td class="status received">Received</td>
                                        <td>KJ5LO</td>
                                    </tr>
                                    <tr>
                                        <td>#0215684</td>
                                        <td>Daniel Hook</td>
                                        <td>10 Dec 2019</td>
                                        <td>₹354</td>
                                        <td class="status pending">Pending</td>
                                        <td>BGQ2L</td>
                                    </tr>
                                    <tr>
                                        <td>#0235689</td>
                                        <td>Smith Widson</td>
                                        <td>21 Nov 2019</td>
                                        <td>₹634</td>
                                        <td class="status received">Received</td>
                                        <td>MJK0LK</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Delivery <small class="text-muted">In Progress</small></h5>
                            <div class="mb-3">
                                <p>MacBook Pro 15"</p>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p>iMac Pro 2019</p>
                                <div class="progress">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p>iPad Pro Intous Pen</p>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p>MacBook Pro 13"</p>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Profit <small class="text-muted">This Year</small></h5>
                            <h3>₹12,00,000 <small class="text-muted">All Time</small></h3>
                            <div class="chart-container">
                                <canvas id="profitChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="card-body">
                            <h5 class="card-title">Return Analysis <small class="text-muted">This Month</small></h5>
                            <div class="mb-3">
                                <p>Items Yet to be Returned</p>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <p>Refund Left to Pay</p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [{
                    label: 'Income',
                    data: [10, 50, 40, 60, 70, 50, 80, 90, 100, 110],
                    borderColor: 'blue',
                    fill: false
                }, {
                    label: 'Expenses',
                    data: [20, 40, 30, 50, 60, 40, 70, 80, 90, 100],
                    borderColor: 'orange',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const reviewCtx = document.getElementById('reviewChart').getContext('2d');
        const reviewChart = new Chart(reviewCtx, {
            type: 'pie',
            data: {
                labels: ['1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
                datasets: [{
                    data: [10, 20, 30, 25, 15],
                    backgroundColor: ['red', 'orange', 'yellow', 'lightgreen', 'green']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        const profitCtx = document.getElementById('profitChart').getContext('2d');
        const profitChart = new Chart(profitCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                datasets: [{
                    label: 'Profit',
                    data: [20, 30, 25, 35, 40, 30, 50, 60, 70, 80],
                    borderColor: 'green',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>

</body>
</html>