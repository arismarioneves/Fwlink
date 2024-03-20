<?php

# ▓▓▓▓Dev by Mari05liM▓▓▓▓
# mariodev@outlook.com.br

// Configurações Sistema
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

define('LINK', $protocol . $_SERVER['HTTP_HOST'] . '/'); // Domínio Servidor
define('PASTA', 'fwlink/'); // Subdomínio Servidor
define('HOST', LINK . PASTA); // Servidor
