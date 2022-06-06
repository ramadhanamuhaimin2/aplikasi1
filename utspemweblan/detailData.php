<?php
require('controllers/CKA.php');

$detail = new CKA();
$id = $_GET['id'];
$detailmhs = $detail->detailDataKA($id);
