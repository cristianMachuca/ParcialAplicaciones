<div class="container">
	<?php include "presentacion/Encabezado.php";?>
	<div class="row mt-3">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h3>Proyecto Vivienda</h3>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<h3>Autenticación</h3>
				</div>
				<div class="card-body">
					<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/autenticar.php") ?>
						method="post">
						<?php if (isset($_GET["error"])) { ?>						
						<div class="alert alert-danger alert-dismissible fade show"
							role="alert">
							<strong>Usuario no valido</strong>
							<button type="button" class="close" data-dismiss="alert"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php } ?>
						<div class="form-group">
							<input type="text" name="nombre" class="form-control"
								placeholder="Nombre" required="required">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Autenticar</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>