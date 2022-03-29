<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoTabelaResource extends JsonResource
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
            'campo1' => ($this->id),
            'campo2' => [
                'id' => $this->cliente->id,
                'nome' => $this->cliente->nome,
                'cnpjcpf'=>$this->cliente->cnpjcpf
            ],
            'campo3'=> date("d/m/Y", strtotime($this->previsaoentrega)),
            'campo4'=> $this->situacao,            
        ];
    }
}
