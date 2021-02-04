<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Signed;
use Brian2694\Toastr\Facades\Toastr;
use Dompdf\Dompdf;
use Elibyy\TCPDF\TCPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\Tfpdf\Fpdi as TfpdfFpdi;

class SignatureController extends Controller
{
    public function generatePDF(Request $request)
    {
        // dd($request->all());
        $data['title'] = 'Contrato firmado';
        $data['css_files'] = [asset('backend/css/main.css'),];
        $html = '
                <style>
                    table{
                        border-bottom: 0.1 solid #000000;
                        width: 100%;
                        text-align: center;
                    }
                    textarea{
                        border: none;
                        font-size: 0.8em;
                        min-height: 4em;
                    }
                </style>
                <table>
                    <thead>
                        <tr>
                            <th>Firmas del contrato: '.$request->contractName.'</th>
                        </tr>
                    </thead>
                </table>
                ';

        if(isset($request->Name1)){
            $html .= '
            <table>
                    <tbody>
                        <tr>
                            <td><strong>Nombre: </strong>'.$request->Name1.'</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre legal: </strong>'.$request->LegalName1.'</td>
                        </tr>
                        <tr>
                            <td><strong>Correo: </strong>'.$request->Mail1.'</td>
                        </tr>
                        <tr>
                            <td><strong>RFC: </strong>'.$request->RFC1.'</td>
                        </tr>
                        <tr>
                            <td><strong>No. de Serie SCD: </strong>'.$request->Serial1.'</td>
                        </tr>
                        <tr>
                            <td><strong>Firma Digital: </strong></td>
                        </tr>
                        <tr>
                            <td><textarea class="form-control" placeholder="">'.$request->Signature1.'</textarea></td>
                        </tr>
                    </tbody>
                </table>
            ';
        }
        if(isset($request->Name2)){
            $html .= '
            <table>
                    <tbody>
                        <tr>
                            <td><strong>Nombre: </strong>'.$request->Name2.'</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre legal: </strong>'.$request->LegalName2.'</td>
                        </tr>
                        <tr>
                            <td><strong>Correo: </strong>'.$request->Mail2.'</td>
                        </tr>
                        <tr>
                            <td><strong>RFC: </strong>'.$request->RFC2.'</td>
                        </tr>
                        <tr>
                            <td><strong>No. de Serie SCD: </strong>'.$request->Serial2.'</td>
                        </tr>
                        <tr>
                            <td><strong>Firma Digital: </strong></td>
                        </tr>
                        <tr>
                            <td><textarea class="form-control" placeholder="">'.$request->Signature2.'</textarea></td>
                        </tr>
                    </tbody>
                </table>
            ';
        }
        if(isset($request->Name3)){
            $html .= '
            <table>
                    <tbody>
                        <tr>
                            <td><strong>Nombre: </strong>'.$request->Name3.'</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre legal: </strong>'.$request->LegalName3.'</td>
                        </tr>
                        <tr>
                            <td><strong>Correo: </strong>'.$request->Mail3.'</td>
                        </tr>
                        <tr>
                            <td><strong>RFC: </strong>'.$request->RFC3.'</td>
                        </tr>
                        <tr>
                            <td><strong>No. de Serie SCD: </strong>'.$request->Serial3.'</td>
                        </tr>
                        <tr>
                            <td><strong>Firma Digital: </strong></td>
                        </tr>
                        <tr>
                            <td><textarea class="form-control" placeholder="">'.$request->Signature3.'</textarea></td>
                        </tr>
                    </tbody>
                </table>
            ';
        }
        if(isset($request->Name4)){
            $html .= '
            <table>
                    <tbody>
                        <tr>
                            <td><strong>Nombre: </strong>'.$request->Name4.'</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre legal: </strong>'.$request->LegalName4.'</td>
                        </tr>
                        <tr>
                            <td><strong>Correo: </strong>'.$request->Mail4.'</td>
                        </tr>
                        <tr>
                            <td><strong>RFC: </strong>'.$request->RFC4.'</td>
                        </tr>
                        <tr>
                            <td><strong>No. de Serie SCD: </strong>'.$request->Serial4.'</td>
                        </tr>
                        <tr>
                            <td><strong>Firma Digital: </strong></td>
                        </tr>
                        <tr>
                            <td><textarea class="form-control" placeholder="">'.$request->Signature4.'</textarea></td>
                        </tr>
                    </tbody>
                </table>
            ';
        }
        if(isset($request->Name5)){
            $html .= '
            <table>
                    <tbody>
                        <tr>
                            <td><strong>Nombre: </strong>'.$request->Name5.'</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre legal: </strong>'.$request->LegalName5.'</td>
                        </tr>
                        <tr>
                            <td><strong>Correo: </strong>'.$request->Mail5.'</td>
                        </tr>
                        <tr>
                            <td><strong>RFC: </strong>'.$request->RFC5.'</td>
                        </tr>
                        <tr>
                            <td><strong>No. de Serie SCD: </strong>'.$request->Serial5.'</td>
                        </tr>
                        <tr>
                            <td><strong>Firma Digital: </strong></td>
                        </tr>
                        <tr>
                            <td><textarea class="form-control" placeholder="">'.$request->Signature5.'</textarea></td>
                        </tr>
                    </tbody>
                </table>
            ';
        }



		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('letter', 'portrait');
        $dompdf->render();

        if(!file_exists('/public/' . $this->getUserFolder())) {
            Storage::makeDirectory('/public/' . $this->getUserFolder());
        }

        file_put_contents('storage/'.$this->getUserFolder() .'/'.'anexo.pdf', $dompdf->output());

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
        $pdf->setSourceFile('storage/'.$this->getUserFolder() .'/'.'anexo.pdf');
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);
        $pdf->Output('storage/'.$this->getUserFolder() .'/' .$request->contractName.'.pdf', 'F');

        Signed::create([
            'url' => 'storage/'.$this->getUserFolder() .'/' .$request->contractName.'.pdf',
            'user_id' => Auth::user()->id,
            'contract_id' => $request->contractId
        ]);


        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('signer_two_mail', Auth::user()->email)
            ->get();
        // $signeds = Signed::whereUserId(Auth::user()->id);

        Toastr::success('Tu documento ha sido firmado. En tu Dashboard tendrás un historial de documentos firmados','Bien');

        return view('contracts.index', compact('files', 'contracts'));
    }

    public function saveImg($id)
    {
        $file = Signed::find($id);
        $download = $file->url;

        return response()->download($download);
    }

    private function getUserFolder()
    {
        return str_replace(' ', '-', Auth::id() . '-' . Auth::user()->name);
    }
}
