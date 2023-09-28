<?php
//require_once '/../vendor/autoload.php'; // Include the autoloader for Dompdf
require_once 'dbconnection.php'; // Assuming you have a file for database connection

use Dompdf\Dompdf;

// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ushurupay";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT phone, amount, account_reference, checkout_request_id FROM payments";
$result = mysqli_query($conn, $sql);

// Example report data
$reportData = [
    'title' => 'Market Cess Collection Report',
    'date' => date('Y-m-d'),
    'data' => [],
];

// Populate the report data with the fetched data
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Add each row of data to the reportData array
        $reportData['data'][] = $row;
    }
}

// Close the database connection
mysqli_close($conn);

// Generate the report content
$reportContent = "
    <h1>{$reportData['title']}</h1>
    <p>Date: {$reportData['date']}</p>
    <h2>Data:</h2>
    <table>
        <tr>
            <th>Phone</th>
            <th>Amount</th>
            <th>Account Reference</th>
            <th>Checkout Request ID</th>
        </tr>
";

foreach ($reportData['data'] as $dataRow) {
    // Display each row of data in the report table
    $reportContent .= "
        <tr>
            <td>{$dataRow['phone']}</td>
            <td>{$dataRow['amount']}</td>
            <td>{$dataRow['account_reference']}</td>
            <td>{$dataRow['checkout_request_id']}</td>
        </tr>
    ";
}

$reportContent .= "
    </table>
";

// Convert HTML to PDF using Dompdf
//$dompdf = new Dompdf();
//$dompdf->loadHtml($reportContent);
//$dompdf->setPaper('A4', 'portrait');
//$dompdf->render();

// Save the PDF to a file or send it to the client for download
//$filename = 'market_cess_report.pdf'; // You can change the filename and extension based on your requirements
//file_put_contents($filename, $dompdf->output());

// Redirect the user to the generated PDF file
//header('Location: ' . $filename);
//exit();
echo $reportContent;
?>
