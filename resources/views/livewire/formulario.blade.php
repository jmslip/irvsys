@section('plugins.TempusDominusBs4', true)

<div class="col-12">
    @if ($ativo)
    <x-adminlte-card title="{{Str::upper($titulo)}}" theme="{{$theme}}" theme-mode="outline" icon="fas fa-lg {{$icon}}"
        removable>
        <x-adminlte-input name="nome" placeholder="Nome" required />
        <x-adminlte-input type="date" name="dt-nascimento" required />
        <x-adminlte-input type="email" name="email" placeholder="exemplo@exemplo.com" />
        <x-adminlte-input name="telefone" placeholder="(99) 3333-3333" />
        <x-adminlte-input name="celular" placeholder="(99) 99999-9999" />
        <x-adminlte-input name="rua" placeholder="End" />
        <x-adminlte-button class="d-flex ml-auto" theme="light" label="Novo" icon="fas fa-sign-in"/>
    </x-adminlte-card>      
    @endif
</div>
