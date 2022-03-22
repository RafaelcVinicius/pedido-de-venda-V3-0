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
            'id_item' => intval($this->id),
            'id' => intval($this->id_produto),
            'valor'=> (float)$this->produto->precovenda,
            'nome'=> $this->produto->nome,
            'qtde'=> (float)$this->qtde,
            'codbarras'=> (float)$this->produto->codbarras,
            'acrescimo'=>(float)$this->percacrescimo,
            'desconto'=> (float)$this->percdesconto,
        ];
    }
}
