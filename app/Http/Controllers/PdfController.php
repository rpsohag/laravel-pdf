<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function example_one()
    {
        $PDFHTML = '';
        $PDFHTML .= '<html>';
        $PDFHTML .= '<head>';
        $PDFHTML .= '<style>
        body {margin: 0; padding: 0;}
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; }
        .invoice-title { font-size: 60px; font-weight: bold; letter-spacing: 2px; position: relative; margin-right: 80px; text-align: right; text-transform: uppercase; }
        .invoice-title::before{ content:" "; display: block; height: 2px; width: 730px; position: absolute; top: 40px; left: 0; background: #000;}
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        </style>';
    
        $PDFHTML .= '</head>';
        $PDFHTML .= '<body>';
        $PDFHTML .= '<div class="invoice-container">';
        
        // Header
        $PDFHTML .= '<div class="header">';
        $PDFHTML .= '<h1 class="invoice-title">Invoice</h1>';
        $PDFHTML .= '<p>Invoice #12345 | Date: 2023-10-01</p>';
        $PDFHTML .= '</div>';
        
        $PDFHTML .= '<table>';
            $PDFHTML .= '<tr>';
                $PDFHTML .= '<td>';
                    $PDFHTML .= '<table border="1">';
                            $PDFHTML .= '<tr>';
                                $PDFHTML .= '<th class="p-2">Name</th>';
                                $PDFHTML .= '<th class="p-2">Email</th>';
                            $PDFHTML .= '</tr>';
                            $PDFHTML .= '<tr>';
                                $PDFHTML .= '<td class="p-2">John Doe</td>';
                                $PDFHTML .= '<td class="p-2">jyHbI@example.com</td>';
                            $PDFHTML .= '</tr>';
                    $PDFHTML .= '</table>';
                    $PDFHTML .= '</td>';
                    $PDFHTML .= '<td>';
                    $PDFHTML .= '<table border="1">';
                            $PDFHTML .= '<tr>';
                                $PDFHTML .= '<th class="p-2">Name</th>';
                                $PDFHTML .= '<th class="p-2">Email</th>';
                            $PDFHTML .= '</tr>';
                            $PDFHTML .= '<tr>';
                                $PDFHTML .= '<td class="p-2">John Doe</td>';
                                $PDFHTML .= '<td class="p-2">jyHbI@example.com</td>';
                            $PDFHTML .= '</tr>';
                    $PDFHTML .= '</table>';
                    $PDFHTML .= '</td>';
                    $PDFHTML .= '<td>';
                    $PDFHTML .= '<table border="1">';
                            $PDFHTML .= '<tr>';
                                $PDFHTML .= '<th class="p-2">Name</th>';
                                $PDFHTML .= '<th class="p-2">Email</th>';
                            $PDFHTML .= '</tr>';
                            $PDFHTML .= '<tr>';
                                $PDFHTML .= '<td class="p-2">John Doe</td>';
                                $PDFHTML .= '<td class="p-2">jyHbI@example.com</td>';
                            $PDFHTML .= '</tr>';
                    $PDFHTML .= '</table>';
                $PDFHTML .= '</td>';
            $PDFHTML .= '</tr>';
        $PDFHTML .= '</table>';
    
        $PDFHTML .= '<table>';
            $PDFHTML .= '<tr>';
                $PDFHTML .= '<td>';
                    $PDFHTML .= '<table border="1">';
                            $PDFHTML .= '<tr style="background-color: #6495ED;">';
                                $PDFHTML .= '<th class="p-2 text-center" width="5%">#SL</th>';
                                $PDFHTML .= '<th class="p-2" width="60%">Product Name</th>';
                                $PDFHTML .= '<th class="p-2 text-center" width="15%">Price</th>';
                                $PDFHTML .= '<th class="p-2 text-center" width="10%">Quantity</th>';
                                $PDFHTML .= '<th class="p-2 text-center" width="10%">Total</th>';
                            $PDFHTML .= '</tr>';
                            $PDFHTML .= '<tr>';
                                $PDFHTML .= '<td class="p-2 text-center">1</td>';
                                $PDFHTML .= '<td class="p-2">Product A</td>';
                                $PDFHTML .= '<td class="p-2 text-center">$10.00</td>';
                                $PDFHTML .= '<td class="p-2 text-center">2</td>';
                                $PDFHTML .= '<td class="p-2 text-center">$20.00</td>';
                            $PDFHTML .= '</tr>';
                            $PDFHTML .= '<tr>';
                                $PDFHTML .= '<td class="p-2 text-center">1</td>';
                                $PDFHTML .= '<td class="p-2">Product A</td>';
                                $PDFHTML .= '<td class="p-2 text-center">$10.00</td>';
                                $PDFHTML .= '<td class="p-2 text-center">2</td>';
                                $PDFHTML .= '<td class="p-2 text-center">$20.00</td>';
                            $PDFHTML .= '</tr>';
                            $PDFHTML .= '<tr>';
                                $PDFHTML .= '<td class="p-2 text-center">1</td>';
                                $PDFHTML .= '<td class="p-2">Product A</td>';
                                $PDFHTML .= '<td class="p-2 text-center">$10.00</td>';
                                $PDFHTML .= '<td class="p-2 text-center">2</td>';
                                $PDFHTML .= '<td class="p-2 text-center">$20.00</td>';
                            $PDFHTML .= '</tr>';
                    $PDFHTML .= '</table>';
                    $PDFHTML .= '</td>';
                $PDFHTML .= '</td>';
            $PDFHTML .= '</tr>';
        $PDFHTML .= '</table>';
    
        // Calculation Section
        $PDFHTML .= '<table style="margin-top: 20px;">';
            $PDFHTML .= '<tr>';
                $PDFHTML .= '<td width="85%" class="text-right"><strong>Subtotal</strong></td>';
                $PDFHTML .= '<td width="15%" class="text-right">$60.00</td>';
            $PDFHTML .= '</tr>';
            $PDFHTML .= '<tr>';
                $PDFHTML .= '<td width="85%" class="text-right"><strong>Tax (10%)</strong></td>';
                $PDFHTML .= '<td width="15%" class="text-right">$6.00</td>';
            $PDFHTML .= '</tr>';
            $PDFHTML .= '<tr>';
                $PDFHTML .= '<td width="85%" class="text-right"><strong>Total</strong></td>';
                $PDFHTML .= '<td width="15%" class="text-right">$66.00</td>';
            $PDFHTML .= '</tr>';
        $PDFHTML .= '</table>';
        
        // Footer
        $PDFHTML .= '<div class="footer">';
        $PDFHTML .= '<p>Thank you for your business!</p>';
        $PDFHTML .= '<p>Please send payments to the address above or via bank transfer.</p>';
        $PDFHTML .= '</div>';
        
        $PDFHTML .= '</div>';
        $PDFHTML .= '</body>';
        $PDFHTML .= '</html>';
    
        $pdf = Pdf::loadHTML($PDFHTML);
    
        $pdf->setPaper('A4', 'portrait')
            ->setWarnings(false)
            ->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        
        return $pdf->stream('invoice.pdf', [
            'Content-Disposition' => 'inline; filename="invoice.pdf"',
        ]);
    }
}