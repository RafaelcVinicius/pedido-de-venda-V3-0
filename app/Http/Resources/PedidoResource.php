<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
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
            'email'=> $this->email,
            'situacao'=> $this->situacao, 
            'data'=>$this->previsaoentrega,           
            'cliente' => [
                'id' => $this->cliente->id,
                'nome' => $this->cliente->nome,
                'cnpjcpf'=>$this->cliente->cnpjcpf
            ],
            'vendedor' => [
                'id' => $this->user->id,
                'nome' => $this->user->name
            ],            
            'produtos' => PedidoItemResource::collection($this->itens)
        ];
    }
}
