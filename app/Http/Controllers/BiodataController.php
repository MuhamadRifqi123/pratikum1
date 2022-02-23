<?php

namespace App\Http\Controllers;

use App\Models\Biodata;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isadmin !=1){
            abort(403);
        }
        $data=[
            'title'=>'List Siswa',
            'siswa'=> Biodata::orderBy('created_at','desc')->get(),
        ];
        return view ('list_siswa',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'title'=>'Tambah Siswa',
            // 'route' => route('biodata.store'),
        ];
        return view('form_siswa', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bio = new Biodata;
        $bio->nama = $request->nama;
        $bio->lahir = $request->tmpt;
        $bio->tgl=$request->tgl;
        $bio->jk=$request->jk;
        $bio->hoby=$request->hobby;
        $bio->agama=$request->agama;
        $bio->alamat=$request->alamat;
        $bio->telp=$request->telp;
        $bio->email=$request->email;
        $bio->save();
        return redirect()->route('list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'Title' => 'Curriculum Vitae',
            'bio' => Biodata::where('id', $id)->first(),
        ];
        return view('biodata', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Biodata',
            'method' => 'PUT',
            'route' => route('update-siswa', $id),
            'bio' => Biodata::where('id', $id)->first(),
        ];
        return view('edit_siswa', $data);
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
}
