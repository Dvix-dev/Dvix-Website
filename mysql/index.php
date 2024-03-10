<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM $tabla ORDER BY id DESC");
?>

<html>
<head>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="crud.css" rel="stylesheet" type="text/css" >
	<title>Biblioteca</title>
</head>

<body>
	<div class="container">
		<a class="btn btn-primary" href="add.html">Añadir libro</a>
	
		<table class="table table-striped table-dark">
	
		<tr>
			<td>T&iacute;tulo</td>
			<td>P&aacute;ginas</td>
			<td>Autor</td>
			<td>Modificar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['titulo']."</td>";
			echo "<td>".$res['paginas']."</td>";
			echo "<td>".$res['autor']."</td>";	
			echo "<td><a class=\"btn btn-light bnt-sm\" href=\"edit.php?id=$res[id]\">Edit</a> | <a class=\"btn btn-light bnt-sm\" href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Estás seguro?')\">Borrar</a></td>";	
		}
		?>
		</table>
	</div>
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
