<?php
    include("src/connection/Conexiondb.php");
    $con=conexion();
    
    if(isset($_GET['value'])){
        $idDOC=$_GET['value'];
        $sentencia="SELECT u.nombre, e.descripcion from usuarios as u join u_doctor as d on u.correo=d.correo_doc JOIN especialidad as e on d.id_esp=e.id_esp where d.id_doctor=".$idDOC;
        $query=mysqli_query($con,$sentencia);
        $row=mysqli_fetch_array($query);
        $nombre=$row['nombre'];
        $descrip=$row['descripcion'];

        //aqui ira lo del pop up
        echo  "<section class=\"info-docs active\" id=\"infodocs\">
                    <span class=\"overlay\"></span>
                    <div class=\"popup\">
                        <div class=\"popup-info\" id=\"popup\">
                            <i class='bx bx-info-circle'></i>
                            <h2>".$nombre."</h2>
                            <h3>".$descrip."</h3>
                            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, tempora? Delectus voluptate eum reprehenderit sapiente fugiat ratione optio molestiae alias, suscipit sint repudiandae consequuntur doloribus, perferendis fugit ullam saepe molestias.</h4>
                            <div class=\"buttons\">
                                <button class=\"cerrar-btn\" onclick=\"removeActive(this)\">Cerrar</button>
                            </div>
                        </div>
                        <div class=\"imagepop\">
                            <img src=\"./Icons/userDoctor.png\" alt=\"docpop1\">
                        </div>
                    </div>
                </section>
                ";

    }

?>