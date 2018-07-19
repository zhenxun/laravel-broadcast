@extends('layouts.app')

@section('content')

  

  <div class="card mx-5">
    <div class="card-body">

        @include('layouts.partials.components.alert')

        {{ Form::open(['url' => $route, 'method' => 'put', 'files' => true]) }}
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="avatar">Avatar:</label>
                <input id="avatar" type="file" class="form-control" name="avatar">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        {{ Form::close() }}
    </div>
  </div>

@endsection