<?php

//Importar la conexión
require 'config/database.php';
function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
   
    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}
$db = conectarDB();

if(isset($_POST["accion"])){
    $campos = $_POST["campos"];

    // Se realiza insert
    $consulta = "INSERT INTO auto_info ";
    $columnas = "";
    $valores = "";
    foreach ($campos as $key => $campo) {
        $columnas .= $campo["campo"] . ",";
        $valores .= (($campo["numero"] == "true") ? $campo["valor"] : "'" . $campo["valor"] . "'"). ",";
    }
    $columnas = str_replace(",)", ")", ($columnas . ")"));
    $valores = str_replace(",)", ")", ($valores . ")"));
    $consulta .= "(" . $columnas  ." VALUES (" . $valores .";";

    $reponse = "error";
    if ($db->query($consulta) === true) {
        $reponse = "succcess";
    }
    echo json_encode($reponse);
    exit();
}
$placas = $_GET["text"];
$color = $_GET["text"];

//Formatear entrada a formato de placas en BD
//Pone en mayusculas
$placas = strtoupper($placas);
$placas = preg_replace('/[^A-Z0-9]/', '', $placas);

//Formatear entrada a formato de color en BD
//Pone en mayusculas
$color = strtoupper($color);
$color = preg_replace('/[^A-Z]/', '', $color);

// echo $color;

//Consulta x placas
$consulta = "SELECT * FROM auto_info WHERE id_placa LIKE '${placas}'";
//Obtener los datos de un auto dada la placa
$resultado = mysqli_query($db, $consulta);
$autos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

//Consulta x color
$consultaColor = "SELECT * FROM auto_info WHERE color_auto = '${color}'";
// echo $consultaColor;
$resultadoColor = mysqli_query($db, $consultaColor);
$autos = array_merge($autos, mysqli_fetch_all($resultadoColor, MYSQLI_ASSOC));
$autos = unique_multidim_array($autos,'id_auto');
//  HEADER 
include 'includes/header.php';

?>

<h1>Consulta en base de datos</h1>
<br>
<a href="index.php" class="btn btn-warning">Volver</a>
<button id="btn-nuevo" class="btn btn-success">Nuevo</button>
<br>
<br>
<h2>Auto identificado:</h2>
<br>
<table border="1" class="table">
    <thead>
        <tr>
            <th>ID auto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Tipo</th>
            <th>Color</th>
            <th>Número de serie</th>
        </tr>
    </thead>
    <?php foreach ($autos as $key => $auto) {
        $auto = (array) $auto;
    ?>
        <tbody class="elementos">
            <td><?= $auto['id_auto']; ?></td>
            <td><?= $auto['nombre_user']; ?></td>
            <td><?= $auto['apellido_user']; ?></td>
            <td><?= $auto['id_placa']; ?></td>
            <td><?= $auto['marca_name']; ?></td>
            <td><?= $auto['model_auto']; ?></td>
            <td><?= $auto['year_date']; ?></td>
            <td><?= $auto['type_body']; ?></td>
            <td><?= $auto['color_auto']; ?></td>
            <td><?= $auto['no_serie']; ?></td>
        </tbody>
    <?php } ?>
</table>
<br> <br>
<?php include 'includes/footer.php'; ?>

<script>
    $(document).ready(function() {
        validarAutos();
    });

    async function validarAutos() {
        let cantidad_autos = $(document).find(".elementos").length;
        if (cantidad_autos == 0) {
            // Se pregunta si se quiere registrar el auto
            swal({
                    title: "Auto no identificado",
                    text: "¿Quieres guardarlo?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then(async (confirmacion) => {
                    if (confirmacion) {
                        // Se solicitan los datos
                        solicitarDatos();
                    }
                });
        }
    }

    $(document).on("click", "#btn-nuevo", function () {
        solicitarDatos();
    });

    async function solicitarDatos() {
        let campos = [
            {"campo" : "nombre_user", "texto" : "nombre", "valor" : "", "numero" : false},
            {"campo" : "apellido_user", "texto" : "apellido", "valor" : "", "numero" : false},
            {"campo" : "id_placa", "texto" : "placa", "valor" : "", "numero" : false},
            {"campo" : "marca_name", "texto" : "marca", "valor" : "", "numero" : false},
            {"campo" : "model_auto", "texto" : "modelo", "valor" : "", "numero" : false},
            {"campo" : "year_date", "texto" : "año", "valor" : "", "numero" : true},
            {"campo" : "type_body", "texto" : "tipo", "valor" : "", "numero" : false},
            {"campo" : "color_auto", "texto" : "color", "valor" : "", "numero" : false},
            {"campo" : "no_serie", "texto" : "serie", "valor" : "", "numero" : false},
        ];
        for (let index = 0; index < campos.length; index++) {
            const element = campos[index];
            let valor = null;
            while(valor == null || valor == ""){
                valor = await modalDatos(element.texto);
                campos[index].valor = valor;
            }
        }

        $.ajax({
            type: "post",
            url: "",
            data: {
                "accion" : "nuevo",
                "campos" : campos
            },
            beforeSend: function(data) {

            },
            dataType: "json"
        }).done(function(data) {
            if(data == "succcess"){
                toastr.success("Correcto", "Auto guardado correctamente");
                location.reload();
            }else{
                toastr.error("Incorrecto", "Hubo un problema al guardar. Contacte al área de sistemas.");
            }
        })
        .fail(function(err) {
            toastr.error("Incorrecto", "Hubo un problema al guardar. Contacte al área de sistemas.");
        }).always(function() {

        });
    }
    
    async function modalDatos(texto) {
        return new Promise(resolve => {
            swal(texto + ":", {
                    content: "input",
                })
                .then((value) => {
                    resolve(value);
                });
        });
    }
</script>