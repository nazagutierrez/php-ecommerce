<?php
session_start();
$count = isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0;
echo $count;
