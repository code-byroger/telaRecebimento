<?php
    require_once __DIR__ . '/dadosUsuario.php';

    class Banco{

        private function criaBanco(){
            $pastaDestino = 'C:/sistemDados';
            $arquivo = $pastaDestino . '/recebimentos.txt';

            if(!is_dir($pastaDestino)){
                mkdir($pastaDestino, 0777, true);
            }
            return $arquivo;
        }  

        private function recebendoDados(){
            if($_SERVER['REQUEST_METHOD'] ==='POST'){
                $dados = new User(
                    $_POST['nome_operador'] ??'',
                    $_POST['id_financeiro'] ??'',
                    $_POST['nome_cliente'] ??'',
                    $_POST['dataTime'] ??'',
                    $_POST['codigo_mensalidade'] ??'',
                    $_POST['forma_pagamento'] ??'',
                    $_POST['valor_mensalidade'] ??'',
                    $_POST['valor_recebido'] ?? '',
                );

                return $dados;

            }else{
                echo "METHOD INVALID";
                return null;
            }    
            
        }

        public function inserir(){
            $caminhoAbsoluto = $this->criaBanco();

            $arquivo = fopen($caminhoAbsoluto, "a+") or die("Arquivo não localizado");

            $lista = $this->recebendoDados();
            if($lista){
                $dataOriginal = $lista->getDataHora();
                $dataFormatada = $dataOriginal; // caso venha vazio

                if (!empty($dataOriginal)) {
                    $dateTime = DateTime::createFromFormat('Y-m-d\TH:i', $dataOriginal);
                    if ($dateTime) {
                        $dataFormatada = $dateTime->format('d-m-Y H:i');
                    }
                }




                $linha = $lista->getOperador(). "|".
                $lista->getIdFinanceiro(). "|".$lista->getNomeCliente()."|".
                $dataFormatada. "|".$lista->getCodMensalidade()."|".
                $lista->getFormaPagamento(). "|".$lista->getValorMensalidade()."|".
                $lista->getValorPago().PHP_EOL;


            }
            fwrite($arquivo, $linha);
            fclose($arquivo);
        }

        public function ler(){
            $caminhoAbsoluto = $this->criaBanco();
            
            if(!file_exists($caminhoAbsoluto)){
                return "";
            }
            $arquivo = fopen($caminhoAbsoluto, "r") or die("Arquivo não localizado");
            $htmlTbory = "";

            while(!feof($arquivo)){
                $linha =  fgets($arquivo);
                if(trim($linha) ===""){
                    continue;
                }

                $dados = explode('|', $linha);
                $htmlTbory .= "<tr>";
                $htmlTbory .="<td>". htmlspecialchars($dados[0] ?? '') . "</td>";
                $htmlTbory .="<td>". htmlspecialchars($dados[1] ?? '') . "</td>";
                $htmlTbory .="<td>". htmlspecialchars($dados[2] ?? '') . "</td>";
                $htmlTbory .="<td>". htmlspecialchars($dados[3] ?? '') . "</td>";
                $htmlTbory .="<td>". htmlspecialchars($dados[4] ?? '') . "</td>";
                $htmlTbory .="<td>". htmlspecialchars($dados[5] ?? '') . "</td>";
                $htmlTbory .="<td>". htmlspecialchars($dados[6] ?? '') . "</td>";
                $htmlTbory .="<td>". htmlspecialchars($dados[7] ?? '') . "</td>";
                $htmlTbory .= "</tr>";
            }
            fclose($arquivo);

            return $htmlTbory;
        }
    }

   

?>