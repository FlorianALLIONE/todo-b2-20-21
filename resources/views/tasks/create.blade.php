@extends('layouts.main')

@section('title', "Add a task for an board")


@section('content')
    <h2>Ajouter une tâche</h2>
    <form action="/tasks" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" name='title' id ='title' class="@error('title') is-invalid @enderror" required><br>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="description">Description</label>
        <input type="text" name='description' id ='description' class="@error('description') is-invalid @enderror"><br>
        <label for="due_date">Date de rendu</label>
        <input type="date" name='due_date' id ='due_date' class="@error('due_date') is-invalid @enderror"><br>
        <label for="board_id">Choisir une Board</label>
        <select name="board_id" id="board_id" class="@error('board_id') is-invalid @enderror" required>
            @foreach ($user->boards as $board)
            <option value="{{ $board->id }}">{{ $board->title }}</option>
            @endforeach
        </select>
        <button type="submit">Save</button>
    </form>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection