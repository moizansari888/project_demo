@extends('layouts.admin')
@section('content')

    <h1>Create User</h1>

    {!! Form::open(['method'=>'POST','action'=>'AdminUserController@store','files'=>'true']) !!}

    <div class="form-group">
        {!! Form::label('name','Name :') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
        {{csrf_field()}}
    </div>
    <div class ="form-group">
            {!! Form::label('email','Email :') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
    <div class ="form-group">
        <label name="role_id">Role :</label>
           <select class="form-control" name="role_id">
               <option value="2">Select Option</option>
            @foreach($role as $ro)
            <option value="{{$ro->id}}">{{$ro->name}}</option>
                @endforeach
           </select>
    </div>
    <div class ="form-group">
            {!! Form::label('status','Status :') !!}
            {!! Form::select('status',array('active'=>'Active','inactive'=>'In-Active'),'inactive',['class'=>'form-control']) !!}
    </div>
    <div class ="form-group">
            {!! Form::label('photo_id','User Image :') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>
    <div class ="form-group">
        {!! Form::label('password','Password :') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}

    </div>

    @include('error.form_error')


    {!! Form::close() !!}



    @stop