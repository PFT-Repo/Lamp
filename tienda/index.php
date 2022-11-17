<?php include("_header.php"); ?>

	<!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <p class="lead my-4">Categorias de productos</p>
        <div class="list-group">
          <a href="index.php" class="list-group-item">Todos los productos</a>
		  
		<?php $sql = "SELECT * FROM categorias"; 
			  $resultado = mysqli_query($mysqli, $sql);
			  while ($row = mysqli_fetch_assoc($resultado))
			  { ?>
				<!-- Esta linia se va a ejecutar tantas veces como categorias existan en la base de datos -->
				<a href="index.php?id_cat=<?php echo $row['id_categoria']; ?>" class="list-group-item"><?php echo $row['nombre']; ?></a>
		<?php } ?>
        </div>
      </div>
      <!-- /.col-lg-3 -->
      <div class="col-lg-9">


		<div id="carouselExampleIndicators" class="carousel slide my-4" data-bs-ride="carousel">
		  <div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		  </div>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img src="./img/slider/bcnactiva.jpeg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			  <img src="./img/slider/cibernarium2.jpg" class="d-block w-100" alt="...">
			</div>

		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		  </button>
		</div>

        <div class="row gx-4 gx-lg-3 row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
		<?php
			if(isset($_REQUEST['id_cat'])){
				$sql_prod = "SELECT * FROM productos WHERE categoria_id=".$_REQUEST['id_cat']; 
			}else{
				$sql_prod = "SELECT * FROM productos"; 
			}
			
			$resultado_prod = mysqli_query($mysqli, $sql_prod);
			if(mysqli_num_rows($resultado_prod)>0)
			{
				while ($row_prod = mysqli_fetch_assoc($resultado_prod))
				{
				?>
			  <div class="col mb-5">
				<div class="card h-100">
				  <a href="#"><img class="card-img-top" src="<?php echo $row_prod['url_foto']; ?>" alt=""></a>
				  <div class="card-body">
					<h4 class="card-title">
					  <a href="#" class="text-decoration-none"><?php echo $row_prod['nombre']; ?></a>
					</h4>
					<h5><?php echo $row_prod['precio']; ?>€</h5>
					<p class="card-text"><?php echo $row_prod['descripcion']; ?></p>
					<p class="pull-right"><?php echo $row_prod['n_opiniones']; ?> opiniones</p>
				  </div>
				  
				  <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
						<div class="text-center"><a class="btn btn-outline-dark mt-auto" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=ismaelkm%40hotmail%2ecom&lc=ES&item_name=<?php echo $row_prod['nombre']; ?>&amount=<?php echo $row_prod['precio']; ?>&currency_code=EUR&button_subtype=services&no_note=0&bn=PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHostedGuest" target="_blank">Comprar</a></div>
					</div>

				</div>
			  </div>	  
			<?php
				}
			}else{ ?>
				<div class="col-sm-12"><h2>No hay productos en esta categoría</h2></div>
			<?php
			}
			?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

<?php include("_footer.php"); ?>