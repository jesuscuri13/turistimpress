<?php
// user privileges
if (! current_user_can ('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));

?>

<div class='wrap'>
<h2>Turist Impress</h2>
<table id='formulario'>
<tr>
<td><label for='nombre'>Nombre: </label></td><td><input type='text' id='nombre' /></td>
</tr>
<tr>
<td><label for='telefono'>Teléfono: </label></td><td><input type='text' id='telefono' /></td>
</tr>
<tr>
<td><input type='button' value='Agregar' id='addButton' onclick='agregarPersona()' /></td>
</tr>
</table> <!-- Fin del formulario -->
<table id='agenda'>
<thead>
<tr>
<th>Nombre</th><th>Teléfono</th>
</tr>
</thead>
<tbody id='agendabody'>
<?php
/*$mysqli = new mysqli('mi_host', 'mi_usuario', 'mi_contraseña', 'mi_bd');
$resultado = $mysqli->query("SELECT nombre, telefono FROM agenda");
while($res = $resultado->fetch_array()){
echo("<tr><td>".$res["nombre"]."</td><td>".$res["telefono"]."</td></tr>");
}*/
?>
</tbody>
</table>
</div> <!-- Fin del contendor principal (wrap) -->