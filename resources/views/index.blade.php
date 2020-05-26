@extends('app')

@section('content')

   <!-- Contacts -->
   <div class="contacts-content">
      <div class="container">
         <div class="row">
             <div class="col-md-6  text-center">
                 <div class="col-md-6 text-center">
                     <h1 style="margin-bottom: 25px;">Users</h1>
                 </div>
                 <div class="col-md-6  text-center" style="margin: 1px 0 10px 0; font-size: 20px;">
                     <a href="{{ route('add') }}">Add user</a>
                 </div>
                 @if($clients->count() > 0)
                     <div class="col-md-6  text-center">
                         {{ $clients->count() }} user(s)
                     </div>

                     <table class="table">
                         <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Lastname\firstname</th>
                             <th scope="col">Task</th>
                             <th scope="col">Delete</th>
                             <th scope="col">Edit</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($clients as $client)
                             <tr>
                                 <th scope="row">{{ $loop->iteration }}</th>
                                 <td style="text-align: left;">
                                     <p>{{ $client->last_name }}  {{ $client->first_name }}</p>
                                 </td>
                                 <td style="text-align: left;">
                                     <p>{{ $client->task->title }}</p>
                                 </td>
                                 <td style="text-align: left;">
                                     {{--<a href="{{ route('destroy',['id' => $client->user_id]) }}" class="btn btn-warning">Delete</a>--}}
                                     <a href="/delete/{{ $client->user_id }}" class="btn btn-warning">Delete</a>
                                 </td>
                                 <td style="text-align: left;">
                                     <a href="/edit/{{ $client->user_id }}" class="btn btn-success">Edit</a>
                                 </td>

                                 @endforeach
                             </tr>
                         </tbody>
                     </table>

                 @else
                     <div class="col-md-6 text-center">
                         <p>No users!!!!</p>
                     </div>
                 @endif
          </div>
             <div class="col-md-6  text-center">
                 <div class="col-md-6 text-center">
                     <h1 style="margin-bottom: 25px;">Tasks</h1>
                 </div>
                 <div class="col-md-6  text-center" style="margin: 1px 0 10px 0; font-size: 20px;">
                     <a href="{{ route('addTask') }}">Add task</a>
                 </div>
                 @if($tasks->count() > 0)
                     <div class="col-md-6  text-center">
                         {{ $tasks->count() }} task(s)
                     </div>
                     <table class="table">
                         <thead>
                         <tr>
                             <th scope="col">#</th>
                             <th scope="col">Title</th>
                             <th scope="col">Description</th>
                             <th scope="col">Status</th>
                             <th scope="col">Delete</th>
                             <th scope="col">Edit</th>
                         </tr>
                         </thead>
                         <tbody>
                         @foreach($tasks as $task)
                             <tr>
                                 <th scope="row">{{ $loop->iteration }}</th>
                                 <td style="text-align: left;">
                                     <p>{{ $task->title }}</p>
                                 </td>
                                 <td style="text-align: left;">
                                     <p>{{ $task->description }}</p>
                                 </td>
                                 <td style="text-align: left;">
                                     @foreach ($task->status as $item)
                                         <b>{{ $item['key'] }}</b>: {{ $item['value'] }}<br />
                                     @endforeach
                                 </td>
                                 <td style="text-align: left;">
                                     <a href="/deleteTask/{{ $task->id }}" class="btn btn-warning">Delete</a>
                                 </td>
                                 <td style="text-align: left;">
                                     <a href="/editTask/{{ $task->id }}" class="btn btn-success">Edit</a>
                                 </td>
                                 @endforeach
                             </tr>
                         </tbody>
                     </table>

                 @else
                     <div class="col-md-6 text-center">
                         <p>No tasks!!!!</p>
                     </div>
                 @endif
             </div>
         </div>
      </div>
   </div>
   <!-- End section contacts -->

@endsection
