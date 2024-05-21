<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('C:\wamp\www\dheen\pdf\tcpdf.php');

    // Create new PDF document
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Your Creator');
    $pdf->SetAuthor('Your Author');
    $pdf->SetTitle('Payment Receipt');
    $pdf->SetSubject('Payment Receipt');
    $pdf->SetKeywords('Payment, Receipt, A4, PHP');

    // Set default header data
    $pdf->SetHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));

    // Set header and footer fonts
    $pdf->setHeaderFont(Array('helvetica', '', 12));
    $pdf->setFooterFont(Array('helvetica', '', 10));

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont('courier');

    // Set margins
    $pdf->SetMargins(10, 10, 10);

    // Remove default footer
    $pdf->setPrintFooter(false);

    // Add a page
    $pdf->AddPage();

    // Get form data from the request
    $fullName = $_POST['full_name'];
    $registrationNumber = $_POST['registration_number'];
    $guardianName = $_POST['guardian_name'];
    $grade = $_POST['grade'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];

    // Set content
    $content = "
        <h2>Payment Receipt</h2>
        <p>Full Name: $fullName</p>
        <p>Registration Number: $registrationNumber</p>
        <p>Guardian Name: $guardianName</p>
        <p>Grade: $grade</p>
        <p>Address: $address</p>
        <p>Date of Payment: $date</p>
        <p>Gender: $gender</p>
    ";

    $pdf->writeHTML($content, true, false, true, false, '');

    // Output the PDF as a file (you can also use 'I' to show it directly in the browser)
    $pdf->Output('payment_receipt.pdf', 'D');
}
?>
