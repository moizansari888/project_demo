@extends('layouts.admin')

@section('content')

    <div class="row">
       {!! Form::open(['method'=>'POST','action'=>'AdminPostController@store','files'=>'true']) !!}

           <div class="form-group">
               {!! Form::label('title','Title :') !!}
               {!! Form::text('title',null,['class'=>'form-control','files'=>'true']) !!}
           </div>
       <div class ="form-group">
               {!! Form::label('category_id','Category :') !!}
               {!! Form::select('category_id',array('0'=>'options'),null,['class'=>'form-control']) !!}
       </div>
       <div class ="form-group">
               {!! Form::label('photo_id','Post Photo :') !!}
               {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
       </div>
       <div class ="form-group">
               {!! Form::label('content','Description :') !!}
               {!! Form::textarea('content',null,['class'=>'form-control']) !!}
       </div>
           <div class="form-group">
               {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
           </div>

           {!! Form::close() !!}
    </div>
    <div class="row">
        @include('error.form_error')
    </div>

@stop