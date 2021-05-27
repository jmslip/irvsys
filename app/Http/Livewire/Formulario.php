<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Formulario extends Component
{
    protected $listeners = ['ativar'];

    public $titulo = "IRVSys";
    public $icon = 'fa-church';
    public $theme = 'lightsuccess';
    public $ativo = false;

    public function render()
    {
        return view('livewire.formulario');
    }

    public function ativar($params) {
        $this->ativo = $this->getValorParam($params, $this->ativo, 'ativo');
        $this->titulo = $this->getValorParam($params, $this->titulo, 'titulo');
        $this->icon = $this->getValorParam($params, $this->icon, 'icon');

        if (array_key_exists('tipo', $params)) {
            $this->theme = $params['tipo'] === 'members' ? 'lightblue' : $this->theme;
        }
    }

    public function getValorParam($params, $param, $chave) {
        if (array_key_exists($chave, $params)) {
            return is_null($params[$chave]) ? $param : $params[$chave];
        }

        return $param;
    }
}
