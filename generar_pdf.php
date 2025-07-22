<?php
require 'db.php';
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$id = $_POST['id'];
$stmt = $pdo->prepare("SELECT * FROM candidatos WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// Configurar opciones de DomPDF
$options = new Options();
$options->set('chroot', __DIR__);
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'Aptos');
$options->set('defaultMediaType', 'print');
$options->set('isFontSubsettingEnabled', true);

$dompdf = new Dompdf($options);

ob_start();
include 'templates/plantilla_cv.php';
$html = ob_get_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("CV_{$data['nombre']}_{$data['apellido']}.pdf", ["Attachment" => true]);
