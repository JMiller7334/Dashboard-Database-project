<?php
// Include required PHP files
require_once 'php/metrics.php';
require_once 'php/customers.php';
require_once 'php/search.php';
require_once 'php/utilities/clear.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <nav>
        <button>Return</button>
        <div><h1>Analytics</h1></div>
    </nav>
    <div class="main-container">
        <aside>
            <!-- TOGGLE BUTTONS -->
            <div class = "form-container">
                <div class = "tab-container" id="tabType">
                    <button onclick="toggleTab('customers')" id="buttonCustomers">Customer</button>
                    <button onclick="toggleTab('usage')" id="buttonUsage">Usage</button>
                </div>

                <div class = "tab-container" id="tabAction">
                    <button onclick="toggleAction('insert')" id="buttonTabInsert">Insert</button>
                    <button onclick="toggleAction('delete')" id="buttonTabDelete">Delete</button>
                    <button onclick="toggleAction('read')" id="buttonTabRead">Read</button>
                </div>

                <!-- CUSTOMER INSERT -->
                <form action="php/customers.php" method="POST" id="formCustomers">
                    <h2>Insert to Customers</h2>
                    <input type="text" placeholder="Customer Type" id="type" name="type" required>
                    <input type="text" placeholder="Customer Name" id="name" name="name" required>
                    <input type="text" placeholder="Custome Phone #" id="phone" name="phone" required>
                    <input type="text" placeholder="Customer Address" id="address" name="address"required>
                    <input type="text" placeholder="Customer Email" id="email" name="email">

                    <input type="hidden" name="action" value="insert">
                    <button type="submit" id="submit" name="submit">Insert</button>
                </form>

                <!-- DELETE FORM -->
                <form action="php/delete.php" method="POST" id="formDelete">
                    <h2 id='deleteTitle'>Delete From Database</h2>
                    <input type="number" placeholder="Customer Id" id="delId" name="delId" required>

                    <input type="hidden" name="action" value="delete">
                    <button type="submit" id="submitDel" name="submitDel">Delete</button>
                </form>

                <!-- READ FORM -->
                <form action="php/read.php" method="POST" id="formRead">
                    <h2 id='readTitle'>Read From Database</h2>
                    <input type="text" placeholder="Customer Id" id="read_term" name="read_term" required>
                    
                    <input type="hidden" name="action" value="read">
                    <button type="submit" id="submit" name="submit">Read</button>
                </form>

                <!-- SEARCH FORM -->
                <form action="php/search.php" method="POST" id="formSearch">
                    <div>
                        <input type="text" placeholder="Search by name" id="search_term" value="" name="search_term">

                        <button type="submit" id="submit" name="submit">Find</button>
                    </div>
                    <p id="search_results"></p>
                </form>

                <!-- USAGE INSERT -->
                <form action="php/usage.php" method="POST" id="formUsage">
                    <h2>Insert to Monthly Usage</h2>
                    <input type="text" placeholder="Customer Id" id="id" name="id" required>
                    <input type="text" placeholder="Month" id="month" name="month" required>
                    <input type="number" placeholder="Usage(kWh)" id="usage" name="usage" required>

                    <button type="submit" id="submit" name="submit">Insert</button>
                </form>
            </div>
        </aside>

        <div class="dashboard">
            <div class="card">
                <h1 id="metric_customers">Total Customers: <?php echo $total_customers; ?></h1>
            </div>
            <div class="card">
                <h1>Avg. monthly billed: $<?php echo $est_profit?></h1>
            </div>
            <div class="card">Avg. monthly power usage(kWh): <?php echo $total_usage; ?></div>
        </div>

        <div class="graphs">

            <div class="card">
                <h1> Customer Billing Trends</h1>
                <canvas id="customerChart"></canvas>
            </div>
        </div>
    </div>

    <script src="scripts/controller/indexController.js"></script>
    <script src="scripts/utilities/search.js"></script>
    <script src="scripts/utilities/read.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="scripts/utilities/charts.js"></script>
</body>
</html>