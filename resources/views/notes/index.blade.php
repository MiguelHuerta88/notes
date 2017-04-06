@extends('notes.master')

@section('title', 'Viewing All Notes')

@section('content')
    <div class="jumbotron">
        <h1>Viewing All Notes</h1>
    </div>

    <ol class="breadcrumb">
        <li class="active">All</li>
        <li><a href="{{route('notes.create')}}">Create</a></li>
    </ol>

    <table class="table">
        <tbody>
        <th>Title</th>
        <th>Note</th>
        <th>Delete</th>
        <th>Edit</th>
        <th>View</th>

        @foreach($notes as $note)
            <tr>
                <td>{{$note->title}}</td>
                <td>{{$note->note}}</td>
                <td>DELETE BUTTON</td>
                <td><a href="{{route('notes.edit', ['id' => $note->id])}}">Edit</a></td>
                <td><a href="{{route('notes.show', ['id' => $note->id])}}">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection