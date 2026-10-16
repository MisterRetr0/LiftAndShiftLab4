    </div> <!-- Cierre de #contenedor-principal -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Laboratorio 4 · Cloud Computing</p>
    </footer>
</div> <!-- Cierre de .contenido -->

<?php
// Personajes según la sección (si hay varias claves, se usa la primera imagen que exista)
$personajes = [
    'libro'   => ['izq' => ['blaidd'],     'der' => ['solaire']],
    'balatro' => ['izq' => ['photograph'], 'der' => ['hanging']],
    'cuero'   => ['izq' => ['arthur'],     'der' => ['geralt']],
    'toon'    => ['izq' => ['cuphead'],    'der' => ['joker', 'mugman']],
][$tema];

foreach ($personajes as $lado => $claves) {
    $src = null;
    foreach ($claves as $clave) { $src = $src ?: imagen($clave); }
    echo '<figure class="personaje ' . $lado . ($src ? '' : ' vacio') . '">';
    if ($src) echo '<img src="' . $src . '" alt="">';
    echo '</figure>';
}

if ($tema === 'toon') { ?>
<canvas id="lienzo"></canvas>
<script src="assets/js/dibujo.js"></script>
<?php } ?>
</body>
</html>
