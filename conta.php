<?php

/**
 * Classe que representa uma Conta Bancária.
 * Encapsula os dados (propriedades) e as operações (métodos) da conta.
 */
class Conta
{
    // Propriedades da classe
    private string $titular;
    private float $saldo;

    /**
     * Método construtor, executado ao criar um objeto Conta.
     * @param string $titular O nome do titular da conta.
     * @param float $saldoInicial O saldo inicial da conta.
     */
    public function __construct(string $titular, float $saldoInicial)
    {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    /**
     * Realiza um saque na conta.
     * @param float $valor O valor a ser sacado.
     */
    public function sacar(float $valor): void
    {
        if ($valor <= 0) {
            echo "ERRO: O valor para saque deve ser positivo.\n";
            return; // Encerra a execução do método
        }

        if ($valor > $this->saldo) {
            echo "ERRO: Saldo insuficiente para realizar o saque.\n";
            return; // Encerra a execução do método
        }
        
        $this->saldo -= $valor;
        echo "SUCESSO: Saque de " . $this->formatarValor($valor) . " realizado.\n";
    }

    /**
     * Realiza um depósito na conta.
     * @param float $valor O valor a ser depositado.
     */
    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            echo "ERRO: O valor para depósito deve ser positivo.\n";
            return; // Encerra a execução do método
        }

        $this->saldo += $valor;
        echo "SUCESSO: Depósito de " . $this->formatarValor($valor) . " realizado.\n";
    }

    /**
     * Retorna o nome do titular da conta.
     * @return string
     */
    public function getTitular(): string
    {
        return $this->titular;
    }

    /**
     * Retorna o saldo atual formatado como moeda.
     * @return string
     */
    public function getSaldoFormatado(): string
    {
        return $this->formatarValor($this->saldo);
    }
    
    /**
     * Método privado para formatar um número como moeda brasileira.
     * @param float $valor
     * @return string
     */
    private function formatarValor(float $valor): string
    {
        return "R$ " . number_format($valor, 2, ',', '.');
    }
}

// --- Funções Auxiliares de Interface ---

/**
 * Limpa a tela do console (funciona em Windows, Linux e macOS).
 */
function limparTela(): void
{
    // Verifica o sistema operacional para usar o comando correto
    PHP_OS_FAMILY === 'Windows' ? system('cls') : system('clear');
}

/**
 * Exibe o cabeçalho com as informações da conta.
 * @param Conta $conta O objeto da conta.
 */
function exibirCabecalho(Conta $conta): void
{
    limparTela();
    echo "*********************************\n";
    echo "** BANCO DIGITAL MMKING     **\n";
    echo "*********************************\n";
    echo "Titular: " . $conta->getTitular() . "\n";
    echo "Saldo Atual: " . $conta->getSaldoFormatado() . "\n";
    echo "---------------------------------\n\n";
}

/**
 * Exibe o menu de opções.
 */
function exibirMenu(): void
{
    echo "Escolha uma das opções abaixo:\n";
    echo "1 - Realizar um Saque\n";
    echo "2 - Realizar um Depósito\n";
    echo "3 - Sair do Sistema\n";
    echo "=> ";
}

// --- Lógica Principal do Programa ---

// 1. Cria a conta do cliente
$conta = new Conta('Michael Marin', 10.000,00);

// 2. Loop principal do sistema
do {
    exibirCabecalho($conta);
    exibirMenu();
    
    // Lê a entrada do usuário de forma segura
    $opcao = trim(fgets(STDIN));
    if (!is_numeric($opcao)) {
        $opcao = 0; // Força a ser uma opção inválida se não for número
    } else {
        $opcao = (int)$opcao;
    }

    limparTela(); // Limpa o menu para mostrar a próxima tela

    switch ($opcao) {
        case 1: // SACAR
            echo "--- Operação de Saque ---\n";
            echo "Saldo disponível: " . $conta->getSaldoFormatado() . "\n";
            echo "Digite o valor que deseja sacar: ";
            $valor = (float) fgets(STDIN);
            
            $conta->sacar($valor);
            break;

        case 2: // DEPOSITAR
            echo "--- Operação de Depósito ---\n";
            echo "Digite o valor que deseja depositar: ";
            $valor = (float) fgets(STDIN);
            
            $conta->depositar($valor);
            break;

        case 3: // SAIR
            echo "Obrigado por utilizar o Banco Digital PHP. Até logo!\n";
            exit; // Encerra o script

        default: // OPÇÃO INVÁLIDA
            echo "Opção inválida! Por favor, tente novamente.\n";
            break;
    }

    // Pausa para o usuário ler o resultado antes de limpar a tela novamente
    echo "\nPressione ENTER para continuar...";
    fgets(STDIN);

} while (true); // O loop é infinito, a saída é controlada pelo 'exit' no case 3