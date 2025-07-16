<?php
$dadosPorMes = [];

foreach ($clientes as $cliente) {
    // Extrair o mês de cadastro
    $mes = date('Y-m', strtotime($cliente['data_cadastro']));

    // Contabilizar os cadastros por mês
    if (!isset($dadosPorMes[$mes])) {
        $dadosPorMes[$mes] = 0;
    }
    $dadosPorMes[$mes]++;
}

// Ordenar os meses
ksort($dadosPorMes);

// Separar os meses e as contagens para o gráfico
$meses = array_keys($dadosPorMes);
$quantidades = array_values($dadosPorMes);
?>
