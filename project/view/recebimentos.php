<?php
    require_once __DIR__ . '/../model/crud.php';

    // Se o formulário foi enviado, executa a inserção
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $banco = new Banco();
        $banco->inserir();
        
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Recebimentos</title>
        <link rel="stylesheet" href="style.css">
        <script src="JS.js" defer></script>

    </head>
    <body>
            <!--Cabeçalho-->
        <div name="cabecalho" class="Cabecalho">
            <h1>Recebimentos de Mensalidades</h1>
            <div class="espacador"></div>
            <div class="retangulo"></div>
            
            <div id="dataHora">
                data e hora aqui
            </div>
        </div>
                    <!--Formulário-->
        <div name="lacamento" class="Lancamento">
            <h1 id="titulo">Lançamento</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="bloco-operadores campo-grupo">
                    <p id="operadores" >Operadores</p>
                    <select id="nomes_operadores" name="nome_operador">
                        <option value="VZ"></option>
                        <option value="Rogerio Santos">Rogerio Santos</option>
                        <option value="Aline Inacia">Aline Inácia</option>
                        <option value="Lisiane Fatima">Lisiane Fatima</option>
                    </select>
                </div>
                <div class="campo-grupo">
                    <label  for="id_financeiro">ID Financeiro</label>
                    <input id="id_financeiro" type="text" name="id_financeiro" placeholder="ID">
                </div>
                
                <div class="campo-grupo">
                    <label  for="nomeCliente">Nome</label>
                    <input id="nomeCliente" type="text" name="nome_cliente" placeholder="Nome do Cliente">
                </div>

                <div class="campo-grupo">
                    <label  for="dataRecebimento">Data e Hora</label>
                    <input id="dataRecebimento" type="datetime-local" name="dataTime">

                </div>
                <div class="campo-grupo">
                    <label  for="codigoMensalidade">Mensalidade</label>
                    <input id="codigoMensalidade" type="text" name="codigo_mensalidade" placeholder="Código da mensalidade">
                </div>

                <div class="campo-grupo">
                    <label for="formaPagamento">Forma de pagamento</label>
                    <select id="formaPagamento" name="forma_pagamento">
                        <option></option>
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="Cartão de Débito">Cartão de Débito</option>
                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                        <option value="Pix">PIX</option>
                    </select>     
                </div>
               
                <div class="campo-grupo">
                    <label for="valorMensalidade">Valor Mensalidade</label>
                    <input id="valorMensalidade" type="text" name="valor_mensalidade" placeholder="R$ 0,00">
                </div>
                <div class="campo-grupo">
                    <label for="valorRecebido">Valor Recebido</label>
                    <input id="valorRecebido" type="text" name="valor_recebido" placeholder="R$ 0,00">
                </div>
                <button id="buttonSave" type="submit">
                    <p>Salvar</p>
                </button>
            </form>
        </div>
                <!--Tabela-->
        <div name="lancamento" class="Lancamento">
            <table>
                <caption>Relatorio Recebimentos</caption>
                <thead>
                    <tr>
                        <th>Operador</th>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Data e Hora</th>
                        <th>Código Mensalidade</th>
                        <th>Forma de Pagamento</th>
                        <th>Valor Mensalidade</th>
                        <th>Valor Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once __DIR__ . '/../model/crud.php';

                        $dados = new Banco();
                        echo $dados->ler();
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>