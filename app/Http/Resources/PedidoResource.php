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
            'idPedido' => intval($this->id),
            'email'=> $this->email,
            'status'=> $this->situacao, 
            'previsaoEntrega'=>$this->previsaoentrega,           
            'cliente' => [
                'id' => $this->cliente->id,
                'nome' => $this->cliente->nome,
                'cnpjcpf'=>$this->cliente->cnpjcpf
            ],
            'vendedor' => [
                'id' => $this->user->id,
                'nome' => $this->user->name
            ],
            'detalhamentoDeValores' => [
                'acrescimo' => $this->acrescimo,
                'desconto' => $this->desconto,
            ],
            'obsPedido' => $this->obspedido,
            'formasDePagamento' => Formadepagamento::collection($this->formadepagamento),
            'itens' => PedidoItemResource::collection($this->itens),
        ];
    }
}