@extends('layouts.main')

@section('title', "THE task")


@section('content')
    <h2>Bienvenu dans la tâche {{$task->title}}</h2>
    <p>Description de la tâche : {{ $task->description }}</p>
    <p>Date de rendu de la tâche : {{ $task->due_date }}</p>
    <p>Board de la tâche : {{ $task->board->title }}</p>
@endsection