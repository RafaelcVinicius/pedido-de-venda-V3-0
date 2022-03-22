<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

        'id' => intval($this->id),
        'nome'=> $this->nome,
        'cnpjcpf'=> $this->cnpjcpf,
        'telefone'=> $this->telefone,
        'endereco'=>[
            'id' => $this->endereco->id,
            'id_cliente' => $this->endereco->id_cliente,
            'cep' => $this->endereco->cep,
            'uf' => $this->endereco->uf,
            'municipio' => $this->endereco->municipio,
            'numero' => $this->endereco->numero,
            'bairro' => $this->endereco->bairro,
            'complemento' => $this->endereco->complemento,
            'endereco' => $this->endereco->endereco,
            ],
        ];
   }
}
