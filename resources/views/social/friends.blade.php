@extends('template.master')

@section('content')

@foreach($users as $user)
<ul class="list-group">

    <li>
      <a href="{{route('chat', $user->id)}}">{{$user->user_name}}</a>
   </li>
 

</ul>
@endforeach


@endsection