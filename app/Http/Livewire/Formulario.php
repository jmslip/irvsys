<?php

namespace App\Http\Livewire;

use App\Models\Membro;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Livewire\Component;

use function PHPSTORM_META\map;

class Formulario extends Component
{
    protected $listeners = [
        'ativar',
        'atualizaInfoCep' => 'pesquisaCepCorreios',
        'desbloqueiaCampos'
    ];

    protected $rules = [
        'nome' => 'required|string|max:60',
        'dtNascimento' => 'required'
    ];

    public $titulo;
    public $icon;
    public $theme;
    public $ativo;

    public $nome;
    public $email;
    public $dtNascimento;
    public $telefone;
    public $celular;

    public $cep;
    public $logradouro;
    public $numero;
    public $bairro;
    public $cidade;
    public $estado;


    public $ativaNumero;

    public $btnLiberaOuBloqueiaCampos = 'Digitar endereço';

    public function render()
    {
        return view('livewire.formulario');
    }

    public function mount() {
        $this->titulo = "IRVSys";
        $this->icon = 'fa-church';
        $this->theme = 'lightsuccess';
        $this->ativo = false;
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

    public function pesquisaCepCorreios() {
        if (!empty($this->cep) && strlen($this->cep) === 8) {
            $viaCep = 'https://viacep.com.br/ws/';
            $url = $viaCep . $this->cep . '/json/';

            $client = new Client();
            $response = $client->request("GET", $url);

            $responseBody = json_decode($response->getBody());
            
            if ($this->validaPropriedadesJsonCorreios($responseBody)) {
                $this->logradouro = $responseBody->logradouro;
                $this->bairro = $responseBody->bairro;
                $this->cidade = $responseBody->localidade;
                $this->estado = $responseBody->uf;
            } else {
                $this->logradouro = null;
                $this->bairro = null;
                $this->cidade = null;
                $this->estado = null;
            }
        }
    }

    private function validaPropriedadesJsonCorreios($responseBody) {
        foreach ($responseBody as $key => $value) {
            if ($key === "erro") {
                return false;
            }
        }

        return true;
    }

    public function limpar() {
        $this->reset([
            'cep',
            'logradouro',
            'numero',
            'bairro',
            'cidade',
            'estado',
            'nome',
            'email',
            'dtNascimento',
            'telefone',
            'celular'
        ]);
    }

    public function cancela() {
        $this->limpar();

        $params = [
            'ativo' => false
        ];

        $this->emitSelf('ativar', $params);
    }

    public function save() {
        $this->validate();

        $membro = new Membro();

        $membro->nome = $this->nome;
        $membro->dt_nascimento = $this->dtNascimento;
        $membro->telefone = $this->telefone;
        $membro->celular = $this->celular;
        $membro->email = $this->email;
        $membro->cep = $this->cep;
        $membro->endereco = $this->formataEndereco();

        $membro->save();

        $this->limpar();
        $this->dispatchBrowserEvent('salvo-sucesso');
    }

    private function formataEndereco() {
        if (!is_null($this->logradouro) && strlen($this->logradouro) >= 1) {
            return $this->logradouro .', '. $this->numero .' - '. $this->bairro .' - '. $this->cidade .'/'. $this->estado;
        }

        return null;
    }
}
