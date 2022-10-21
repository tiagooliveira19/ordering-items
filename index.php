<?php

	include 'config/conexao.php';

	$select_itens = "SELECT * FROM itens ORDER BY ordem ASC ";
    $result = mysqli_query($conexao, $select_itens);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Ordenação de Itens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
	<div class="container mt-7">

        <div class="col-md-12 mb-3">
            <h3>Arraste e Solte</h3>
        </div>

		<div class="col-md-12 sortable">

			<?php

				while ($item = mysqli_fetch_object($result)) { ?>

					<div class="alert alert-info item" id="<?php echo $item->id; ?>">
						<?php echo $item->ordem ." - ". $item->descricao; ?>
					</div>
				<?php }
            ?>
		</div>
	</div>
</body>

<script type="text/javascript" src="/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script type="text/javascript">

	$(function() {

        $(".sortable").sortable({

            connectWith: ".sortable",
            placeholder: 'dragHelper',
            scroll: true,
            revert: true,
            cursor: "move",
            update: function(event, ui) {

                 var id_item_list = $(this).sortable('toArray').toString();

                 $.ajax({
                     url: 'ordenar_item.php',
                     type: 'POST',
                     data: {id_item : id_item_list},
                     success: function(data) {

                     }
                 });
            }//,
            /*start: function (event, ui) {},*/
            /*stop: function (event, ui) {}*/
        });
    });
</script>
</html>
