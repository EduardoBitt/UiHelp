<?php
$senha = 'admin'; // Defina a senha desejada
$hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
echo $hashedPassword;
