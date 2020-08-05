<?php

namespace App\Http\Controllers\Admin;

use App\Models\Abouts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        $aboutus = Abouts::all();
        return view('admin.aboutus')
        ->with('aboutus',$aboutus);
    }

    public function store(request $request)
    {
        $aboutus = new Abouts;

        $aboutus->title = $request->input('title');
        $aboutus->description = $request->input('description');

        $aboutus->save();
        return redirect('/abouts')->with('status','Data tersimpan');
    }

    public function edit($id)
    {
        $aboutus = Abouts::findOrFail($id);
        return view('admin.abouts.edit')
        ->with('aboutus',$aboutus);
    }

    public function update(request $request, $id)
    {
        $aboutus = Abouts::findOrFail($id);
        $aboutus->title = $request->input('title');
        $aboutus->description = $request->input('description');
        $aboutus->update();

        return redirect('abouts')->with('status','Data terupdate');
    }

    public function delete($id)
    {
        $aboutus = Abouts::findOrFail($id);
        $aboutus->delete();

        return redirect('abouts')->with('status','Data terhapus');
    }
}
