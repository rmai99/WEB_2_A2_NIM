<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelMember

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = ModelMember::all();
		return view('read',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahmember');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new ModelMember();
		$data->name = $request->name;
		$data->email = $request->email;
		$data->password = $request->password;
		$data->macAddress = $request->macAddress;
		$data->save();
		return redirect()->route('read.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ModelMember::where('id',$id)->get();
      return view('editMahasiswa',compact('data'));
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
      $data = ModelMember::where('id',$id)->first();
      $data->name = $request->name;
      $data->email = $request->email;
      $data->password = $request->password;
      $data->macAddress = $request->macAddress;
      $data->save();
      return redirect()->route('mahasiswa.index')->with('alert-success','Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = ModelMember::where('id',$id)->first();
      $data->delete();
      return redirect()->route('member.index')->with('alert-success','Data berhasil dihapus!');
    }
}
