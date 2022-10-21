<?php

	include 'config/conexao.php';


	$id_item = $_POST["id_item"];
	$array_item = explode(", ", $id_item);
	$ordem = 1;

	foreach ($array_item as $array_item) {

			$update_item = "UPDATE itens SET ordem = '".$ordem."' WHERE id_item = ". $array_item;
			mysqli_query($conexao, $update_item);

		$ordem++;
	}
