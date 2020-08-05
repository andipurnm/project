@extends('layouts.master')


@section('title')
    About Us Edit
@endsection


@section('content')

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4 class="card-title"> Dashboard - Edit Data </h4>

<form action="{{ url('dash-update/'.$dashboard->id)}}" method="POST">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <div class="modal-body">

          <<div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Kostan:</label>
            <input name='nama' type="text"  class="form-control" value="{{ $dashboard->nama}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gambar:</label>
            <input name='gambar' type="text"  class="form-control" value="{{ $dashboard->gambar}}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fasilitas:</label>
            <textarea name='fasilitas' type="text"  class="form-control" >{{ $dashboard->fasilitas}}</textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Deskripsi:</label>
            <textarea name='deskripsi' class="form-control"  >{{ $dashboard->deskripsi}}</textarea>
          </div>       
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Harga:</label>
            <input name='harga' type="text"  class="form-control" value="{{ $dashboard->harga}}">
          </div>
      
      <div class="modal-footer">
      <a href="{{ url('dashboard')}}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">UPDATE</button>
      </div>
      </form>
    </div>
  </div>
</div>
      
</div>
</div>
</div>
</div>

@endsection