<?php
    include("src/apis/databaseConnection.php");
    $con = connect();
    
    if(isset($_GET['value'])){
        $idDOC=$_GET['value'];
        $sentencia="SELECT u.nombre, e.descripcion from usuarios as u join u_doctor as d on u.correo=d.correo_doc JOIN especialidad as e on d.id_esp=e.id_esp where d.id_doctor=".$idDOC;
        $query=mysqli_query($con,$sentencia);
        $row=mysqli_fetch_array($query);
        $nombre=$row['nombre'];
        $descrip=$row['descripcion'];
        $textoChingueaSuMadre = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, tempora? Delectus voluptate eum reprehenderit sapiente fugiat ratione optio molestiae alias, suscipit sint repudiandae consequuntur doloribus, perferendis fugit ullam saepe molestias.";
        $foto = "https://via.placeholder.com/200x350";

        echo "
            {
              \"nombre\": \"$nombre\",
              \"descripcion\": \"$descrip\",
              \"textoChingueAsuMadre\": \"$textoChingueaSuMadre\",
              \"foto\": \"$foto\"
            }
        ";

    }

?>