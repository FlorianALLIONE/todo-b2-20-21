@extends('layouts.main')

@section('title', "Add a user for an board")


@section('content')
    <h2>Ajouter un participant à un Board</h2>
    <form action="/boards" method="POST">
        @csrf
        <label for="board_id">Choisir une Board</label>
        <select name="board_id" id="board_id" class="@error('board_id') is-invalid @enderror" required>
        @foreach ($user->boards as $board)
            <option value="{{ $board->id }}">{{ $board->title }}</option>
        @endforeach
        </select><br>
        <label for="user_id">Choisir un/des Participants</label>
        <select name="user_id" id="user_id" class="@error('user_id') is-invalid @enderror" required>
        @foreach ($board->users as $user)
            <option value="{{ $user->id }}">{{ $user->name }} : {{ $user->email }}</option>
        @endforeach
        </select><br>
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