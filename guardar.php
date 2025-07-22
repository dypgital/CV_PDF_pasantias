<?php
require 'db.php';

// Guardar foto
$foto = $_FILES['foto'];
$nombreFoto = uniqid() . '.' . pathinfo($foto['name'], PATHINFO_EXTENSION);
move_uploaded_file($foto['tmp_name'], 'uploads/' . $nombreFoto);

// Convertir todos los datos a mayúsculas
$cedula = strtoupper($_POST['cedula']);
$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$fecha_nacimiento = $_POST['fecha_nacimiento']; // No convertimos la fecha
$celular = strtoupper($_POST['celular']);
$correo = strtoupper($_POST['correo']);
$ciudad = strtoupper($_POST['ciudad']);
$domicilio = strtoupper($_POST['domicilio']);
$universidad = strtoupper($_POST['universidad']);
$carrera = strtoupper($_POST['carrera']);
$semestre = strtoupper($_POST['semestre']);
$habilidades = strtoupper($_POST['habilidades']);

// Convertir JSON a mayúsculas
$eventos_json = json_decode($_POST['eventos_json'], true);
if (is_array($eventos_json)) {
    foreach ($eventos_json as &$evento) {
        foreach ($evento as $key => $value) {
            $evento[$key] = strtoupper($value);
        }
    }
    $eventos_json = json_encode($eventos_json);
} else {
    $eventos_json = strtoupper($_POST['eventos_json']);
}

$experiencia_json = json_decode($_POST['experiencia_json'], true);
if (is_array($experiencia_json)) {
    foreach ($experiencia_json as &$experiencia) {
        foreach ($experiencia as $key => $value) {
            $experiencia[$key] = strtoupper($value);
        }
    }
    $experiencia_json = json_encode($experiencia_json);
} else {
    $experiencia_json = strtoupper($_POST['experiencia_json']);
}

$idiomas_json = json_decode($_POST['idiomas_json'], true);
if (is_array($idiomas_json)) {
    foreach ($idiomas_json as &$idioma) {
        foreach ($idioma as $key => $value) {
            $idioma[$key] = strtoupper($value);
        }
    }
    $idiomas_json = json_encode($idiomas_json);
} else {
    $idiomas_json = strtoupper($_POST['idiomas_json']);
}

// Insertar en DB
$sql = "INSERT INTO candidatos (
    cedula, nombre, apellido, fecha_nacimiento,
    celular, correo, ciudad, domicilio,
    universidad, carrera, semestre,
    eventos_json, experiencia_json, idiomas_json,
    habilidades, foto
) VALUES (
    :cedula, :nombre, :apellido, :fecha_nacimiento,
    :celular, :correo, :ciudad, :domicilio,
    :universidad, :carrera, :semestre,
    :eventos_json, :experiencia_json, :idiomas_json,
    :habilidades, :foto
)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':cedula' => $cedula,
    ':nombre' => $nombre,
    ':apellido' => $apellido,
    ':fecha_nacimiento' => $fecha_nacimiento,
    ':celular' => $celular,
    ':correo' => $correo,
    ':ciudad' => $ciudad,
    ':domicilio' => $domicilio,
    ':universidad' => $universidad,
    ':carrera' => $carrera,
    ':semestre' => $semestre,
    ':eventos_json' => $eventos_json,
    ':experiencia_json' => $experiencia_json,
    ':idiomas_json' => $idiomas_json,
    ':habilidades' => $habilidades,
    ':foto' => $nombreFoto
]);

$id = $pdo->lastInsertId();
echo "<p>Generación exitosa. <a href='index.php'>Volver al inicio</a></p>";
echo "<form id=\"redirectForm\" action=\"generar_pdf.php\" method=\"POST\">";
echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
echo "</form>";
echo "<script>document.getElementById('redirectForm').submit();</script>";
