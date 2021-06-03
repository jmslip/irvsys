<div class="col-12">
    @if ($ativo)
        <x-adminlte-datatable id="tabela-membros" :heads="$heads" :config="$config">
            @foreach($config['data'] as $row)
                <tr>
                    @foreach($row as $cell)
                        <td>{!! $cell !!}</td>
                    @endforeach
                </tr>
            @endforeach
        </x-adminlte-datatable>    
    @endif
</div>
