<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $titulo = "IRV Sys";
    public $quantidade = 0;
    public $tipo = null;
    public $icon = 'fa-church';
    public $background = 'bg-success';

    public function render()
    {
        $this->setTipoCard();
        return view('livewire.card');
    }

    public function setTipoCard() {
        if (!is_null($this->tipo) && $this->tipo === 'members') {
            $this->quantidade = 15;
            $this->icon = 'fa-users';
            $this->background = 'bg-info';
        }
    }
}
