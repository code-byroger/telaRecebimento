function aplicarMascaraMoeda(e) {
    let value = e.target.value;
    value = value.replace(/\D/g, "");
    value = (Number(value) / 100).toFixed(2);
    value = value.replace(".", ",");
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    e.target.value = value;
}

const inputValor = document.getElementById("valorMensalidade");
const valorRecebido = document.getElementById("valorRecebido");

if (inputValor) {
    inputValor.addEventListener('input', aplicarMascaraMoeda);
}

if (valorRecebido) {
    valorRecebido.addEventListener('input', aplicarMascaraMoeda);
}

function soNumeros(operacao){
    let value = operacao.target.value;
    value = value.replace(/\D/g,""); // remove o que não for números
    operacao.target.value = value; // atualiza o valor no input
}

const idFinanceiro = document.getElementById('id_financeiro');
const mensalidade = document.getElementById('codigoMensalidade');

if(idFinanceiro){
    idFinanceiro.addEventListener('input', soNumeros);
}

if(mensalidade){
    mensalidade.addEventListener('input',soNumeros);
}