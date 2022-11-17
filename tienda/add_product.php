<?php include("_header.php"); ?>
	<?php 
		if(isset($_POST['send_contact'])){
			$name = $_POST['name'];
			echo ($name);
			$price = $_POST['price'];
			echo ($price);
			$category_id = $_POST['category_id'];
			echo ($category_id);
			$descripcion = $_POST['descripcion'];
			echo ($descripcion);
			$url_foto = $_POST['url_foto'];
			echo ($url_foto);
			$n_opiniones = $_POST['n_opiniones'];
			echo ($n_opiniones);

			if(isset($nombre) && isset($price) && isset($category_id) && isset($descripcion) && isset($url_foto) && isset($n_opiniones)){
				echo "Guardar producto";
				$sql = "INSERT INTO productos ('categoria_id', 'nombre', 'descripcion','precio','url_foto','n_opiniones') VALUES (('".$category_id."'),('".$name."'),('".$descripcion."'),('".$price."'),('".$url_foto."'),('".$n_opiniones."'));";
			if(mysqli_query($mysqli, $sql)) {
				//Tot correcte
				$okey = "Añadido correctamente";
			}else{
				//Si és produeix un error
				$error = "Error: " . $sql . "<br>" . mysqli_error($mysqli);
			}

			}else{
				echo "Faltan datos";
			}
		}
	?>
    <!-- Page Content -->
<div class="container flex-shrink-0">
	<div class="row my-4">
	  <div class="col-md-6 offset-md-3">
		  <form action="add_product.php" method="post">
		  <fieldset>
		  	<?php if(isset($error)) echo "<p class='alert alert-danger'>".$error."</p>"; ?>
			<?php if(isset($okey)) echo "<p class='alert alert-success'>".$okey."</p>"; ?>
			<h2>Añadir producto</h2>
	
			<!-- Name input-->
			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="name">Nombre</label>
			  <div class="col-md-9">
				<input id="name" name="name" type="text" placeholder="calcetin" class="form-control" required>
			  </div>
			</div>

			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="category_id">Número de categoria</label>
			  <div class="col-md-9">
				<input id="category_id" name="category_id" type="number" placeholder="1-5" class="form-control" required>
			  </div>
			</div>
	
			<!-- Email input-->
			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="price">Price</label>
			  <div class="col-md-9">
				<input id="price" name="price" type="float" placeholder="5.44 &euro;" class="form-control" required>
			  </div>
			</div>
			<!-- Email input-->
			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="descripcion">descripcion</label>
			  <div class="col-md-9">
				<input id="descripcion" name="descripcion" type="text" placeholder="describelo brevemente" class="form-control" required>
			  </div>
			</div>
			<!-- Email input-->
			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="url_foto">Url de la foto del producto</label>
			  <div class="col-md-9">
				<input id="url_foto" name="url_foto" type="text" placeholder="https://www.google.es/search?q=productos&hl=es-419&tbm=isch&source=hp&biw=1920&bih=1089&ei=xkR2Y8OUKf2VhbIPgb-X8A0&iflsig=AJiK0e8AAAAAY3ZS1gib0WBNN-rKKMpj1cpmdxjzQGF0&ved=0ahUKEwjDj8KXtrX7AhX9SkEAHYHfBd4Q4dUDCAc&uact=5&oq=productos&gs_lcp=CgNpbWcQAzIICAAQgAQQsQMyBQgAEIAEMggIABCABBCxAzIICAAQgAQQsQMyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMggIABCABBCxAzIFCAAQgAQ6CwgAEIAEELEDEIMBOggIABCxAxCDAVChGFiAJGCmJWgAcAB4AIABYIgBuwWSAQE5mAEAoAEBqgELZ3dzLXdpei1pbWewAQA&sclient=img" class="form-control" required>
			  </div>
			</div>
			<!-- Opiniones--->
			<div class="row mb-3">
			  <label class="col-md-3 control-label" for="n_opiniones">N de opiniones</label>
			  <div class="col-md-9">
				<input id="n_opiniones" name="n_opiniones" type="number" placeholder="5" class="form-control" required>
			  </div>
			</div>
	
			<!-- Form actions -->
			<div class="row mb-3">
			  <div class="col-md-12 text-right">
				<button type="submit" name="send_contact" value="send_contact" class="btn btn-primary">Enviar</button>
			  </div>
			</div>
			</fieldset>
		  </form>
	  </div>
	</div>
</div>
<?php include("_footer.php"); ?>
