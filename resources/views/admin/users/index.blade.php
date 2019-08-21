@extends('layouts.admin')
@section('content')

    <h1>User</h1>
    <div class="container">
    <table class="table table-hover">
        <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>User Role</th>
              <th>Email</th>
              <th>Status</th>
              <th>Created_At</th>
              <th>Updated_At</th>
          </tr>
        </thead>
        <tbody>
        @if($users)

            @foreach($users as $user)
          <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->role->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->status}}</td>
              <td>{{$user->created_at}}</td>
              <td>{{$user->updated_at}}</td>
          </tr>
          @endforeach

        @endif
        </tbody>
      </table>
    </div>
    @stop