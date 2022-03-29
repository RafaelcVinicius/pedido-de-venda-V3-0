<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoItemResource extends JsonResource
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
            'id' => intval($this->produto->id),
            'valor'=> (float)$this->produto->valor,
            'nome'=> $this->produto->nome,
            'qtde'=> (float)$this->qtde,
            'percacrescimo'=> (float)$this->percacrescimo,
            'percdesconto'=>(float)$this->percdesconto,
        ];
    }
}
