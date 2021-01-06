<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\Tfpdf\Fpdi as TfpdfFpdi;

class SignatureController extends Controller
{
    public function generatePDF(Request $request)
    {
        // dd($request->all());

        $data['title'] = 'Contrato firmado';
		$data['css_files'] = [asset('backend/css/main.css'),];
        // $html = $this->load->view('layouts/pdf', $data, true);
        $html = '
                <style>
                    table{
                        border: 0.5 solid #000000;
                        width: 100%;
                    }
                    textarea{
                        border: none;
                        font-size: 0.8em;
                        min-height: 8em;
                    }
                </style>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <table>
                    <thead>
                        <tr>
                            <th>Firma del contrato: '.$request->contractName.'</th>
                        </tr>
                    </thead>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50%;">Propietario</th>
                            <th>Invitado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Nombre: </strong>'.$request->ownerName.'</td>
                            <td><strong>Nombre: </strong>'.$request->guestName.'</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre legal: </strong>'.$request->ownerLegalName.'</td>
                            <td><strong>Nombre legal: </strong>'.$request->guestLegalName.'</td>
                        </tr>
                        <tr>
                            <td><strong>Correo: </strong>'.$request->ownerMail.'</td>
                            <td><strong>Correo: </strong>'.$request->guestMail.'</td>
                        </tr>
                        <tr>
                            <td><strong>RFC: </strong>'.$request->ownerRFC.'</td>
                            <td><strong>RFC: </strong>'.$request->guestRFC.'</td>
                        </tr>
                        <tr>
                            <td><strong>No. de Serie SCD: </strong>'.$request->ownerSerial.'</td>
                            <td><strong>No. de Serie SCD: </strong>'.$request->guestSerial.'</td>
                        </tr>
                        <tr>
                            <td><strong>Firma Digital: </strong></td>
                            <td><strong>Firma Digital: </strong></td>
                        </tr>
                        <tr>
                            <td><textarea rows="10" cols="50" class="form-control" placeholder="">'.$request->ownerSignature.'</textarea></td>
                            <td><textarea rows="10" cols="50" class="form-control" placeholder="">'.$request->guestSignature.'</textarea></td>
                        </tr>
                    </tbody>
                </table>
                ';
		// $pdf_file = realpath($request->fileName);
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('letter', 'portrait');
		$dompdf->render();
        file_put_contents('doc2.pdf', $dompdf->output());

        $pdf = new Fpdi();
        $pagecount = $pdf->setSourceFile('storage/'.$request->fileName);
        for($i=0; $i<$pagecount; $i++){
                $pdf->AddPage('P', 'Letter');
                $tplidx = $pdf->importPage($i+1, '/MediaBox');
                $pdf->useTemplate($tplidx, 10, 10, 200);
            }
        $pdf->AddPage('P', 'Letter');
        // $tplIdx = $pdf->importPage($pagecount);
        // $pdf->useTemplate($tplIdx);
        $pdf->setSourceFile("doc2.pdf");
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);
        $pdf->Output();


		// $pdf = new Fpdi();
        // $pdf->AddPage('P', 'Letter');
        // $pagecount = $pdf->setSourceFile('storage/'.$request->fileName);
        // $pdf->setSourceFile('storage/'.$request->fileName);
		// $tplIdx = $pdf->importPage($pagecount);
		// $pdf->useTemplate($tplIdx);
		// $pdf->setSourceFile("doc2.pdf");
		// $tplIdx = $pdf->importPage(1);
        // $pdf->useTemplate($tplIdx);
        // $pdf->Output();


        // $pdf = new Fpdi();

        // $pagecount = $pdf->setSourceFile('storage/'.$request->fileName);
        // for($i=0; $i<$pagecount; $i++){
        //     $pdf->AddPage();
        //     $tplidx = $pdf->importPage($i+1, '/MediaBox');
        //     $pdf->useTemplate($tplidx, 10, 10, 200);
        // }

        // $pdf->addPage();
        // $pdf->Output();
    }
}
