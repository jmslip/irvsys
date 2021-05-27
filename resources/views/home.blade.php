@extends('layout.app')

@section('content')
    <div class="row">
        @livewire('card', ['titulo' => "membros", 'tipo' => 'members'])
    </div>
@endsection