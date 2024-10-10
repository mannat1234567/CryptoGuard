<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $wallet_address = $_POST['wallet_address'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    // Prepare data to store
    $newReport = array(
        'wallet_address' => $wallet_address,
        'name' => $name,
        'date' => $date,
        'description' => $description
    );

    // Define the path to the JSON file
    $file = 'crowdspamr.json';

    // Read the existing data from the JSON file
    if (file_exists($file)) {
        $data = file_get_contents($file);
        $json_data = json_decode($data, true);
    } else {
        $json_data = array(); // If file doesn't exist, create an empty array
    }

    // Add the new report to the array
    $json_data[] = $newReport;

    // Write the updated data back to the JSON file
    file_put_contents($file, json_encode($json_data, JSON_PRETTY_PRINT));

    // Redirect back to the form or show a success message
    echo "Scam report submitted successfully!";
}
?>
