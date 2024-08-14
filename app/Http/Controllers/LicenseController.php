<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCredenciadaLicensesRequest;
use Illuminate\Validation\ValidationException;

use App\Http\Requests\LicenseRequest;
use App\License;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = License::all();
        return view('licenses.index', [
            compact('licenses'),
            'licenças_credenciada' => []
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('licenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LicenseRequest $request)
    {
        $license = new License();

        LicenseController::checkCNPJ($request->CNPJ);

        $license->id_credenciada = LicenseController::get_id_credenciada($request->CNPJ);

        $license->data_de_licenciamento = $request->data_de_licenciamento;
        $license->data_vencimento = $request->data_vencimento;
        $license->isRevogada = False;
        $license->save();
        return view('licenses.feedback.sucess');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function show(License $license)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function edit(License $license)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, License $license)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public function destroy(License $license)
    {
        //
    }
    public static function get_id_credenciada(string $CNPJ)
    {
        return DB::table('credenciadas')->where('CNPJ', $CNPJ)->first()->id;
    }

    /**
     * Verifica se o CNPJ existe.
     *
     * @param  \App\License  $license
     * @return \Illuminate\Http\Response
     */
    public static function checkCNPJ(string $CNPJ)
    {
        // dd(DB::table('credenciadas')->where('CNPJ', $CNPJ)->first());
        if (DB::table('credenciadas')->where('CNPJ', $CNPJ)->first() == null) {
            throw ValidationException::withMessages(['CNPJ não consta no sistema!']);
        }
    }

    public function toggle_isRevogada($id)
    {
        $license = License::findOrFail($id);

        $situacao = $license->isRevogada;

        if($situacao == 1){
            $license->isRevogada = 0;
        }
        else{
            $license->isRevogada = 1;
        }
        $license->save();
        return redirect('/license');
    }
    public function get_credenciada_licenses(GetCredenciadaLicensesRequest $request)
    {
        LicenseController::credenciadaExists($request->CNPJ);

        $id_credenciada = DB::table('credenciadas')->where('CNPJ', $request->CNPJ)->first()->id;

        $licenças_credenciada = DB::table('licenses')->where('id_credenciada', $id_credenciada)->get();

        return view('licenses.index',['licenças_credenciada' => $licenças_credenciada]);
    }

    protected static function credenciadaExists(String $CNPJ)
    {
        if (DB::table('credenciadas')->where('CNPJ', $CNPJ)->first() == null) {
            throw ValidationException::withMessages(['Credenciada não consta no sistema!']);
        }
    }
}
