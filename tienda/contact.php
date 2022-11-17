<?php
	
	//Miro si envio el formulari
	if(isset($_POST['add_contact'])){	

		//reviso si realment arriba la variables
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
			
			//filtro caracters extranys
			$name = htmlspecialchars($_POST['name']);
			$email = htmlspecialchars($_POST['email']);
			$message = htmlspecialchars($_POST['message']);
			
			require ("lib/class.phpmailer.php");
			require ("lib/class.smtp.php"); 
			$mail = new PHPMailer();
			
			$mail->SMTPAuth = true;
			$mail->Host = "smtp.gmail.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
			$mail->Username = "ismael.cibernarium1@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
			$mail->Password = "*****"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
			$mail->Port = 465; 

			 $mail->setFrom( $email, $name );
			//$mail->setFrom = $email;// A RELLENAR Desde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
			$mail->AddAddress("ismael.cibernarium1@gmail.com"); // Esta es la dirección a donde enviamos 
			$mail->IsHTML(true); // El correo se envía como HTML 
			$mail->Subject = "Mi asunto"; // Este es el asunto del email. 
			$mail->Body = "Los datos recibidos son:<br>".$name."<br>".$email."<br>".$message;  // Mensaje a enviar.

			$exito = $mail->Send(); // Envía el correo.
			if($exito){
				$okey = "El correo fue enviado correctamente.";
			}else{
				$error = "Hubo un problema. Contacta a un administrador.".$mail->ErrorInfo; 
			} 
		}else{
			$error = "Faltan datos";
		}
		
	}
?>
	<?php include("_header.php"); ?>
    <!-- Page Content -->
<div class="container">
		<div class="row my-4">
		  <div class="col-md-6 offset-md-3">
			<div class="well well-sm">
			  <form action="" method="post">
			  <fieldset>
				<?php if(isset($error)) echo "<p class='alert alert-danger'>".$error."</p>"; ?>
				<?php if(isset($okey)) echo "<p class='alert alert-success'>".$okey."</p>"; ?>
				<h2>Formulario de contacto</h2>
		
				<!-- Name input-->
				<div class="row mb-3">
				  <label class="col-md-3 control-label" for="name">Nombre</label>
				  <div class="col-md-9">
					<input id="name" name="name" type="text" placeholder="" class="form-control" required>
				  </div>
				</div>
		
				<!-- Email input-->
				<div class="row mb-3">
				  <label class="col-md-3 control-label" for="email">Email</label>
				  <div class="col-md-9">
					<input id="email" name="email" type="email" placeholder="" class="form-control" required>
				  </div>
				</div>
		
				<!-- Message body -->
				<div class="row mb-3">
				  <label class="col-md-3 control-label" for="message">Mensaje</label>
				  <div class="col-md-9">
					<textarea class="form-control" id="message" name="message" placeholder="" rows="5" required></textarea>
				  </div>
				</div>
		
				<!-- Form actions -->
				<div class="row mb-3">
				  <div class="col-md-12 text-right">
					<button type="submit" class="btn btn-primary" name="add_contact">Enviar</button>
				  </div>
				</div>
			  </fieldset>
			  </form>
			</div>
		  </div>
		</div>
	</div>
	<?php include("_footer.php"); ?>
