<!DOCTYPE html> 
<?php 
	include("../database/conexion_sis.php");
	include("../shared/navbar.html");
?>
<html lang="en">
<head>
    <title>Lista Usuarios</title>
</head>
<body>
<div class="col-md-8 offset-md-2">
    <h2 class="text-uppercase text-center mb-3">Usuarios registrados</h2>
	<table class="table table-bordered">
    <thead class="bg-dark">
		<tr style="color: white; text-align: center;">
			<td>ID</td>
			<td>Usuario</td>
			<td>Password</td>
			<td>Email</td>
			<td>Imagen</td>
			<td>Acción</td>
			<td>Acción</td>
		</tr>
    </thead>
		<?php
			$usuarios = $conexion->prepare("SELECT * FROM usuarios");
			$usuarios->execute();
			// $i = 0;

			while($fila = $usuarios -> fetch(PDO::FETCH_ASSOC)){
				$id = $fila['id'];
				$usuario = $fila['usuario'];
				$password = $fila['password'];
				$email = $fila['email'];
				$img = $fila['img'];
				// $i++;
			

		?>

		<tr align="center">
			<td><?php echo $id; ?></td>
			<td><?php echo $usuario; ?></td>
			<td><?php echo $password; ?></td>
			<td><?php echo $email; ?></td>
			<td><img style="width:50px;" alt="imagen usuario" src="../images/usuarios/<?php echo $img; ?>"></td>
			<td><a href="editar.php?editar=<?php echo $id; ?>">Editar</a></td>
			<td><a href="listaUsuarios.php?borrar=<?php echo $id; ?>">Borrar</a></td>
		</tr>

		<?php } ?>

	</table>
	</div>
    <?php	
	if(isset($_GET['borrar'])){

			$borrar_id = $_GET['borrar'];
            $borrar = $conexion->prepare("DELETE FROM usuarios WHERE id='$borrar_id'");
            $ejecutar = $borrar->execute();

			if($ejecutar){
				?>
				<script>showNotification('top', 'center', 'success', 'Usuario eliminado correctamente');</script>
				<?php
				echo "<script>window.open('listaUsuarios.php', '_self')</script>";
			}	
		}
?>
</body>
</html>