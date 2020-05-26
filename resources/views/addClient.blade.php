@extends('app')

@section('content')
<!-- Add User -->
<div class="add-form-content" style="margin-top: 50px;">
    <div class="container">
        <form method="post" action="/addClient/add" >
            @csrf
            <div class="col-5">
                <center>
                    <div style="margin: 20px 0 30px 0;"><h3>Add user</h3></div>
                </center>
                <div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Firstname</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="first_name" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lastname</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="last_name" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Select tasks</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="task_id">
                            @foreach($tasks as $task)
                                <option value="{{ $task->id }}">{{ $task->title }}</option>
                            @endforeach
                        </select>
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
<!-- End add User -->
@endsection
