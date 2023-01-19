<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $savedFilePath = $request->file(key:'image')->store(path:'photos',options:'public');
        Log::debug($savedFilePath);
        $fileName = pathinfo($savedFilePath,flags:PATHINFO_BASENAME);
        Log::debug($fileName);

        return to_route('photos.show',['photo'=>$fileName])->with('success','アップロードしました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fileName)
    {
        return view('photos.show',['fileName'=>$fileName]);
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
    public function destroy($fileName)
    {
        Storage::disk('public')->delete(paths:'photos/'.$fileName);
        return to_route(route:'photos.create')->with('success','削除しました');
    }
    //アップロードの画像ダウンロード処理
    public function download($fileName)
    {
        return Storage::disk(name:'public')->download(path:'photos/'.$fileName,name:'アップロード画像.jpg');
    }
}
