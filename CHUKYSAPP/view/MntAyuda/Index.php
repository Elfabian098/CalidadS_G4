<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>OviedoCode</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Ayuda</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Contáctanos</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-block text-center">
							<h2>¿Necesitas ayuda?</h2>
							<p>Si necesitas asistencia o tienes alguna pregunta, no dudes en contactarnos al número <strong>992586244</strong> o también a través del correo <strong>moviedop@ucvvirtual.edu.pe</strong> o <strong>lonaz.mar12@gmail.com</strong></p>
                            <!-- Agregar la siguiente línea para incluir una imagen -->
                            <img src="4.jpg" alt="Texto alternativo de la imagen" class="img-responsive center-block">
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>
	
	<script type="text/javascript" src="mntperfil.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."view/Login/indexpiola.php");
  }
?>

