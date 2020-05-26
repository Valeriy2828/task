@extends('app')

@section('content')
    <div class="edit-form-content" style="margin-top: 50px;">
        <div class="container">
            <form method="post" action="/edit/{{$edit->user_id}}/update">
                @csrf
                <div class="col-5">
                    <center>
                        <div style="margin: 20px 0 30px 0;"><h3>Edit user</h3></div>
                    </center>
                    <div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Firstname</label>
                            <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" value="{{ $edit->first_name  }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lastname</label>
                            <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" value="{{ $edit->last_name }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submit" class="btn btn-primary" value="Save changes">
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-5 text-center">
                <a href="{{ route('home') }}">To home page</a>
            </div>
        </div>
    </div>
@endsection
