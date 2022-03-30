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
            'valor'=> sprintf('%.2f', $this->valor),
            'nome'=> $this->produto->nome,
            'qtde'=> sprintf('%.2f', $this->qtde),
            'acrescimo'=> sprintf('%.2f', $this->percacrescimo),
            'desconto'=> sprintf('%.2f', $this->percdesconto),
        ];
    }
}
