@extends('layout.app')

@section('content')
    <div class="row">
        @livewire('card', ['titulo' => "membros", 'tipo' => 'members'])
    </div>
    <div class="row">
        @if("renderFormMembros")
            @livewire('formulario', ['titulo' => "membros"])
        @endif
    </div>
    <div class="row">
        @if("renderTableMembros")
            @livewire('datatable-usuario', ['titulo' => "membros"])
        @endif
    </div>
@endsection