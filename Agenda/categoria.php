<?php 
	include_once 'templates/head.php';

 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-sm-12">
 			<h1>Categorías</h1>
 			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modalagregar"> Agregar nuevo </button>
 			<br>
 			<br>
 			<div id="tablaDatatable"></div>
 		</div>
 	</div>

 	
 </div>

 	<div class="modal fade" id="Modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Agregar una Categoría</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="frmnuevoU">
								<label>Nombre</label>
								<input type="text" class="form-control input-sm" id="nombre" name="nombre" required="">
								<label>Descripción</label>
								<textarea class="form-control input-sm" id="descripcion" name="descripcion" required="">
								</textarea>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-warning" id="btnAgregar">Agregar</button>
						</div>
					</div>
				</div>
			</div>


		<div class="modal fade" id="Modaleditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Editar una Categoría</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="frmedit">
								<input type="text" name="idcategoria" id="idcategoria" hidden="">
								<label>Nombre</label>
								<input type="text" class="form-control input-sm" id="nombre2" name="nombre" required="">
								<label>Descripción</label>
								<textarea class="form-control input-sm" id="descripcion2" name="descripcion" required="">
								</textarea>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-warning" id="btnEditar">Editar</button>
						</div>
					</div>
				</div>
			</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function (){
		$('#btnAgregar').click(function(e){
			e.preventDefault();
			datos=$('#frmnuevoU').serialize();

			$.ajax({
				type: "POST", 
				data: datos,
				url: "procesos/agregar_categoria.php",
				success: function(r){
					$('#frmnuevoU')[0].reset();
					Swal.fire(
							'¡Se agrego la categoría!',
							'C:!',
							'success'
						);

				},
				error: function() {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Intenta llenar nuevamente tu gasto, por favor!',
							footer: '<a href>Why do I have this issue?</a>'
						});
					}
			}); 
		});

		$('#btnEditar').click(function(e){
			e.preventDefault(); 
			datos= $('#frmedit').serialize();

			$.ajax({
				type:"POST",
				data: datos,
				url: "procesos/editar_categoria.php",
				success: function(r){
					$('#tablaDatatable').load('tabla_categorias.php');
					Swal.fire(
							'¡Se actualizo la categoría!',
							'C:!',
							'success'
						);

				}

			});

		});
	});

</script>

<script type="text/javascript">
	
	$(document).ready(function(){

		$('#tablaDatatable').load('tabla_categorias.php');
	});

</script>

<script type="text/javascript">
	
	function agregaFrmActualizar(id_categoria){

		$.ajax({

			type: "POST",
			data: "idcategoria="+ id_categoria,
			url: 'procesos/obtener_categoria.php',
			success: function(r){
				datos=jQuery.parseJSON(r);
				$('#nombre2').val(datos['nombre']);
				$('#descripcion2').val(datos['descripcion']);

				$('#idcategoria').val(id_categoria);
			}
		});
	}

</script>

<script type="text/javascript">
	
	function eliminarDatos(id_categoria){

		$.ajax({
			type: "POST",
			data: "idcategoria="+ id_categoria,
			url: "procesos/eliminar_categoria.php",
			success: function(r){
				$('#tablaDatatable').load('tabla_categorias.php');
				Swal.fire(
							'¡Se elimino la categoría!',
							'C:!',
							'success'
						);
			}
		});
	}
</script>