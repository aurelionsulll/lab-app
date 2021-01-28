<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Analyse;

class AnalyseController extends Controller
{
    public function index()
    {
        return  view('admin.analyse');
    }

    public function show ()
    {
        return $analyses = Analyse::all();
    }

    public  function analyse_upl(Request $request)
    {
        $analyse = new Analyse();
        $analyse->name = $request->name;
        $analyse->icon = $request->icon;
        $analyse->desc = $request->desc;



        $analyse->save();


    }

    public function  deleteSlider($id)
    {
        $analyse = Analyse::find($id);
        $analyse->delete();
    }

    public function upd(Request $request, $id)
    {
        $analyse = Analyse::find($id);
        $analyse->name = $request->name;
        $analyse->icon = $request->icon;
        $analyse->desc = $request->desc;
        $analyse->save();
    }
}
