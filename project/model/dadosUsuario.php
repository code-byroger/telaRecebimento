<?php
    class User{
        private $operador;
        private $idFinan;
        private $nomeCliente;
        private $dataHora;
        private $codMensalidade;
        private $formaPagamento;
        private $valorMensalidade;
        private $valorPago;


        public function __construct(
            $operador, $idFinan, $nomeCliente, $dataHora, $codMensalidade, $formaPagamento,
            $valorMensalidade, $valorPago
        ){
            $this->operador = $operador;
            $this->idFinan = $idFinan;
            $this->nomeCliente = $nomeCliente;
            $this->dataHora = $dataHora;
            $this->codMensalidade = $codMensalidade;
            $this->formaPagamento = $formaPagamento;
            $this->valorMensalidade = $valorMensalidade;
            $this->valorPago = $valorPago;

        }



        public function setOperador($operador){
            $this->operador = $operador;
        }
        public function getOperador(){
            return $this->operador;
        }

        public function setIdFinanceiro($idFinan){
            $this->idFinan = $idFinan;
        }
        public function getIdFinanceiro(){
            return $this->idFinan;
        }

        public function setNomeCliente($nomeCliente){
            $this->nomeCliente = $nomeCliente;
        }
        public function getNomeCliente(){
            return $this->nomeCliente;
        }

        public function setDataHora($dataHora){
            $this->dataHora = $dataHora;
        }
        public function getDataHora(){
            return $this->dataHora;
        }

        public function setCodMensalidade($codMensalidade){
            $this->codMensalidade = $codMensalidade;
        }
        public function getCodMensalidade(){
            return $this->codMensalidade;
        }

        public function setformaPagamento($formaPagamento){
            $this->formaPagamento = $formaPagamento;
        }
        public function getFormaPagamento(){
            return $this->formaPagamento;
        }

        public function setValorMensalidade($valorMensalidade){
            $this->valorMensalidade = $valorMensalidade;
        }
        public function getValorMensalidade(){
            return $this->valorMensalidade;
        }

        public function setValorPago($valorPago){
            $this->valorPago = $valorPago;
        }
        public function getValorPago(){
            return $this->valorPago;
        }
        
    }
?>