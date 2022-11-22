<?php
    include("src/apis/databaseConnection.php");
    $con = connect();
    
    if(isset($_GET['value'])){
        $idDOC=$_GET['value'];
        $sentencia="SELECT u.nombre, e.descripcion, d.desc_doc, d.foto from usuarios as u join u_doctor as d on u.correo=d.correo_doc JOIN especialidad as e on d.id_esp=e.id_esp where d.id_doctor=$idDOC";
        $query=mysqli_query($con,$sentencia);
        $row=mysqli_fetch_array($query);
        $nombre=$row[0];
        $descrip=$row[1];
        $infoDoc =$row[2];
        $foto = $row[3];

        echo "
            {
              \"nombre\": \"$nombre\",
              \"descripcion\": \"$descrip\",
              \"infoDoc\": \"$infoDoc\",
              \"foto\": \"$foto\"
            }
        ";

    }

?>