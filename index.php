<?php
// Author: Jeramee Oliver
// Date: 1/31/2024
// Course: INF 653 - Back-end Development

include 'process_form.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Web Processor</h1>

    <!-- Form for GET method -->
    <form method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <?php include './view/form_elements.php'; ?>
        <input type="hidden" name="submit_method" value="get">
        <div>
            <button type="submit">Submit (GET)</button>
        </div>
    </form>

    <!-- Form for POST method -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <?php include './view/form_elements.php'; ?>
        <input type="hidden" name="submit_method" value="post">
        <div>
            <button type="submit">Submit (POST)</button>
        </div>
    </form>

    <!-- Reset Form -->
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="hidden" name="reset_form" value="true">
        <button type="submit">Reset</button>
    </form>

    <?php
    // Process Reset
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reset_form'])) {
        // Clear any stored data or session variables if needed
        // Redirect to the same page or perform any necessary actions
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
    ?>
</body>
</html>