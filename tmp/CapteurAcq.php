<?php
header("refresh: 2");
$tab = file('ultra1.txt');
$der_ligne = $tab[count($tab)-1];
$data = substr($der_ligne, -4);
$data_int = number_format($data);
echo $data;
echo $data_int;

?>
