@extends('layouts.admin')

@section('content')

    <div class="container">
    <table class="table table-hover">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>User</th>
              <th>Category_id</th>
              <th>Title</th>
              <th>Content</th>
              <th>Created_At</th>
              <th>Updated_At</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
          <tr>
              <td>{{$post->id}}</td>
              <td><img height="100" width="100" src="{{$post->photo ? $post->photo->name:'no post photo'}}"> </td>
              <td>{{$post->user->name}}</td>
              <td>{{$post->category ? $post->category->name : 'UnCategorized'}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->content}}</td>
              <td>{{$post->created_at}}</td>
              <td>{{$post->updated_at}}</td>

          </tr>
            @endforeach
            @endif
        </tbody>
      </table>
    </div>

    @stop