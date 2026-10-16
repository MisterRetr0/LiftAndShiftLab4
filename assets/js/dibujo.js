// Tinta en el fondo (contacto): al arrastrar con el botón pulsado se dibuja y el trazo se desvanece solo.
(function () {
    var lienzo = document.getElementById('lienzo');
    var ctx = lienzo.getContext('2d');
    var VIDA = 3500; // ms que dura un trazo
    var segmentos = [], dibujando = false, ultimo = null;

    function ajustar() {
        lienzo.width = window.innerWidth;
        lienzo.height = window.innerHeight;
    }
    ajustar();
    window.addEventListener('resize', ajustar);

    function esCampo(el) { return el.closest('input, textarea, button, a, select'); }

    window.addEventListener('pointerdown', function (e) {
        if (e.button !== 0 || esCampo(e.target)) return;
        dibujando = true;
        ultimo = { x: e.clientX, y: e.clientY };
    });
    window.addEventListener('pointermove', function (e) {
        if (!dibujando) return;
        segmentos.push({ x1: ultimo.x, y1: ultimo.y, x2: e.clientX, y2: e.clientY, t: performance.now() });
        ultimo = { x: e.clientX, y: e.clientY };
    });
    window.addEventListener('pointerup', function () { dibujando = false; });

    function pintar(ahora) {
        ctx.clearRect(0, 0, lienzo.width, lienzo.height);
        ctx.lineCap = 'round';
        ctx.lineWidth = 6;
        ctx.strokeStyle = '#141414';
        segmentos = segmentos.filter(function (s) { return ahora - s.t < VIDA; });
        segmentos.forEach(function (s) {
            ctx.globalAlpha = 1 - (ahora - s.t) / VIDA;
            ctx.beginPath();
            ctx.moveTo(s.x1, s.y1);
            ctx.lineTo(s.x2, s.y2);
            ctx.stroke();
        });
        requestAnimationFrame(pintar);
    }
    requestAnimationFrame(pintar);
})();
