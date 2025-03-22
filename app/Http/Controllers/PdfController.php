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

        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; }
        </style>';

        $PDFHTML .= '</head>';
        $PDFHTML .= '<body>';
        $PDFHTML .= '<div class="invoice-container">';
        
        // Header
        $PDFHTML .= '<div class="header">';
        $PDFHTML .= '<h1>Invoice</h1>';
        $PDFHTML .= '<p>Invoice #12345 | Date: 2023-10-01</p>';
        $PDFHTML .= '</div>';
        
        $PDFHTML .= '<table class="info-table">';
      

        // second row
        
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