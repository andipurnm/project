@extends('layouts.master')


@section('title')
    About Us
@endsection


@section('content')


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add about Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action='/save-aboutus' method="POST">
      {{csrf_field()}}
      <div class="modal-body">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input name='title' type="text"  class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea name='description' class="form-control"  id="message-text"></textarea>
          </div>       
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
                <h4 class="card-title"> About Us</h4>

                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>

              </div>
              <style>
                .w-10p{
                  width:10$ !important;
                }
              </style>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th class='w-10p'>Title</th>
                      <th class='w-10p'>Description</th>
                      <th class='w-10p'>EDIT</th>
                      <th class='w-10p'>DELETE</th>
                    </thead>
                    <tbody>
                        @foreach ($aboutus as $data)
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->title}}</td>
                        <td>
                            <div stylr="height:80px; overflow; hidden;">
                              {{$data->description}}
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('about-us/'.$data->id) }}" class='btn btn-success'>EDIT</a>
                        </td>
                        <td>
                        <form action="{{ url('about-us-delete/'.$data->id)}}" method="POST">
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
