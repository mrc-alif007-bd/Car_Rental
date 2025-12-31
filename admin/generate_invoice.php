<?php
session_start();
include_once("../inc/db_config.php");


if(!isset($_SESSION['cleint_login'])){
    header("Location: ../login.php");
    exit();
}


require('../libs/fpdf/fpdf.php');

if (isset($_GET['b_id'])) {
    $booking_id = $_GET['b_id'];


    $sql = "SELECT * FROM bookings WHERE booking_id = '$booking_id' LIMIT 1";
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_object();

        $invoice_no = !empty($row->invoice_id) ? $row->invoice_id : 'INV-'.$row->booking_id;
        $db_status = $row->booking_status; 

        class PDF extends FPDF
        {
            function Header()
            {
                $this->SetFont('Arial', 'B', 15);
                $this->Cell(80);
                $this->Cell(30, 10, 'INVOICE', 0, 0, 'C');
                $this->Ln(20);
            }

            function Footer()
            {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(130, 5, 'National Cab Company', 0, 0);
        $pdf->Cell(59, 5, 'INVOICE', 0, 1);

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(130, 5, '123 Panthapath, Dhaka', 0, 0);
        $pdf->Cell(59, 5, '', 0, 1);

        $pdf->Cell(130, 5, 'Phone: +88017564128', 0, 0);
        $pdf->Cell(25, 5, 'Date:', 0, 0);
        $pdf->Cell(34, 5, date("Y-m-d"), 0, 1);

        $pdf->Cell(130, 5, 'Zip Code: 1105', 0, 0);
        $pdf->Cell(25, 5, 'Invoice ID:', 0, 0);
        $pdf->Cell(34, 5, $invoice_no, 0, 1);

        $pdf->Cell(189, 10, '', 0, 1); // Spacer

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(100, 5, 'Bill To:', 0, 1);
        
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, 'Client Name: ' . $row->client_name, 0, 1);
        
        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, 'Client NID: ' . $row->nid, 0, 1);

        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, 'Address: ' . $row->pick_address, 0, 1);

        $pdf->Cell(189, 10, '', 0, 1); 


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(130, 7, 'Description', 1, 0, 'C');
        $pdf->Cell(59, 7, 'Amount ($)', 1, 1, 'C');


        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(130, 20, "Car Rental Service (Booking ID: ".$row->booking_id.")", 1, 0);
        $pdf->Cell(59, 20, number_format($row->total_amount, 2), 1, 1, 'R');


        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(130, 7, 'Total', 1, 0, 'R');
        $pdf->Cell(59, 7, number_format($row->total_amount, 2), 1, 1, 'R');


        $pdf->Cell(189, 10, '', 0, 1); 
        $pdf->SetFont('Arial', 'B', 14);
     
        if(strtolower(trim($db_status)) == "paid"){
            $pdf->SetTextColor(0, 128, 0); 
            $status_text = "PAID";
        } else {
            $pdf->SetTextColor(255, 0, 0); 
            $status_text = "DUE";
        }
        
        $pdf->Cell(189, 10, 'STATUS: ' . $status_text, 0, 1, 'R');

        $pdf->Output('I', 'Invoice_'.$invoice_no.'.pdf');

    } else {
        echo "Booking not found.";
    }
}
?>