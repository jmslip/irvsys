<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box {{$background}}">
      <div class="inner">
        <h3>{{$quantidade}}</h3>

        <p>{{Str::upper($titulo)}}</p>
      </div>
      <div class="icon">
        <i class="fas {{$icon}}"></i>
      </div>
      <div class="row">
        <div class="col-6 small-box-footer">
          <button class="btn btn-lg" wire:click="tabela">Visualizar <i class="fas {{$icon}}"></i></button>

        </div>
        <div class="col-6 small-box-footer">
          <button class="btn btn-lg" wire:click="formulario">Novo <i class="fas fa-plus-circle"></i></button>

        </div>
      </div>
    </div>
</div>