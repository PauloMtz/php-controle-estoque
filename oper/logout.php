<?php

session_start();
unset($_SESSION['usuario_id']);
unset($_SESSION['usuario_nome']);
unset($_SESSION['usuario_perfil']);

header('location: ../index.php');