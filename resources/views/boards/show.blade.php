@extends('layouts.main')

@section('title', "THE board")


@section('content')
    <h2>Bienvenu dans le board {{$board->title}}</h2>
    <p>Utilisateur(s) assigné(s) au Board :</p>
    @foreach ($board->users as $user)
        <p>{{ $user->name }}</p>
    @endforeach
    <p>Tâches du Board :</p>
    @foreach ($board->tasks as $task)
        <p>{{ $task->title }}
            <a href="{{route('tasks.show', $task)}}">Voir</a>
            <a href="{{route('tasks.edit', $task)}}">Edit</a>
        </p>
    @endforeach
@endsection