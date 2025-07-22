<?php
require 'db.php';

// Guardar foto
$foto = $_FILES['foto'];
$nombreFoto = uniqid() . '.' . pathinfo($foto['name'], PATHINFO_EXTENSION);
move_uploaded_file($foto['tmp_name'], 'uploads/' . $nombreFoto);

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
    ':cedula' => $_POST['cedula'],
    ':nombre' => $_POST['nombre'],
    ':apellido' => $_POST['apellido'],
    ':fecha_nacimiento' => $_POST['fecha_nacimiento'],
    ':celular' => $_POST['celular'],
    ':correo' => $_POST['correo'],
    ':ciudad' => $_POST['ciudad'],
    ':domicilio' => $_POST['domicilio'],
    ':universidad' => $_POST['universidad'],
    ':carrera' => $_POST['carrera'],
    ':semestre' => $_POST['semestre'],
    ':eventos_json' => $_POST['eventos_json'],
    ':experiencia_json' => $_POST['experiencia_json'],
    ':idiomas_json' => $_POST['idiomas_json'],
    ':habilidades' => $_POST['habilidades'],
    ':foto' => $nombreFoto
]);

$id = $pdo->lastInsertId();
echo "<p>Generación exitosa. <a href='index.php'>Volver al inicio</a></p>";
echo "<form id=\"redirectForm\" action=\"generar_pdf.php\" method=\"POST\">";
echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
echo "</form>";
echo "<script>document.getElementById('redirectForm').submit();</script>";
