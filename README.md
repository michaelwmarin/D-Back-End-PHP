# Projeto do Curso de PHP: Primeiros Passos

Bem-vindo ao repositório dos projetos desenvolvidos durante o curso introdutório de PHP da Alura. Este espaço contém os códigos criados para praticar os conceitos fundamentais da linguagem, desde a sintaxe básica até a introdução à orientação a objetos.

##  sobre o projeto

Este repositório serve como um portfólio do aprendizado obtido, demonstrando a aplicação de diferentes recursos do PHP em dois pequenos projetos de console:

1.  **`screen-match.php`**: Um script procedural que exibe informações detalhadas sobre um filme.
2.  **`conta.php`**: Um sistema bancário interativo simples, construído com o paradigma de orientação a objetos.

## 💻 Projetos Incluídos

Abaixo estão os detalhes de cada script presente neste repositório.

### 1. Screen Match (`screen-match.php`)

Este é um script de linha de comando que exibe informações sobre o filme "O Poderoso Chefão". Ele foi desenvolvido para praticar a manipulação de dados estruturados e funções.

**Recursos Demonstrados:**
* Uso de um **array associativo** para armazenar todos os dados do filme de forma organizada.
* Criação de **funções** para isolar lógicas de negócio, como `calcularMediaNotas()` e `obterStatusLancamento()`.
* Manipulação de **argumentos da linha de comando** (`$argv`) para receber notas de usuários.
* Formatação de saídas no console, utilizando `echo` e a função `implode()` para exibir listas.

### 2. Conta Bancária (`conta.php`)

Este script simula um caixa eletrônico básico, permitindo que o usuário realize saques e depósitos em uma conta pré-definida. O projeto foi um desafio para aplicar conceitos de Programação Orientada a Objetos (POO).

**Recursos Demonstrados:**
* **Programação Orientada a Objetos**: O código é estruturado em torno de uma classe `Conta`.
* **Encapsulamento**: Propriedades como `$titular` e `$saldo` são privadas para proteger os dados.
* **Métodos**: A classe possui métodos para as operações de `sacar()` e `depositar()`, além de obter dados formatados.
* **Menu Interativo**: Utiliza um loop `do-while` e uma estrutura `switch` para criar um menu que interage com o usuário.
* **Leitura de Input do Usuário**: Captura dados digitados pelo usuário no terminal usando `fgets(STDIN)`.

## 🚀 Tecnologias e Conceitos Abordados

* **Linguagem**: PHP
* **Variáveis e Tipos de Dados**: `string`, `int`, `float`, `bool`, `array`.
* **Estruturas de Controle**: `if`, `switch`, `foreach`, `do-while`.
* **Funções**: Declaração, parâmetros e retorno de valores.
* **Arrays**: Manipulação de arrays numéricos e associativos.
* **Programação Orientada a Objetos**: Classes, propriedades, métodos e construtores.
* **Interação com o Terminal**: Leitura de argumentos (`$argv`) e de input do usuário (`STDIN`).

## Como Executar

Para ver os scripts em ação, clone este repositório e execute os seguintes comandos no seu terminal:

**1. Para o Screen Match:**
```bash
# O script pode receber notas como argumentos para calcular a média
php screen-match.php 8 9.5 10
