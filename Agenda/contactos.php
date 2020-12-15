<?php 
	include_once 'templates/head.php';

 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-sm-12">
 			<h1>Contactos</h1>
 			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modalagregar"> Agregar nuevo </button>
 			<br>
 			<br>
 			<div id="tablaDatatable">
 				
 			</div>
 		</div>
 	</div>

 	
 </div>

 	<div class="modal fade" id="Modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Agregar un Contacto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="frmnuevoU">
								
								<label>Categoría</label>
								<select name="categoria" id="categoria">
									<option value="" >Selecciona una opción</option>
									<?php
									 	include_once 'procesos/consultar_categoria.php';
									 	foreach ($sel as $key) {

									 		echo "<option value='".$key['id_categoria']."'>".$key['nombre']."</option>";
									 	}
									 ?>
								</select>
								<br>
								<label>Nombre</label>
								<input type="text" class="form-control input-sm" id="nombreU" name="nombre" required="">
								<label>Apellido Paterno</label>
								<input type="text" class="form-control input-sm" id="apaterno" name="apaterno" required="">
								<label>Apellido Materno</label>
								<input type="text" class="form-control input-sm" id="amaterno" name="amaterno" required="">
								<label>Teléfono</label>
								<input type="tel" class="form-control input-sm" id="telefono" name="telefono" required="">
								<label>E-mail</label>
								<input type="mail" class="form-control input-sm" id="email" name="email" required="">
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
							<h5 class="modal-title" id="exampleModalLabel">Edita un contacto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="frmedit">
								<input type="text" name="idcontacto" id="idcontacto" hidden="">
								<label>Categoría</label>
								<select name="categoria" id="categoria2">
									<option value="" >Selecciona una opción</option>
									<?php
									 	include_once 'procesos/consultar_categoria.php';
									 	foreach ($sel as $key) {

									 		echo "<option value='".$key['id_categoria']."'>".$key['nombre']."</option>";
									 	}
									 ?>
								</select>
								<br>
								<label>Nombre</label>
								<input type="text" class="form-control input-sm" id="nombre2" name="nombre" required="">
								<label>Apellido Paterno</label>
								<input type="text" class="form-control input-sm" id="apaterno2" name="apaterno" required="">
								<label>Apellido Materno</label>
								<input type="text" class="form-control input-sm" id="amaterno2" name="amaterno" required="">
								<label>Teléfono</label>
								<input type="tel" class="form-control input-sm" id="telefono2" name="telefono" required="">
								<label>E-mail</label>
								<input type="mail" class="form-control input-sm" id="email2" name="email" required="">
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
	$(document).ready(function(){

		$('#btnAgregar').click(function(e){
			e.preventDefault();
			datos=$('#frmnuevoU').serialize();

			regex= /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i; 
			mail= $('#email'); 

			if(!regex.test(mail.val())){
				Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'El e-mail es invalido!',
							footer: '<a href>Why do I have this issue?</a>'
						});
				return; 
			}


		$.ajax({

			type: "POST",
			data: datos,
			url: 'procesos/agregar_contactos.php',
			success: function(r){
				$('#frmnuevoU')[0].reset();
					Swal.fire(
							'¡Se agrego tú contacto!',
							'C:!',
							'success'
						);
			}, 
			error: function(){
				Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Intenta llenar nuevamente tu registro, por favor!',
							footer: '<a href>Why do I have this issue?</a>'
						});
			}

		});

		}); 

		$('#btnEditar').click(function(e){
			e.preventDefault();
			datos= $('#frmedit').serialize();

			$.ajax({
				type: "POST",
				data: datos,
				url: 'procesos/editar_contacto.php',
				success: function(f){
					$('#tablaDatatable').load('tabla_contactos.php');
					Swal.fire(
							'¡Se edito tú contacto!',
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

		$('#tablaDatatable').load('tabla_contactos.php'); 
	}); 

</script>

<script type="text/javascript">
	
	function agregaFrmActualizar(id_contacto){
		$.ajax({

			type: "POST",
			data: "idcontacto="+ id_contacto,
			url: "procesos/obtener_contacto.php",
			success: function(r){
				datos=jQuery.parseJSON(r);
				$('#nombre2').val(datos['nombre']);
				$('#apaterno2').val(datos['apaterno']);
				$('#amaterno2').val(datos['amaterno']);
				$('#telefono2').val(datos['telefono']);
				$('#email2').val(datos['email']);

				$('#idcontacto').val(id_contacto);
			}
		});


	}


</script>

<script type="text/javascript">
	
	function eliminarDatos(id_contacto){

		$.ajax({

			type: "POST",
			data: "idcontacto="+id_contacto,
			url: "procesos/eliminar_contactos.php",
			success: function(r){
				$('#tablaDatatable').load('tabla_contactos.php');
				Swal.fire(
							'¡Se elimino tú contacto!',
							'C:!',
							'success'
						);	
			}
		});
	}

</script>