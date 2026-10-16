<h2>Contacto</h2>
<p>Déjanos tus datos y te responderemos pronto.</p>

<?php echo $mensaje_db; ?>

<form action="" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="correo">Correo</label>
    <input type="email" id="correo" name="correo" required>

    <label for="comentario">Comentario</label>
    <textarea id="comentario" name="comentario" rows="5" required></textarea>

    <button type="submit">Enviar mensaje</button>
</form>
