@extends('notes.master')

@section('title', 'Create New Note')

@section('content')
    <div class="jumbotron">
        <h1>Create New Note</h1>
    </div>

    <ol class="breadcrumb">
        <li><a href="{{route('notes.index')}}">All</a></li>
        <li class="active">Create</li>
    </ol>

    {{-- section for any validation errors --}}
    @if(count($errors))
    <div class="alert alert-danger">
        <strong>Fix any validation errors before continuing</strong>
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
    @endif

    {{-- display form --}}
    <div class="col-lg-6">
        <form action="{{route('notes.store')}}" method="POST">
            {{csrf_field()}}

            {{-- user id that will be hidden --}}
            <input type="hidden" name="user_id" value="{{$userId}}" />
            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                <label for="title">Title:</label>
                <input class="form-control" type="input" name="title" maxlength="50" value="{{old('title')}}">

            </div>

            <div class="form-group {{$errors->has('note') ? 'has-error' : ''}}">
                <label for="title">Note:</label>
                <textarea class="form-control" name="note" cols="20" rows="10">{{old('note')}}</textarea>
            </div>

            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection