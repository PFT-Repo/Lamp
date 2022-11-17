
<?php 
	include("_header.php");
	
	//Miro si envio el formulari
	if(isset($_POST['form_add_category'])){

		//reviso si realment arriba la variables
		if(isset($_POST['nombre_categoria'])){
			//filtro caracters extranys
			$nombre_categoria = htmlspecialchars($_POST['nombre_categoria']);
			
			//faig un INSERT
			$sql = "INSERT INTO categorias (nombre) VALUES ('".$nombre_categoria."')";

			if(mysqli_query($mysqli, $sql)) {
				//Tot correcte
				$okey = "Añadido correctamente";
			}else{
				//Si és produeix un error
				$error = "Error: " . $sql . "<br>" . mysqli_error($mysqli);
			}

		}else{
			$error = "Faltan datos";
		}
	}
?>

<div class="container">
	<div class="row my-4">
	  <div class="col-md-6 offset-md-3">
		<div class="well well-sm">
		  <form action="add_category.php" method="post">
		  <fieldset>
			<?php if(isset($error)) echo "<p class='alert alert-danger'>".$error."</p>"; ?>
			<?php if(isset($okey)) echo "<p class='alert alert-success'>".$okey."</p>"; ?>
			<h2>Añadir categoría</h2>
	
			<div class="mb-3">
				<label>Nombre de la Categoría</label>
				<input type="text" class="form-control" name="nombre_categoria" required>
			</div>
			<div class="mb-3">
				<button type="submit" name="form_add_category" value="form_add_category" class="btn btn-primary">Guardar</button>
			</div>
		  </fieldset>
		  </form>
		</div>
	  </div>
	</div>
</div>
<?php include("_footer.php"); ?>
