<div class="col-12">
    @if ($ativo)
    <x-adminlte-card title="{{Str::upper($titulo)}}" theme="{{$theme}}" theme-mode="outline" icon="fas fa-lg {{$icon}}">
        <form wire:submit.prevent="save">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                    <label for="nome">Nome</label>
                    <x-adminlte-input name="nome" wire:model="nome" required />
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 form-group">
                    <label for="email">E-mail</label>
                    <x-adminlte-input type="email" name="email" wire:model="email" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4 form-group">
                    <label for="dt-nascimento">Dt. Nascimento</label>
                    <x-adminlte-input type="date" name="dt-nascimento" wire:model="dtNascimento" required />
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 form-group">
                    <label for="telefone">Telefone</label>
                    <x-adminlte-input name="telefone" wire:model="telefone" placeholder="(99) 3333-3333" />
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 form-group">
                    <label for="celular">Celular</label>
                    <x-adminlte-input name="celular" wire:model="celular" placeholder="(99) 99999-9999" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <x-adminlte-input name="cep" placeholder="CEP" id="cep" wire:model="cep" />
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <x-adminlte-button wire:click="$emitSelf('atualizaInfoCep')" theme="success" label="Pesquisar" id="pesquisar" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-5 form-group"><x-adminlte-input id="rua" name="rua" placeholder="Rua" wire:model="logradouro" /></div>
                <div class="col-2 form-group"><x-adminlte-input type="number" id="numero" name="numero" placeholder="Número" wire:model="numero" /></div>
                <div class="col-sm-12 col-md-5 col-lg-5 form-group"><x-adminlte-input id="bairro" name="bairro" placeholder="Bairro" wire:model="bairro" /></div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-5 form-group"><x-adminlte-input id="cidade" name="cidade" placeholder="Cidade" wire:model="cidade" /></div>
                <div class="col-sm-12 col-md-3 col-lg-3 form-group"><x-adminlte-input id="estado" name="estado" placeholder="Estado" wire:model="estado" /></div>
            </div>
            
            <div class="row">
                <div class="form-group col-sm-6 col-md-6 col-lg-6">
                    <x-adminlte-button wire:click="save" theme="success" label="Salvar" id="salvar" />
                    <x-adminlte-button wire:click="cancela" theme="danger" label="Cancelar" id="cancelar"/>
                    <x-adminlte-button wire:click="limpar" theme="warning" label="Limpar" id="limpar"/>
                </div>
            </div>
        </form>
    </x-adminlte-card>      
    @endif
</div>

@section('js')
    <script>
        document.addEventListener('salvo-sucesso', (event) => {
            
        });    
    </script>    
@endsection
