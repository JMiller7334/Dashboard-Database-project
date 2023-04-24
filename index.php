<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <nav>
        <button>Return</button>
        <div><h1>Analytics</h1></div>
    </nav>
    <div class="wrapper">
        <aside>
            <form action="connect.php" method="POST">
                <h1>Search Database</h1>
                <input placeholder="Search by ID">
                <h2>Insert to Database</h2>

                <input type="text" placeholder="Customer Type" id="type" name="type" required>
                <input type="text" placeholder="Customer Name" id="name" name="name" required>
                <input type="text" placeholder="Customer Phone" id="phone" name="phone" required>
                <input type="text" placeholder="Customer Address" id="address" name="address" required>
                <input type="email" placeholder="Customer Email" id="email" name="email" required>

                <button type="submit" id="submit" name="submit">Insert</button>
            </form>
        </aside>

        <div class="dashboard">
            <div class="card">
                <h1>Total Customers: X</h1>
            </div>
            <div class="card">
                <h1>Avg. Monthly Usage: Y</h1>
            </div>
            <div class="card">Est Monthly Profit: Z</div>
        </div>

        <div class="graphs">

            <div class="card">
                <h1> Yearly Averages</h1>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="scripts/charts.js"></script>
</body>
</html>