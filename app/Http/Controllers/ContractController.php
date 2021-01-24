<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Mail\SendInvitation;
use App\User;
use App\Signature;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Mifiel\Document;
use PhpCfdi\Credentials\Credential;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();

        return view('contracts.index', compact('files', 'contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();

        return view('contracts.create', compact('files', 'contracts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->IdTwo == 0){
            $IdTwo = null;
        }else{
            $IdTwo = $request->IdTwo;
        }

        $name = $request->name;
        $path = $request->fileName;
        $message = $request->message;
        $file_id = $request->fileId;
        $owner_id = $request->IdOne;

        if(!isset($request->emailTwo)){
            $guest_id = NULL;
            $signer_Two_mail = NULL;
        }else{
            $guest_id = $request->IdTwo;
            $signer_Two_mail = $request->emailTwo;
            $receivers = [$signer_Two_mail];
        }

        if(!isset($request->emailTree)){
            $guest_id3 = NULL;
            $signer_Tree_mail = NULL;
        }else{
            $guest_id3 = $request->IdTree;
            $signer_Tree_mail = $request->emailTree;
            $receivers = [$signer_Two_mail, $signer_Tree_mail];
        }

        if(!isset($request->emailFour)){
            $guest_id4 = NULL;
            $signer_Four_mail = NULL;
        }else{
            $guest_id4 = $request->IdFour;
            $signer_Four_mail = $request->emailFour;
            $receivers = [$signer_Two_mail, $signer_Tree_mail, $signer_Four_mail];
        }

        if(!isset($request->emailFive)){
            $guest_id5 = NULL;
            $signer_Five_mail = NULL;
        }else{
            $guest_id5 = $request->IdFive;
            $signer_Five_mail = $request->emailFive;
            $receivers = [$signer_Two_mail, $signer_Tree_mail, $signer_Four_mail, $signer_Five_mail];
        }

        $contract = Contract::create([
            'name' => $name,
            'file_path' => $path,
            'guest_id' => $guest_id,
            'signer_two_mail' => $signer_Two_mail,
            'guest_id3' => $guest_id3,
            'signer_Tree_mail' => $signer_Tree_mail,
            'guest_id4' => $guest_id4,
            'signer_Four_mail' => $signer_Four_mail,
            'guest_id5' => $guest_id5,
            'signer_Five_mail' => $signer_Five_mail,
            'message' => $message,
            'file_id' => $file_id,
            'owner_id' => $owner_id
        ]);

        Mail::to($receivers)->send(new SendInvitation($contract));

        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

        Toastr::success('Parece que se almacenó tu documento.','Bien');
        return redirect()->route('contracts.index', compact('files'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();

        $contract = Contract::find($id);

        $contractId = $contract->id;
        $ownerId = $contract->owner_id;
        $guestId = $contract->guest_id;

        $ownerSignature = $contract->signatures()
            ->where('user_id', $ownerId)
            ->where('contract_id', $contractId)
            ->get();

        $ownerSignature = $ownerSignature->first();
        $guestSignature = Signature::where('contract_id', $contractId)
            ->where('user_id', $guestId)
            ->get();

        $guestSignature = $guestSignature->first();

        try {
            $serialOwner = $this->hexToStr($ownerSignature->serialNumber);
        } catch (Exception $exception) {
            $serialOwner = 0;
        }

        try {
            $serialGuest = $this->hexToStr($guestSignature->serialNumber);
        } catch (Exception $exception) {
            $serialGuest = 0;
        }
        // $serialOwner = $this->hexToStr($ownerSignature->serialNumber);
        // $serialGuest = $this->hexToStr($guestSignature->serialNumber);

        $signatures = $contract->signatures;

        return view('contracts.show', compact('signatures','contracts', 'contract', 'files', 'ownerSignature', 'guestSignature', 'serialOwner', 'serialGuest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function recibe($id)
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();

        $doc = File::find($id);

        return view('contracts.create', compact('files', 'contracts','doc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        // dd($request->all());
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();

        $owner = Auth::user();
        $name = $request->name;

        if($file = File::where('id', $request->file)->first()){
            $file = File::where('id', $request->file)->first();
            $file_path = config('app.url').Storage::url($file->file);
        }else{
            $file = "Algo salió mal...";
        }

        // Invitado estándar
        if($guest = User::where('email', $request->email)->first()){
            $guest_name = User::where('email', $request->email)->first()->name;
            $guest_email = User::where('email', $request->email)->first()->email;
            $guest_id = User::where('email', $request->email)->first()->id;
            $guest_info = 1;
        }else{
            $guest_name = "Invitado sin registrar";
            $guest_email = $request->email;
            $guest_id = 0;
            $guest_info = 0;
        }

        if($request->email1){
            // Invitado 1
            if($guest = User::where('email', $request->email1)->first()){
                $guest_name1 = User::where('email', $request->email1)->first()->name;
                $guest_email1 = User::where('email', $request->email1)->first()->email;
                $guest_id1 = User::where('email', $request->email1)->first()->id;
                $guest_info1 = 1;
            }else{
                $guest_name1 = "Invitado sin registrar";
                $guest_email1 = $request->email1;
                $guest_id1 = 0;
                $guest_info1 = 0;
            }


            if($request->email2){
                // Invitado 2
                if($guest = User::where('email', $request->email2)->first()){
                    $guest_name2 = User::where('email', $request->email2)->first()->name;
                    $guest_email2 = User::where('email', $request->email2)->first()->email;
                    $guest_id2 = User::where('email', $request->email2)->first()->id;
                    $guest_info2 = 1;
                }else{
                    $guest_name2 = "Invitado sin registrar";
                    $guest_email2 = $request->email2;
                    $guest_id2 = 0;
                    $guest_info2 = 0;
                }

                if($request->email3){
                    // Invitado 3
                    if($guest = User::where('email', $request->email3)->first()){
                        $guest_name3 = User::where('email', $request->email3)->first()->name;
                        $guest_email3 = User::where('email', $request->email3)->first()->email;
                        $guest_id3 = User::where('email', $request->email3)->first()->id;
                        $guest_info3 = 1;
                    }else{
                        $guest_name3 = "Invitado sin registrar";
                        $guest_email3 = $request->email3;
                        $guest_id3 = 0;
                        $guest_info3 = 0;
                    }
                    return view('contracts.confirm', compact('files','contracts','owner','guest_name','guest_email','guest_id','guest_info','guest_name1','guest_email1','guest_id1','guest_info1','guest_name2','guest_email2','guest_id2','guest_info2','guest_name3','guest_email3','guest_id3','guest_info3','name','file','file_path'));
                }

                return view('contracts.confirm', compact('files','contracts','owner','guest_name','guest_email','guest_id','guest_info','guest_name1','guest_email1','guest_id1','guest_info1','guest_name2','guest_email2','guest_id2','guest_info2','name','file','file_path'));
            }

            return view('contracts.confirm', compact('files','contracts','owner','guest_name','guest_email','guest_id','guest_info','guest_name1','guest_email1','guest_id1','guest_info1','name','file','file_path'));
        }

        return view('contracts.confirm', compact('files','contracts','owner','guest_name','guest_email','guest_id','guest_info','name','file','file_path'));
    }

    public function presign($id)
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();

        $contract = Contract::find($id);

        return view('contracts.presign', compact('files', 'contracts', 'contract'));
    }

    public function sign(Request $request)
    {
        // dd($request->all(), $request->contractId);
        // $pdf = new Fpdi();
        // $pageCount = $pdf->setSourceFile('storage/'.$request->file);
        // for ($i = 1; $i <= $pageCount; $i++) {
        //     $tplIdx = $pdf->importPage($i, '/MediaBox');
        //     $pdf->AddPage();
        //     $pdf->useTemplate($tplIdx);
        // }
        // $pdf->Image('images/downloadfile.png', 10, 190, 100, '', '', '', '', false, 300);
        // $pdf->Output();

        $cerFile = 'file://'.$request->cerFile;
        $pemKeyFile = 'file://'.$request->pemKeyFile;
        $passPhrase = $request->passPhrase; // contraseña para abrir la llave privada

        try {
            $fiel = Credential::openFiles($cerFile, $pemKeyFile, $passPhrase);
        } catch (Exception $exception) {
            $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

            Toastr::error('El password es invalido.','Error');
            return redirect()->back();
        }


        $sourceString = $request->contractName;
        // alias de privateKey/sign/verify
        $signature = $fiel->sign($sourceString);
        // echo base64_encode($signature), PHP_EOL;

        // alias de certificado/publicKey/verify
        $verify = $fiel->verify($sourceString, $signature);
        // var_dump($verify); // bool(true)

        // objeto certificado
        $certificado = $fiel->certificate();
        // echo $certificado->rfc(), PHP_EOL; // el RFC del certificado
        // echo $certificado->legalName(), PHP_EOL; // el nombre del propietario del certificado
        // echo $certificado->branchName(), PHP_EOL; // el nombre de la sucursal (en CSD, en FIEL está vacía)
        // echo $certificado->serialNumber()->bytes(), PHP_EOL; // número de serie del certificado
        // dd($certificado);
        try {
            $data = $certificado->serialNumber()->bytes();
            $str = $this->strToHex($data);
        } catch (Exception $exception) {
            $str = 'N/A';
        }


        // $hex = $this->hexToStr($str);
        // dd($data, $str, $hex);
        // dd(Auth::user()->id);

        Signature::create([
            'user_id' => Auth::user()->id,
            'contract_id' => $request->contractId,
            'verify' => $verify,
            'string' => base64_encode($signature),
            'rfc' => $certificado->rfc(),
            'legalName' => $certificado->legalName(),
            'branchName' => $certificado->branchName(),
            'serialNumber' => $str
        ]);

        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

        Toastr::success('Firma exitoza.','Bien');
        return redirect()->route('contracts.index', compact('files'));
    }

    public function download($id)
    {
        $contract = Contract::find($id);
        dd($contract);

        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

        Toastr::success('Archivo descargado.','Bien');
        return redirect()->route('contracts.index', compact('files'));
    }

    public function strToHex($string){
        $hex='';
        for ($i=0; $i < strlen($string); $i++){
            $hex .= dechex(ord($string[$i]));
        }
        return $hex;
    }
    public function hexToStr($hex){
        $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2){
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        }
        return $string;
    }
}
