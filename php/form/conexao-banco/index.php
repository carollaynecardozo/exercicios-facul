<?php
    $conexao = mysqli_connect('localhost', 'root', '');
    if (!$conexao) {
        die('Não foi possível conectar: ' . mysql_error());
    }
    echo 'Conexão bem sucedida';
    echo '<br>';
    echo '<br>';

    $banco = mysqli_select_db($conexao, 'projeto');
    mysqli_set_charset($conexao,'utf8');

    $sql = mysqli_query($conexao, "SELECT usuarios.id AS id_do_usuario, nome, email, conta_bancaria.id AS id_da_conta, agencia, conta, digito_conta FROM projeto.usuarios LEFT JOIN conta_bancaria ON conta_bancaria.id_usuario = usuarios.id;") or die("Erro");
    while($dados = mysqli_fetch_assoc($sql)) {
        echo $dados['id_do_usuario'] . ' / ' . $dados['nome'] . ' / ' . $dados['email']. ' / ' . $dados['conta'] . ' / ' . $dados['agencia'] . '-' . $dados['digito_conta'] .'<br>';
    }
?>