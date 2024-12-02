<?php
$senha = '@uihelp2024admin';
$hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
echo $hashedPassword;
