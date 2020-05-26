@extends('app')

@section('content')
    <div class="edit-form-content" style="margin-top: 50px;">
        <div class="container">
            <form method="post" action="/editTask/{{$editTask->id}}/update">
                @csrf
                <div class="col-5">
                    <center>
                        <div style="margin: 20px 0 30px 0;"><h3>Edit task</h3></div>
                    </center>
                    <div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $editTask->title  }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5" >{{ $editTask->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="row">
                                <div class="col-md-2">
                                    Key:
                                </div>
                                <div class="col-md-4">
                                    Value:
                                </div>
                            </div>
                            @for ($i=0; $i <= 2; $i++)
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" name="status[{{ $i }}][key]" class="form-control"
                                               value="{{ $editTask->status[$i]['key'] ?? '' }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="status[{{ $i }}][value]" class="form-control"
                                               value="{{ $editTask->status[$i]['value'] ?? '' }}">
                                    </div>
                                </div>
                            @endfor
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
