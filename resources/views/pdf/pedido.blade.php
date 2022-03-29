<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }
        .header-um{
            font-size: 14px;
        }
         li{
             list-style: none;
             /* float: right; */
        }
        p{
            margin-right: 50px;
            margin-left: 50px;
            text-align: center;
        }
        header div{
            border-top: 1px solid rgba(0, 0, 0, 0.23); 
        }
        table{
            font-size: 15px;
            position: relative;
            width: 700px;
        }
        table thead{
            position: absolute;
            left: 0;
            right: 0;
        }
        table tbody{
            position: absolute;
            left: 0;
            right: 0;
        }
        .dados-pedido{
            width: 1000px;
        }
        
        .dados-produtos{
            border-top: 1px solid rgba(0, 0, 0, 0.23); 
            border-bottom: 1px solid rgba(0, 0, 0, 0.23); 
            margin-top: 50px ;
            text-align: center       
        }
        .dados-produtos thead tr{
          
        }
        .obs{
            margin-top: 150px;
            width: 700px;
            height: 50px;
            border-top: 1px solid rgba(0, 0, 0, 0.23); 
            border-bottom: 1px solid rgba(0, 0, 0, 0.23); 
            font-weight:700; 
        }
        .obs p{
            float: left;
        }
        .footer{
            margin-top:30px;
            font-size: 18px
        }
        .footer table tr{
            margin-top: 20px;
            text-align:justify
        }
    </style>
    <title>Document</title>
</head>
<body>    
    <header>
        <div >
            <ul class="header-um" >
                <li ><strong>Identificação do emitente</strong></li>
                <li > {{$dados->user->name}}</li> 
                <li >CNPJ/CPF: 119.771.739-00</li>
            </ul>
        </div>
        <div>
            <p><strong> DOCUMENTO AUXILIAR DE VENDA - PEDIDO DE VENDA NÃO É DOCUMENTO
                FISCAL - NÃO É VÁLIDO COMO RECIBO E COMO GARANTIA DE
                MERCADORIA - NÃO COMPROVA PAGAMENTO. </strong></p>
        </div>
        <div>
            <table>
                <thead>
                    <th>Identificação do destinatário</th>
                </thead>
                <tbody>
                    <tr>
                        <td> Cliente: {{$dados->cliente->nome}}</td>
                        <td> Endereço:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> CNPJ/CPF: {{$dados->cliente->cnpjcpf}}</td>
                        <td> Complemento:</td>
                        <td>Nº:</td>
                    </tr>
                    <tr>
                        <td> Telefone: {{$dados->cliente->telefone}}</td>
                        <td> Bairo:</td>
                        <td>CEP: {{$dados->cliente->CEP}}</td>
                    </tr>
                    <tr>
                        <td> Celular: {{$dados->cliente->telefone}}</td>
                        <td> Cidade:</td>
                        <td>UF:</td>
                    </tr>
                    <tr>
                        <td> E-mail: {{$dados->email === null ? '' : $dados->email }}</td>
                        <td> </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </header>
    <hr>
    <section>
        <table class="dados-pedido">
            <thead>

            </thead>
            <tbody>
                <tr>
                    <td> Nº Pedido: <strong>{{$dados->id}}</strong></td>
                    <td> Status: <strong>{{$dados->situacao}}</strong> </td>
                </tr>
                <tr>
                    <td> Vendedor: {{$dados->user->name}}</td>
                    <td> Emissão: {{$dados->created_at}}</td>
                </tr>
                <tr>
                    <td> Tipo de entrega: {{$dados->cliente->telefone}}</td>
                    <td> Previsão de entrega: {{$dados->previsaoentrega}}</td>
                </tr>
            </tbody>
        </table>         

        <table class="dados-produtos">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descrição do item</th>
                    <th>Qtde</th>
                    <th>R$ unit.</th>
                    <th>R$ total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados->itens as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td> {{$item->produto->nome}}</td>
                    <td> {{$item->qtde}}</td>
                    <td> {{$item->valor}}</td>
                    <td> {{$item->valor * $item->qtde}}</td>
                </tr>
                @endforeach                            
            </tbody>
        </table>
        <div class="obs">
            <p>Observações:</p>
        </div>
        <div class="footer">
            <table>  
                <tr>                                  
                    <td>Valor dos produtos...........................................................................R$</td>
                    <td>{{$dados->TotalProdutos->valorTotal}}</td>
                </tr>    
                <tr>
                    <td>Valor acréscimo...............................................................................R$</td>
                    <td>{{$dados->TotalAcrescimo->valorTotal}}</td>
                </tr>    
                <tr>
                    <td>Valor desconto.................................................................................R$</td>
                    <td>{{$dados->TotalDesconto->valorTotal}}</td>
                </tr>      
                <tr>
                    <td>Valor líquido.....................................................................................R$</td>
                    <td>{{$dados->totalpedido->valorTotal}}</td>
                </tr>    
            </table>
        </div>
    </section>
</body>
</html>