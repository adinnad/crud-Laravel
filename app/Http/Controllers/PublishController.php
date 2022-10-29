<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publish;
use App\Models\User;
use Illuminate\Foundation\Events\VendorTagPublished;

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    if(isset($request->busca)){
        $publish=Publish::where('user_id', '=', auth()->user()->id)->where('title', 'LIKE', '%'.$request->busca.'%')->get();
    }else{

        $publish=Publish::where('user_id', '=', auth()->user()->id)->get();
    }
        //dd($publish);
        return view('dashboard', compact('publish'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        Publish::create($request->all());
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Publish::findOrFail($id);

        $noticiaOwner = User::where('id', $noticia->user_id)->first()->toArray();

        return view('publish.show', compact('noticia'), compact('noticiaOwner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Publish::findOrFail($id);
        return view('publish.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        Publish::findOrFail($request->id)->update($request->all());
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Publish::findOrFail($id);
        $noticia->delete();
        return redirect()->route('dashboard', compact('noticia'))->with('msg', 'Noticia deletada com sucesso!');
    }
}
