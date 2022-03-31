<?php

namespace App\Http\Controllers;

use App\Http\Requests\Papers\DestroyPaperRequest;
use App\Http\Requests\Papers\StorePaperRequest;
use App\Http\Requests\Papers\UpdatePaperRequest;
use App\Http\Resources\Papers\PaperResource;
use App\Models\Paper;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:index-paper|store-paper|update-paper|destroy-paper', ['only' => ['index', 'show']]);
        $this->middleware('permission:store-paper', ['only' => ['store']]);
        $this->middleware('permission:update-paper', ['only' => ['update']]);
        $this->middleware('permission:destroy-paper', ['only' => ['destroy', 'destroys']]);
    }

    public function index()
    {
        //return Client::paginate();
        // $papers = Paper::get();
        $papers = DB::table('papers')
            ->orderBy('id', 'DESC')
            ->join('users', 'users.id', '=', 'papers.user_id')
            ->select(
                'papers.id',
                'papers.dia',
                'users.name',

                'papers.ayunas',
                'papers.nph_lantus',
                'papers.rapida_ultra_rap',

                'papers.media_manana',
                'papers.rapida_ultra_rap_m',

                'papers.almuerzo',
                'papers.rapida_ultra_rap_a',

                'papers.media_tarde',
                'papers.rapida_ultra_rap_t',

                'papers.merienda',
                'papers.rapida_ultra_rap_md',
                'papers.nph_lantus_md',

                'papers.dormir',
                'papers.correcion_total',
                'papers.observaciones',

            )
            ->get();
        return response()->json(
            [
                'data' => $papers,
                'summary' => 'consulta exitosa',
                'detail' => '',
                'code' => '200'
            ]
        );
    }
    ///

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaperRequest $request)
    {
        $papers = new Paper();
        $papers->dia = $request->input('dia');
        $papers->user_id = $request->input('user_id');
        $papers->ayunas = $request->input('ayunas');
        $papers->nph_lantus = $request->input('nph_lantus');
        $papers->rapida_ultra_rap = $request->input('rapida_ultra_rap');

        $papers->media_manana = $request->input('media_manana');
        $papers->rapida_ultra_rap_m = $request->input('rapida_ultra_rap');

        $papers->almuerzo = $request->input('almuerzo');
        $papers->rapida_ultra_rap_a = $request->input('rapida_ultra_rap_a');


        $papers->media_tarde = $request->input('media_tarde');
        $papers->rapida_ultra_rap_t = $request->input('rapida_ultra_rap_t');

        $papers->merienda = $request->input('merienda');
        $papers->rapida_ultra_rap_md = $request->input('rapida_ultra_rap_md');
        $papers->nph_lantus_md = $request->input('nph_lantus_md');

        $papers->dormir = $request->input('dormir');
        $papers->correcion_total = $request->input('correcion_total');
        $papers->observaciones = $request->input('observaciones');





        $papers->save();


        return (new PaperResource($papers))
            ->additional([
                'msg' => [
                    'summary' => 'hoja creada',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Client $client
     * 
     * @return ClientResource
     * 
     */
    public function show(Paper $paper)
    {
        // $papers = DB::table('papers')
        //     ->leftJoin('users', 'users.id', '=', 'papers.user_id')
        //     ->select(
        //         'papers.id',
        //         'papers.dia',
        //         'users.name as paciente',

        //         'papers.ayunas',
        //         'papers.nph_lantus',
        //         'papers.rapida_ultra_rap',

        //         'papers.media_manana',
        //         'papers.rapida_ultra_rap_m',

        //         'papers.almuerzo',
        //         'papers.rapida_ultra_rap_a',

        //         'papers.media_tarde',
        //         'papers.rapida_ultra_rap_t',

        //         'papers.merienda',
        //         'papers.rapida_ultra_rap_md',
        //         'papers.nph_lantus_md',

        //         'papers.dormir',
        //         'papers.madrugada',
        //         'papers.correcion_total',
        //     )
        //     ->find($paper);
        // return response()->json(
        //     [
        //         'data' => $papers,
        //         'summary' => 'consulta exitosa',
        //         'detail' => '',
        //         'code' => '200'
        //     ]
        // );
        return (new PaperResource($paper))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => 'consulta exitosa',
                    'code' => '200'
                ]
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaperRequest $request, Paper $papers)
    {
        $papers->dia = $request->input('dia');
        $papers->user_id = $request->input('user_id');
        $papers->ayunas = $request->input('ayunas');
        $papers->nph_lantus = $request->input('nph_lantus');
        $papers->rapida_ultra_rap = $request->input('rapida_ultra_rap');

        $papers->media_manana = $request->input('media_manana');
        $papers->rapida_ultra_rap_m = $request->input('rapida_ultra_rap');

        $papers->almuerzo = $request->input('almuerzo');
        $papers->rapida_ultra_rap_a = $request->input('rapida_ultra_rap_a');

        $papers->media_tarde = $request->input('media_tarde');
        $papers->rapida_ultra_rap_t = $request->input('rapida_ultra_rap_t');

        $papers->merienda = $request->input('merienda');
        $papers->rapida_ultra_rap_md = $request->input('rapida_ultra_rap_md');
        $papers->nph_lantus_md = $request->input('nph_lantus_md');

    
        $papers->dormir = $request->input('dormir');
        $papers->correcion_total = $request->input('correcion_total');
        $papers->observaciones = $request->input('observaciones');





        $papers->save();


        return (new PaperResource($papers))
            ->additional([
                'msg' => [
                    'summary' => 'hoja actualizada',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($paper)
    {
        $paper = Paper::find($paper);
        $paper->delete();
        return (new PaperResource($paper))
            ->additional([
                'msg' => [
                    'summary' => 'Cliente eliminado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
    public function destroys(DestroyPaperRequest $request)
    {
        Paper::destroy($request->input('ids'));

        return (new PaperResource($request))
            ->additional([
                'msg' => [
                    'summary' => 'eliminado exitosa',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
}
