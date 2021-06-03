<?php

namespace App\Http\Livewire;

use App\Models\Membro;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DatatableUsuario extends Component
{

    public $titulo;
    public $icon;
    public $theme;
    public $ativo;

    /**
     * Configurações da tabela
     */
    public $heads = [
        'ID',
        'Nome',
        'Dt. Nascimento',
        ['label' => 'Ações', 'no-export' => true, 'width' => 5],
    ];
    public $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>';
    public $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>';
    public $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>';

    public $config;

    protected $listeners = [
        'ativa-tabela' => 'ativar'
    ];

    public function render()
    {
        return view('livewire.datatable-usuario');
    }

    public function mount() {
        $this->titulo = "IRVSys";
        $this->icon = 'fa-church';
        $this->theme = 'lightsuccess';
        $this->ativo = false;

        $this->config = [
            'data' => $this->getDadosTabela(),
            'columns' => [null, null, null, null],
            'searching' => true
        ];;
    }

    public function ativar($params) {
        $this->ativo = $this->getValorParam($params, $this->ativo, 'ativo');
        $this->titulo = $this->getValorParam($params, $this->titulo, 'titulo');
        $this->icon = $this->getValorParam($params, $this->icon, 'icon');

        if (array_key_exists('tipo', $params)) {
            $this->theme = $params['tipo'] === 'members' ? 'lightblue' : $this->theme;
        }
    }

    private function getValorParam($params, $param, $chave) {
        if (array_key_exists($chave, $params)) {
            return is_null($params[$chave]) ? $param : $params[$chave];
        }

        return $param;
    }

    private function getDadosTabela() {
        $arrayMembros = array();

        $membros = $this->getMembros();

        foreach ($membros as $membro) {
            $arrayAux = array();

            array_push($arrayAux, $membro->id);
            array_push($arrayAux, $membro->nome);
            array_push($arrayAux, $membro->dt_nascimento);
            array_push($arrayAux, '<nobr>'.$this->btnEdit.$this->btnDelete.$this->btnDetails.'</nobr>');
            
            array_push($arrayMembros, $arrayAux);
        }
        
        return $arrayMembros;
    }

    private function getMembros() {
        return DB::select('select id, nome, DATE_FORMAT(dt_nascimento, "%d/%m/%Y") as dt_nascimento, endereco, cep, telefone, celular from membros');
    }
}
