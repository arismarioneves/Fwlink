<?php

# ▓▓▓▓Dev by Mari05liM▓▓▓▓
# mariodev@outlook.com.br

# API - Fwlink
// fwlink/?id=2185660
// fwlink/?link=https://www.google.com

// Obtém o ID da URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$link = isset($_GET['link']) ? $_GET['link'] : '';

// Conexão
require_once 'conexao.php';

// Configurações
require_once 'config.php';

if ($id == 0 && $link == '') {
    echo "Fwlink :]";
    exit();
}

if ($id) {
    // Consulta o banco de dados para encontrar o link real
    $sql = "SELECT `link` FROM `links` WHERE `id` = '$id'";
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        $row = $result->fetch();
        $link = $row['link'];

        // Redireciona para o link real
        header("Location: $link");
        exit();
    } else {
        echo "Fwlink :]";
    }
}

if ($link) {
    // Insere o link no banco de dados
    $sql = "INSERT INTO `links` (`link`, `date`) VALUES ('$link', NOW())";
    $pdo->query($sql);

    // Obtém o ID do link inserido
    $id = $pdo->lastInsertId();

    // Retorna o link encurtado
    echo HOST . $id;
}
