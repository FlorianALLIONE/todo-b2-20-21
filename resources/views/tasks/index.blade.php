@extends('layouts.main')

@section('title', "User's tasks")


@section('content')
    <p>Ici on va afficher les tâches auxquels appartient l'utilisateur {{$user->name}}.</p>
    <div>Les tâches de l'utilisateur</div>
@endsection