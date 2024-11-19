<?php
$senha = 'admin';
$hashedPassword = password_hash($senha, PASSWORD_DEFAULT);
echo $hashedPassword;
