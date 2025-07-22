<?php
// templates/plantilla_cv.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<style>
     @page {
       size: A4;
       margin: 0.2cm;
     }

    body {
        font-family: Aptos, Calibri, Arial, sans-serif;
        font-size: 9.5pt;
        margin: 0.5cm;
        color: #000;
        line-height: 1.2;
    }
    .datos-personales-container {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
    }
    .foto-box {
        flex: 0 0 150px;
        width: 150px;
        height: 180px;
        border: 1px solid #000;
        text-align: center;
        overflow: hidden;
    }
    .datos-table-container {
        flex: 1;
        max-width: calc(100% - 170px);
    }
    .foto-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    h1 {
        font-size: 12pt;
        font-weight: bold;
        text-align: center;
        margin: 0;
        padding: 0;
    }
    h2 {
        font-size: 11pt;
        text-align: center;
        margin: 0;
        padding: 0;
        margin-bottom: 5px;
    }
    .section-title {
        font-weight: bold;
        margin-top: 8px;
        margin-bottom: 4px;
        background-color: #A6E290;
        padding: 2px 4px;
        font-size: 11pt;
    }
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 8px;
    }
    .data-table td, .data-table th {
        padding: 3px 4px;
        vertical-align: top;
        border: 1px solid #999;
        font-size: 9pt;
    }
    .data-table th {
        background-color: #D9D9D9;
        font-weight: bold;
        text-align: left;
    }

  footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: white;
    padding: 5px 0;
    border-top: 1px solid #999;
  }
</style>
</head>
<body>
<div>
    <img src="<?= __DIR__ ?>/head.png" style="width: 100%; height: auto;">
</div>
<div class="notas">
    Notas: 1. Completar el presente documento, respetando el uso correcto de mayúsculas y minúsculas. <br>
    2. Cargar los datos requeridos, incluir una fotografía actualizada.
</div>

<div class="datos-personales-container">
    <table style="width: 100%; margin-bottom: 15px;">
        <tr>
            <td style="width: 100px; vertical-align: top;">
                <div class="foto-box">
                    <?= $data['foto'] ? "<img src='" . __DIR__ . "/../uploads/{$data['foto']}' style='max-width: 100%; height: 100%; object-fit: cover;'>" : "FOTO" ?>
                </div>
            </td>
            <td style="padding-left: 15px; vertical-align: top;">
                <table class="data-table">
                    <tr><td colspan="2" class="section-title">DATOS PERSONALES</td></tr>
                    <tr><td>Nro de Cédula Identidad</td><td><?= $data['cedula'] ?></td></tr>
                    <tr><td>Nombre completo</td><td><?= $data['nombre'] ?></td></tr>
                    <tr><td>Apellido completo</td><td><?= $data['apellido'] ?></td></tr>
                    <tr><td>Fecha Nacimiento</td><td><?= $data['fecha_nacimiento'] ?></td></tr>
                    <tr><td>Edad</td><td><?php 
                        $fechaNac = new DateTime($data['fecha_nacimiento']);
                        $hoy = new DateTime();
                        $edad = $hoy->diff($fechaNac)->y;
                        echo $edad;
                    ?></td></tr>
                    <tr><td>Nro de Celular</td><td><?= $data['celular'] ?></td></tr>
                    <tr><td>Correo Electrónico</td><td><?= $data['correo'] ?></td></tr>
                    <tr><td>Ciudad</td><td><?= $data['ciudad'] ?></td></tr>
                    <tr><td>Domicilio particular</td><td><?= nl2br($data['domicilio']) ?></td></tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<div class="section-title">DATOS ACADÉMICOS UNIVERSITARIOS</div>
<table class="data-table">
    <tr>
        <th>Nombre de la Universidad</th>
        <th>Nombre de la Carrera</th>
        <th>Año / Semestre actualmente cursando</th>
    </tr>
    <tr>
        <td><?= $data['universidad'] ?></td>
        <td><?= $data['carrera'] ?></td>
        <td><?= $data['semestre'] ?></td>
    </tr>
</table>

<div class="section-title">EVENTOS DE CAPACITACIÓN</div>
<table class="data-table">
    <tr>
        <th>Año</th>
        <th>Denominación de la capacitación</th>
        <th>Institución</th>
        <th>Carga Horaria</th>
    </tr>
    <?php foreach (json_decode($data['eventos_json'], true) as $ev): ?>
    <tr>
        <td><?= $ev['anio'] ?></td>
        <td><?= $ev['tema'] ?></td>
        <td><?= $ev['institucion'] ?></td>
        <td><?= $ev['carga'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="section-title">EXPERIENCIA LABORAL</div>
<table class="data-table">
    <tr>
        <th>Institución/Empresa</th>
        <th>Puesto</th>
        <th>Fecha actividad laboral (desde / hasta)</th>
        <th>Nro de Contacto para Referencia Laboral</th>
    </tr>
    <?php foreach (json_decode($data['experiencia_json'], true) as $ex): ?>
    <tr>
        <td><?= $ex['empresa'] ?></td>
        <td><?= $ex['puesto'] ?></td>
        <td><?= $ex['desde'] ?> - <?= $ex['hasta'] ?></td>
        <td><?= $ex['referencia'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="section-title">MANEJO DE IDIOMA</div>
<table class="data-table">
    <tr>
        <th>Idioma</th>
        <th>Nivel de Conocimiento</th>
        <th>¿Cuenta con certificado que acredite el conocimiento?</th>
    </tr>
    <?php foreach (json_decode($data['idiomas_json'], true) as $idioma): ?>
    <tr>
        <td><?= $idioma['idioma'] ?></td>
        <td><?= $idioma['nivel'] ?></td>
        <td><?= $idioma['certificado'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="section-title">HABILIDADES</div>
<table class="data-table">
    <tr>
        <th>
            Citar las herramientas (informáticas / digitales) y habilidades técnicas-operativas que maneja)    
        </th>
    </tr>
    <tr><td><?= nl2br($data['habilidades']) ?></td></tr>
    <tr>
        <td>
            <i>
                Citar las herramientas informáticas/digitales y habilidades técnicas- operativas que manera y el nivel 
            
Ejemplo: Herramienta Ofimática (Excel – Nivel Avanzado, Power BI, Nivel Basico, etc)
            
            </i>
        </td>
    </tr>
</table>

<footer>
    Programa de Pasantía Universitaria Remunerada – Año 2025    
</footer>
</body>
</html>
