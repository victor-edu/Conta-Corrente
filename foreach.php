<?php

    function Exibemenssagem($texto){

        echo $texto . PHP_EOL;
    }

    function deposito($conta, $valorDeposito){

        if ($valorDeposito > 0) {
            $conta['saldo'] += $valorDeposito;
        } 
        else {
            Exibemenssagem('O deposito precisa ser positivo');
        }
        return $conta;
    }

    function sacar($conta, $valorSaque){

        if ($conta['saldo'] >= $valorSaque) {
            $conta['saldo'] -= $valorSaque;
        } 
        else {
            Exibemenssagem('O saldo é insuficiente');
        }
        return $conta;
    }

    function exibeConta($conta)
    {
        ['titular' => $titular, 'saldo' => $saldo] = $conta;
        echo "<li>Titular:$titular. Saldo:$saldo</li>";
    }

    $ContaCorrente = [

        '075.461.001-27' => [
            'titular' => 'Victor',
            'saldo' => 100
        ],
        '175.861.201-28' => [
            'titular' => 'Marcos',
            'saldo' => 500
        ],
        '075.461.001-29' => [
            'titular' => 'Roberto',
            'saldo' => 300
        ]
    ];
    $ContaCorrente['175.861.201-28'] = deposito($ContaCorrente['175.861.201-28'], 300);
    $ContaCorrente['075.461.001-29'] = sacar($ContaCorrente['075.461.001-29'], 20);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Contas Correntes</h1>
    <dl>
        <?php foreach ($ContaCorrente as $cpf => $conta) { ?>
            <dt>
                <h3><?= $conta['titular']; ?> - <?= $cpf; ?></h3>
            </dt>
            <dd>
                Saldo: <?= $conta['saldo']; ?>
            </dd>
        <?php } ?>
    </dl>
</body>

</html>