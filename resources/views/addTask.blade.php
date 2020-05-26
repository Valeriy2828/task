@extends('app')

@section('content')
    <!-- Add Task -->
    <div class="add-form-content" style="margin-top: 50px;">
        <div class="container">
            <form method="post" action="/addTask/add" >
                @csrf
                <div class="col-5">
                    <center>
                        <div style="margin: 20px 0 30px 0;"><h3>Add task</h3></div>
                    </center>
                    <div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5"></textarea>
                        </div>
                        {{--<div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>--}}
                        <div class="form-group">
                            <label for="properties">Status</label>
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
                                        <input type="text" name="status[{{ $i }}][key]" class="form-control" value="{{ old('status['.$i.'][key]') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="status[{{ $i }}][value]" class="form-control" value="{{ old('status['.$i.'][value]') }}">
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="form-group">
                            <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-5 text-center">
                <a href="{{ route('home') }}">To home page</a>
            </div>
        </div>
    </div>
    <!-- End add Task -->
@endsection
