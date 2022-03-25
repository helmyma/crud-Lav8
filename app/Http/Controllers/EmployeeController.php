<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = employee::all();
        return view('pegawai',compact('data'));
    }

    public function addpegawai()
    {
        return view('addpegawai');
    }

    public function insertpegawai(Request $request)
    {
        //dd($request->all());
       $data = Employee::create($request->all());
       if ($request->hasFile('foto')){
          $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
          $data->foto = $request->file('foto')->getClientOriginalName();
          $data->save();
       }
        return redirect()->route('pegawai')->with('success','Data Berhasil Ditambahkan');
    }

    public function updatepegawai($id)
    {
        $data = Employee::find($id); 
        //dd($data);
        return view('updatepegawai', compact('data'));
    }

    public function editpegawai(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());

        if ($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
         }
         
        return redirect()->route('pegawai')->with('success','Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Employee::find($id);
        $data->delete();

        return redirect()->route('pegawai')->with('success','Data Berhasil Di Hapus');
    }
}
