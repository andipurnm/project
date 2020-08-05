<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('user',$users);
    }

    public function registeredit(request $request,$id)
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);
    }

    public function registerupdate(request $request,$id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect('/role-register')->with('status','Data telah  terupdated');
    }

    public function registerdelete($id)
    {
        $users =User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('status','Data telah  terhapus');
    }


    public function index()
    {
        $kostan = Dashboard::all();
        return view('admin.dashboard')
        ->with('dashboard',$kostan);
    }

    public function tambah(request $request)
    {
        $kostan = new Dashboard;

        $kostan->nama = $request->input('nama');
        $kostan->gambar = $request->input('gambar');
        $kostan->fasilitas = $request->input('fasilitas');
        $kostan->deskripsi = $request->input('deskripsi');
        $kostan->harga = $request->input('harga');

        $kostan->save();
        return redirect('/dashboard')->with('status','Data tersimpan');
    }

    public function edit($id)
    {
        $kostan = Dashboard::findOrFail($id);
        return view('admin.dashboard.edit')
        ->with('dashboard',$kostan);
    }
    public function update(request $request, $id)
    {
        $kostan = Dashboard::findOrFail($id);
        $kostan->nama = $request->input('nama');
        $kostan->gambar = $request->input('gambar');
        $kostan->fasilitas = $request->input('fasilitas');
        $kostan->deskripsi = $request->input('deskripsi');
        $kostan->harga = $request->input('harga');

        $kostan->update();

        return redirect('dashboard')->with('status','Data terupdate');
    }

    public function delete($id)
    {
        $kostan = Dashboard::findOrFail($id);
        $kostan->delete();

        return redirect('dashboard')->with('status','Data terhapus');
    }
}
