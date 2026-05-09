
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Management System</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-container">

    <div class="left-section">
        <h1>Employee Salary Management System</h1>
        <p>
            Manage employee salary details, calculate annual salary,
            tax deduction, performance grade, and generate employee reports.
        </p>

        <div class="feature-box">
            <h3>Features</h3>
            <ul>
                <li>Employee Salary Report</li>
                <li>Performance Grade System</li>
                <li>Automatic Tax Calculation</li>
                <li>Department Wise Bonus</li>
            </ul>
        </div>
    </div>

    <div class="form-section">

        <h2>Employee Details</h2>

        <form method="POST">

            <input type="text" name="name" placeholder="Enter Employee Name" required>

            <input type="email" name="email" placeholder="Enter Employee Email" required>

            <select name="department" required>
                <option value="">Select Department</option>
                <option>HR</option>
                <option>Development</option>
                <option>Marketing</option>
                <option>Finance</option>
            </select>

            <input type="number" name="salary" placeholder="Enter Monthly Salary" required>

            <input type="number" name="bonus" placeholder="Enter Bonus Amount" required>

            <button type="submit">Generate Report</button>

        </form>

        <button class="info-btn" onclick="showDetails()">
            Show Company Info
        </button>

        <p id="info"></p>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = htmlspecialchars($_POST['name']);

    $email = htmlspecialchars($_POST['email']);

    $department = htmlspecialchars($_POST['department']);

    $salary = (int)$_POST['salary'];

    $bonus = (int)$_POST['bonus'];

    if($department == "Development")
    {
        $bonus += 20000;
    }

    $annualSalary = ($salary * 12) + $bonus;

    $tax = $annualSalary * 0.10;

    $netSalary = $annualSalary - $tax;

    if($annualSalary >= 500000)
    {
        $grade = "A";
    }
    else if($annualSalary >= 300000)
    {
        $grade = "B";
    }
    else
    {
        $grade = "C";
    }

    $employeeId = "EMP" . rand(1000,9999);

    echo "<div class='result'>";

    echo "<h3>Employee Report</h3>";

    echo "<p><b>Employee ID:</b> $employeeId</p>";

    echo "<p><b>Name:</b> $name</p>";

    echo "<p><b>Email:</b> $email</p>";

    echo "<p><b>Department:</b> $department</p>";

    echo "<p><b>Annual Salary:</b> ₹$annualSalary</p>";

    echo "<p><b>Tax Deduction:</b> ₹$tax</p>";

    echo "<p><b>Net Salary:</b> ₹$netSalary</p>";

    echo "<p><b>Performance Grade:</b> $grade</p>";

    echo "<p><b>Date:</b> " . date("d-m-Y") . "</p>";

    echo "</div>";
}

?>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>
