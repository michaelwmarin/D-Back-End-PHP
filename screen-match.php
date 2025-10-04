<?php

// --- 1. ESTRUTURA DE DADOS CENTRALIZADA ---
// Todas as informações do filme foram agrupadas em um único array.
// Isso torna o código mais organizado e fácil de manter.
$filme = [
    'nome' => 'O Poderoso Chefão',
    'anoLancamento' => 1972,
    'diretor' => 'Francis Ford Coppola',
    'generos' => ['Crime', 'Drama'],
    'sinopse' => "O Poderoso Chefão é um filme que narra a história da família mafiosa Corleone, liderada por Vito Corleone.\nO filme explora temas como poder, lealdade e traição, enquanto acompanha a ascensão de Michael Corleone ao comando da família.",
    'elenco' => ['Marlon Brando', 'Al Pacino', 'James Caan', 'Diane Keaton'],
    'duracaoEmMinutos' => 175,
    'avaliacaoIMDb' => 9.2,
    'disponivel' => true,
    'preco' => 14.99,
    'idiomas' => ['Inglês', 'Italiano', 'Espanhol'],
    'legendas' => ['Português', 'Inglês', 'Espanhol'],
    'classificacaoIndicativa' => 'R',
    'premios' => ['Oscar de Melhor Filme', 'Oscar de Melhor Ator (Marlon Brando)', 'Oscar de Melhor Roteiro Adaptado'],
    'curiosidades' => [
        'Marlon Brando usou uma prótese no nariz para interpretar Vito Corleone.',
        'O filme é baseado no livro de mesmo nome escrito por Mario Puzo.',
        'A famosa cena do casamento foi filmada em uma única tomada.'
    ],
    'trailerUrl' => 'https://www.youtube.com/watch?v=sY1S34973zA',
    'imagemCapa' => 'https://example.com/imagem-capa-o-poderoso-chefao.jpg'
];

$planoPrime = true;

// --- 2. LÓGICA DE NEGÓCIO EM FUNÇÕES ---
// Funções isolam responsabilidades, tornando o código mais legível e reutilizável.

/**
 * Calcula a média das notas fornecidas como argumentos na linha de comando.
 * @param array $args Argumentos da linha de comando ($argv).
 * @return string Média formatada ou mensagem de erro.
 */
function calcularMediaNotas(array $args): string
{
    // Remove o nome do script do array de argumentos.
    $notas = array_slice($args, 1);

    if (empty($notas)) {
        return "Nenhuma nota fornecida";
    }

    // Garante que todos os argumentos são numéricos.
    foreach ($notas as $nota) {
        if (!is_numeric($nota)) {
            return "Erro: Todas as notas devem ser números.";
        }
    }

    $somaDeNotas = array_sum($notas);
    $media = $somaDeNotas / count($notas);

    return number_format($media, 1, '.'); // Formata para uma casa decimal.
}

/**
 * Retorna o status de lançamento de um filme com base em seu ano.
 * @param int $ano O ano de lançamento do filme.
 * @return string O status do filme.
 */
function obterStatusLancamento(int $ano): string
{
    $anoAtual = date('Y'); // Pega o ano atual dinamicamente.

    if ($ano >= $anoAtual) {
        return "É um lançamento!";
    } elseif ($ano > $anoAtual - 5) { // Lógica para filmes recentes (ex: últimos 5 anos)
        return "É um filme recente!";
    } else {
        return "É um clássico!";
    }
}


// --- 3. EXIBIÇÃO DOS DADOS ---
// O código de exibição agora é mais limpo e utiliza os dados do array $filme.

echo "========================================\n";
echo "        INFORMAÇÕES DO FILME          \n";
echo "========================================\n\n";

echo "Nome do Filme: {$filme['nome']}\n";
echo "Ano de Lançamento: {$filme['anoLancamento']} (" . obterStatusLancamento($filme['anoLancamento']) . ")\n";
echo "Diretor: {$filme['diretor']}\n";
echo "Gênero: " . implode(', ', $filme['generos']) . "\n"; // implode() formata o array para exibição.
echo "Elenco Principal: " . implode(', ', $filme['elenco']) . "\n";
echo "Duração: {$filme['duracaoEmMinutos']} minutos\n";
echo "Classificação Indicativa: {$filme['classificacaoIndicativa']}\n\n";

echo "Sinopse: {$filme['sinopse']}\n\n";

echo "--- AVALIAÇÕES ---\n";
echo "Nota no IMDb: {$filme['avaliacaoIMDb']} / 10\n";
echo "Média dos Usuários: " . calcularMediaNotas($argv) . " / 10\n\n";

echo "--- DISPONIBILIDADE ---\n";
echo "Incluído no Plano Prime: " . ($planoPrime ? 'Sim' : 'Não') . "\n";
echo "Disponível para Streaming: " . ($filme['disponivel'] ? 'Sim' : 'Não') . "\n";
echo "Preço para Aluguel/Compra: R$ " . number_format($filme['preco'], 2, ',', '.') . "\n\n"; // Formata o preço

echo "--- DETALHES ADICIONAIS ---\n";
echo "Idiomas Disponíveis: " . implode(', ', $filme['idiomas']) . "\n";
echo "Opções de Legenda: " . implode(', ', $filme['legendas']) . "\n";
echo "Prêmios: " . implode(' | ', $filme['premios']) . "\n\n";

echo "--- CURIOSIDADES ---\n";
// Itera sobre o array de curiosidades para exibi-las em uma lista.
foreach ($filme['curiosidades'] as $curiosidade) {
    echo "- $curiosidade\n";
}
echo "\n";

echo "Trailer: {$filme['trailerUrl']}\n";

?>