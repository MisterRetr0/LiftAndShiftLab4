<?php
// Tema visual según la sección
$temas = ['inicio' => 'libro', 'servicios' => 'balatro', 'gustos' => 'cuero', 'contacto' => 'toon'];
$tema = $temas[$url] ?? 'libro';

// Busca una imagen en assets/img sin importar la extensión (png, webp, jpg, avif...)
// $exacto = true compara el nombre completo; false, el inicio del nombre.
function imagen($clave, $exacto = false) {
    $dir = dirname(__DIR__) . '/assets/img/';
    foreach (scandir($dir) as $archivo) {
        $nombre = strtolower($archivo);
        $base = pathinfo($nombre, PATHINFO_FILENAME);
        if (preg_match('/\.(png|webp|jpe?g|avif|gif)$/', $nombre) && ($exacto ? $base === $clave : strpos($nombre, $clave) === 0)) {
            return 'assets/img/' . rawurlencode($archivo);
        }
    }
    return null;
}

$fondos = ['libro' => 'fondo', 'balatro' => 'fondo-balatro', 'cuero' => 'fondo-cuero'];
$fondo = isset($fondos[$tema]) ? imagen($fondos[$tema], true) : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lift & Shift · PHP MVC</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Open+Sans:wght@300;400;600;700;800&family=Pixelify+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body class="tema-<?php echo $tema; ?>"<?php if ($fondo) echo " style=\"--fondo: url('/$fondo')\""; ?>>
<div class="contenido">
    <header>
        <h1>Lift &amp; Shift</h1>
        <nav>
            <ul>
                <li><a href="inicio">Inicio</a></li>
                <li><a href="servicios">Servicios</a></li>
                <li><a href="gustos">Gustos</a></li>
                <li><a href="contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <div id="contenedor-principal">
