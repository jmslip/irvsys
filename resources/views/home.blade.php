@extends('layout.app')

@section('content')
    <div class="row">
        @livewire('card', ['titulo' => "membros", 'tipo' => 'members'])
    </div>
    <div class="row">
        @livewire('formulario', ['titulo' => "membros", 'ativo' => false])
    </div>
@endsection