# 💰 Recebimentos de Mensalidades

Sistema web simples para **lançamento e consulta de recebimentos de mensalidades**, desenvolvido em **PHP, HTML, CSS e JavaScript** puros. Os dados são gravados em um arquivo de texto (`.txt`), sem necessidade de banco de dados.

## 📋 Funcionalidades

- Cadastro de recebimentos por meio de formulário
- Seleção do operador responsável pelo lançamento
- Campos: ID financeiro, nome do cliente, data e hora, código da mensalidade, forma de pagamento, valor da mensalidade e valor recebido
- Máscara de moeda (`R$ 0,00`) nos campos de valor
- Campos de ID e código da mensalidade aceitam apenas números
- Relatório em tabela com todos os recebimentos já lançados
- Relógio/data no cabeçalho (elemento `#dataHora`)
- Proteção contra XSS na listagem (`htmlspecialchars`)
- Padrão *Post/Redirect/Get* para evitar reenvio do formulário ao atualizar a página

## 🛠️ Tecnologias

| Camada | Tecnologia |
|--------|------------|
| Back-end | PHP (orientado a objetos) |
| Front-end | HTML5, CSS3, JavaScript (Vanilla) |
| Armazenamento | Arquivo de texto (`recebimentos.txt`) |

## 📁 Estrutura do projeto

```
projeto/
├── model/
│   ├── crud.php            # Classe Banco: inserir() e ler()
│   └── dadosUsuario.php    # Classe User: modelo de dados (getters/setters)
└── view/
    ├── recebimentos.php    # Página principal (formulário + tabela)
    ├── style.css           # Estilos
    └── JS.js               # Máscaras de moeda e validação numérica
```

> ⚠️ O `recebimentos.php` importa o `crud.php` com `require_once __DIR__ . '/../model/crud.php'`, então mantenha as pastas nessa organização (ou ajuste o caminho).

## 🚀 Como executar

### Pré-requisitos

- PHP 7.4 ou superior
- Um servidor local (XAMPP, WAMP, Laragon) **ou** o servidor embutido do PHP

### Passo a passo

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. Inicie o servidor embutido do PHP apontando para a pasta `view`:
   ```bash
   php -S localhost:8000 -t view
   ```

3. Acesse no navegador:
   ```
   http://localhost:8000/recebimentos.php
   ```

Se preferir usar XAMPP/WAMP, copie o projeto para a pasta `htdocs`/`www` e acesse `http://localhost/seu-projeto/view/recebimentos.php`.

## 💾 Onde os dados ficam salvos

Os lançamentos são gravados em:

```
C:/sistemDados/recebimentos.txt
```

A pasta e o arquivo são criados automaticamente no primeiro lançamento. Cada linha representa um recebimento, com os campos separados por `|`:

```
Operador|ID Financeiro|Cliente|Data e Hora|Código Mensalidade|Forma de Pagamento|Valor Mensalidade|Valor Pago
```

Exemplo:

```
Rogerio Santos|1023|João da Silva|23-10-2026 14:30|4587|Pix|150,00|150,00
```

> 💡 O caminho é do Windows. Em Linux/macOS, altere a variável `$pastaDestino` no método `criaBanco()` em `model/crud.php` (por exemplo, para `__DIR__ . '/../data'`).

## 🧩 Arquitetura

- **`User`** (`dadosUsuario.php`): classe-modelo que representa um recebimento.
- **`Banco`** (`crud.php`):
  - `inserir()` — lê os dados do `$_POST`, formata a data para `dd-mm-aaaa hh:mm` e adiciona uma linha ao arquivo.
  - `ler()` — lê o arquivo e devolve as linhas HTML (`<tr>`) para a tabela.
- **`recebimentos.php`**: view que exibe o formulário e a tabela e processa o `POST`.
- **`JS.js`**: aplica a máscara de moeda e restringe campos a números.

## 🔮 Melhorias futuras

- [ ] Validação dos campos no servidor (campos obrigatórios, formato de valores)
- [ ] Tratar o caso em que os dados do formulário são inválidos antes de gravar
- [ ] Migrar o armazenamento para banco de dados (MySQL/SQLite)
- [ ] Caminho do arquivo configurável (compatível com Linux/macOS)
- [ ] Edição e exclusão de lançamentos (CRUD completo)
- [ ] Preencher o relógio do cabeçalho via JavaScript
- [ ] Filtros e busca na tabela, totais por forma de pagamento
- [ ] Exportação do relatório (CSV/PDF)
- [ ] Layout responsivo para telas pequenas
- [ ] Autenticação de operadores

## 🤝 Contribuindo

1. Faça um fork do projeto
2. Crie uma branch: `git checkout -b minha-feature`
3. Commit suas alterações: `git commit -m "Adiciona minha feature"`
4. Envie para a branch: `git push origin minha-feature`
5. Abra um Pull Request


---

Feito por Rogério Santos
