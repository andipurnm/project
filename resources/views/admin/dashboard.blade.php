@extends('layouts.master')


@section('title')
    Dashboard | IP kost
@endsection


@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kostan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='/save-kostan' method="POST">
      {{csrf_field()}}
      <div class="modal-body">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Kostan:</label>
            <input name='nama' type="text"  class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gambar:</label>
            <input name='gambar' type="text"  class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fasilitas:</label>
            <textarea name='fasilitas' type="text"  class="form-control" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Deskripsi:</label>
            <textarea name='deskripsi' class="form-control"  id="message-text"></textarea>
          </div>       
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Harga:</label>
            <input name='harga' type="text"  class="form-control" id="recipient-name">
          </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SAVE</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Daftar Kostan</h4>
              </div>

              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD</button>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Nama Kostan</th>
                      <th>Gambar</th>
                      <th>Fasilitas</th>
                      <th>Deskripsi</th>
                      <th >Harga</th>
                      <th >EDIT</th>
                      <th >DELETE</th>
                    </thead>
                    <tbody>
                    @foreach ($dashboard  as $data)
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->gambar}}</td>
                        <td>{{$data->fasilitas}}</td>
                        <td>{{$data->deskripsi}}</td>
                        <td >{{$data->harga}}</td>
                        <td>
                        <a href="{{ url('dash-edit/'.$data->id) }}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                        <form action="{{ url('dash-delete/'.$data->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                            <button type="submit" class='btn btn-danger'>DELETE</button>
                        </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>

@endsection


@section('script')

@endsection
