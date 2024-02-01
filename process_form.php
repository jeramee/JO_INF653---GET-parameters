<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" || ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_REQUEST['submit_method']))) {
    // Determine the method (GET or POST)
    $method = ($_SERVER["REQUEST_METHOD"] === "GET") ? $_GET['submit_method'] : "POST";

    // Check if the second submit button was clicked (using the name attribute)
    $isPostSubmit = isset($_REQUEST['submit_method']) && $_REQUEST['submit_method'] === 'post';

    // Check if all required parameters are set and the form was submitted with POST or GET
    if (($isPostSubmit && isset($_POST['first']) && isset($_POST['last']) && isset($_POST['age'])) ||
        (!$isPostSubmit && isset($_GET['first']) && isset($_GET['last']) && isset($_GET['age']))
    ) {
        // Sanitize input parameters
        $firstname = filter_input(($method === "POST") ? INPUT_POST : INPUT_GET, 'first', FILTER_SANITIZE_STRING);
        $lastname = filter_input(($method === "POST") ? INPUT_POST : INPUT_GET, 'last', FILTER_SANITIZE_STRING);
        $age = intval(($method === "POST") ? $_POST['age'] : $_GET['age']); // Convert age to integer

        // Output sentences
        echo "Hello, my name is $firstname $lastname.<br>";

        echo "I am $age years old and ";

        // Check age condition
        if ($age >= 18) {
            echo "I am old enough to vote in the United States.<br>";
        } else {
            echo "I am not old enough to vote in the United States.<br>";
        }

        // Calculate days based on age
        $days = $age * 365;
        echo "I have been alive for approximately $days days.<br>";
        echo "And I am still very good looking.<br>";
        // Add current date
        echo "Current date: " . date("m-d-Y") . "<br>";
    } elseif (!$isPostSubmit) {
        // Output message if required parameters are not submitted when using GET
        echo "Please provide all required parameters (firstname, lastname, age).";
    }
}
?>
