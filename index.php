<?php
//Required PHP files
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Company Dashboard</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="scss/main.css">
    <link rel="stylesheet" href="scss/clearPrompt.css">
</head>
<body>
    <nav>
        <div class="nav-button-container">
            <button class="nav-button" id='menuButton'>&#9776</button>

            <a href="https://github.com/JMiller7334">
                <button class="nav-button">Back to GitHub</button>
            </a>

            <button class="nav-button" id="navClearData">Clear Data</button>
        </div>

        <h1>Analytics</h1>
    </nav>

    <div class="clear-prompt" id="clearPrompt">
        <h2>Clear Existing Data?</h2>
        <p>Do you want to clear all records from the customer usage table?</p>

        <div class="clear-button-container">
            <button id="buttonClear">Clear Data</button>
            <button id="buttonKeep">Keep Data</button>
        </div>
    </div>

    <footer>
        <p>Tip: Leave the 'search by name' field empty and click 'find' to show all customers.</p>
    </footer>

    <div class="main-container">

        <aside id="mainTab">
            <!-- TOGGLE BUTTONS -->
            <div class = "form-container">
                <div class = "tab-container" id="tabType">
                    <button id="buttonCustomers">Customer</button>
                    <button id="buttonUsage">Usage</button>
                </div>

                <div class = "tab-container" id="tabAction">
                    <button id="buttonTabInsert">Insert</button>
                    <button id="buttonTabDelete">Delete</button>
                    <button id="buttonTabRead">Read</button>
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
                    <input type="number" placeholder="Enter Customer Id (ie: 1)" id="delId" name="delId" required>

                    <input type="hidden" name="action" value="delete">
                    <button type="submit" id="submitDel" name="submitDel">Delete</button>
                </form>

                <!-- READ FORM -->
                <form action="php/read.php" method="POST" id="formRead">
                    <h2 id='readTitle'>Read From Database</h2>
                    <input type="text" placeholder="Enter Customer Id (ie: 1)" id="read_term" name="read_term" required>
                    
                    <input type="hidden" name="action" value="read">
                    <button type="submit" id="submit" name="submit">Read</button>
                </form>

                <!-- SEARCH FORM -->
                <form action="php/search.php" method="POST" id="formSearch">
                    <div>
                        <input type="text" placeholder="Find id by name" id="search_term" value="" name="search_term">

                        <button type="submit" id="submit" name="submit">Find</button>
                    </div>
                    <p id="search_results"></p>
                </form>

                <!-- USAGE INSERT -->
                <form action="php/usage.php" method="POST" id="formUsage">
                    <h2>Insert to Monthly Usage</h2>
                    <input type="text" placeholder="Customer Id (ie: 1)" id="id" name="id" required>
                    <input type="text" placeholder="Month" id="month" name="month" required>
                    <input type="number" placeholder="Usage(kWh)" id="usage" name="usage" required>

                    <button type="submit" id="submit" name="submit">Insert</button>
                </form>
            </div>
        </aside>

        <div class="dashboard-container">

            <div class="dashboard">
                <div class="card">
                    <h2 id="metric_customers">Total Customers: <?php echo $total_customers; ?></h2>
                </div>
                <div class="card">
                    <h2>Avg. monthly billed: $<?php echo $est_profit?></h2>
                </div>
                <div class="card">
                    <h2>Avg. monthly power usage(kWh): <?php echo $avg_power_usage; ?></h2>
                </div>
            </div>

            <div class="graphs">
                <div class="card">
                    <h3> Customer Billing Trends</h3>
                    <canvas id="customerChart"></canvas>
                </div>
            </div>

        </div>
    </div>


    <!-- Module scripts -->
    <script type='module' src='scripts/utilities/tab.js'></script>
    <script type="module" src='scripts/utilities/inputValidation.js'></script>


    <!-- AJAX scripts -->
     <script type='module' src="scripts/ajax/customerInsert.js"></script>
     <script type='module' src="scripts/ajax/usageInsert.js"></script>
     <script src="scripts/ajax/search.js"></script>
     <script src="scripts/ajax/read.js"></script>
     <script src="scripts/ajax/clearData.js"></script>
     <script src="scripts/ajax/customerDelete.js"></script>


    <!-- Controller scripts -->
    <script type='module' src="scripts/controller/indexController.js"></script>

    <!-- Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="scripts/utilities/charts.js"></script>
</body>
</html>