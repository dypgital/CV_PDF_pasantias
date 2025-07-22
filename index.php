<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }
        h1 {
            text-align: center;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="number"], textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .section {
            margin-top: 30px;
        }
        .entry-container {
            background: #f9f9f9;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        button.remove {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h1>Formulario de Registro - Hoja de Vida</h1>
    <form action="guardar.php" method="POST" enctype="multipart/form-data" onsubmit="return compileJson()">
        <label>Cédula:</label><input type="text" name="cedula" required>
        <label>Nombre:</label><input type="text" name="nombre" required>
        <label>Apellido:</label><input type="text" name="apellido" required>
        <label>Fecha de Nacimiento:</label><input type="date" name="fecha_nacimiento" required>
        <!-- Eliminamos el campo de edad ya que se calculará automáticamente -->
        <label>Celular:</label><input type="text" name="celular">
        <label>Correo:</label><input type="email" name="correo">
        <label>Ciudad:</label><input type="text" name="ciudad">
        <label>Domicilio:</label><textarea name="domicilio"></textarea>
        <div class="section">
            <h3>Foto</h3>
            <input type="file" name="foto" accept="image/*" required>
        </div>
        <div class="section">
            <h3>Datos Académicos</h3>
            <label>Universidad:</label>
            <select name="universidad" required>
                <option value="UNA">UNA - UNIVERSIDAD NACIONAL DE ASUNCION</option>
                <option value="UCA">UCA - UNIVERSIDAD CATOLICA \"NUESTRA SEÑORA DE LA ASUNCION\"</option>
                <option value="UCP">UCP - UNIVERSIDAD COLUMBIA DEL PARAGUAY</option>
                <option value="UNINORTE">UNINORTE - UNIVERSIDAD DEL NORTE</option>
                <option value="UAA">UAA - UNIVERSIDAD AUTONOMA DE ASUNCION</option>
                <option value="UPE">UPE - UNIVERSIDAD PRIVADA DEL ESTE</option>
                <option value="UAP">UAP - UNIVERSIDAD AUTONOMA DEL PARAGUAY</option>
                <option value="UCOM">UCOM - UNIVERSIDAD COMUNERA</option>
                <option value="UNE">UNE - UNIVERSIDAD NACIONAL DEL ESTE</option>
                <option value="UA">UA - UNIVERSIDAD AMERICANA</option>
                <option value="UEP">UEP - UNIVERSIDAD EVANGELICA DEL PARAGUAY</option>
                <option value="UP">UP - UNIVERSIDAD DEL PACIFICO PRIVADA</option>
                <option value="UNP">UNP - UNIVERSIDAD NACIONAL DE PILAR</option>
                <option value="UTIC">UTIC - UNIVERSIDAD TECNOLOGICA INTERCONTINENTAL</option>
                <option value="UTCD">UTCD - UNIVERSIDAD TECNICA DE COMERCIALIZACION Y DESARROLLO</option>
                <option value="UPAP">UPAP - UNIVERSIDAD POLITECNICA Y ARTISTICA DEL PARAGUAY</option>
                <option value="UCSA">UCSA - UNIVERSIDAD DEL CONO SUR DE LAS AMERICAS</option>
                <option value="UNI">UNI - UNIVERSIDAD NACIONAL DE ITAPÚA</option>
                <option value="UAL">UAL - UNIVERSIDAD AUTONOMA DE LUQUE</option>
                <option value="UNIBE">UNIBE - UNIVERSIDAD IBEROAMERICANA</option>
                <option value="UMA">UMA - UNIVERSIDAD METROPOLITANA DE ASUNCION</option>
                <option value="UNIDA">UNIDA - UNIVERSIDAD DE INTEGRACION DE LAS AMERICAS</option>
                <option value="UNINTER">UNINTER - UNIVERSIDAD TRES FRONTERAS</option>
                <option value="UHAS">UHAS - UNIVERSIDAD HERNANDO ARIAS DE SAAVEDRA</option>
                <option value="USIL">USIL - UNIVERSIDAD SAN IGNACIO DE LOYOLA</option>
                <option value="ULAP">UNIVERSIDAD LA PAZ</option>
                <option value="UCP2">UCP - UNIVERSIDAD CENTRAL DEL PARAGUAY</option>
                <option value="UASS">UASS - UNIVERSIDAD AUTONOMA SAN SEBASTIAN</option>
                <option value="UNCA">UNCA - UNIVERSIDAD NACIONAL DE CAAGUAZU</option>
                <option value="UNC">UNC - UNIVERSIDAD NACIONAL DE CONCEPCION</option>
                <option value="UNVES">UNVES - UNIVERSIDAD NACIONAL DE VILLARRICA DEL ESPIRITU SANTO</option>
                <option value="UPG">UPG - UNIVERSIDAD PRIVADA DEL GUAIRA</option>
                <option value="UNDP">UNDP - UNIVERSIDAD NORDESTE DEL PARAGUAY</option>
                <option value="UDS">UDS - UNIVERSIDAD DE DESARROLLO SUSTENTABLE</option>
                <option value="USC">USC - UNIVERSIDAD SAN CARLOS</option>
                <option value="UNISAL">UNISAL - UNIVERSIDAD SAN LORENZO</option>
                <option value="UNAE">UNAE - UNIVERSIDAD AUTONOMA DE ENCARNACION</option>
                <option value="UNASUR">UNASUR - UNIVERSIDAD AUTONOMA DEL SUR</option>
                <option value="UHG">UHG - UNIVERSIDAD HISPANO - GUARANI</option>
                <option value="UMAX">UMAX - UNIVERSIDAD MARIA AUXILIADORA</option>
                <option value="UE">UE - UNIVERSIDAD ESPAÑOLA</option>
                <option value="ULDV">ULDV - UNIVERSIDAD LEONARDO DA VINCI</option>
                <option value="UNG">UNG - UNIVERSIDAD NIHON GAKKO</option>
                <option value="UMS">UMS - UNIVERSIDAD MARIA SERRANA</option>
                <option value="UCMB">UCMB - UNIVERSIDAD CENTRO MEDICO BAUTISTA</option>
                <option value="USCA">USCA - UNIVERSIDAD SANTA CLARA DE ASIS</option>
                <option value="UNICHACO">UNICHACO - UNIVERSIDAD DEL CHACO</option>
                <option value="UNIGRAN">UNIGRAN - UNIVERSIDAD GRAN ASUNCION</option>
                <option value="UNAPY">UNAPY - UNIVERSIDAD ADVENTISTA DEL PARAGUAY</option>
                <option value="UNICAN">UNICAN - UNIVERSIDAD NACIONAL DE CANINDEYÚ</option>
                <option value="UNIAMER">UNIVERSIDAD INTERAMERICANA</option>
                <option value="UNADES">UNADES - UNIVERSIDAD DEL SOL</option>
                <option value="US">US - UNIVERSIDAD SUDAMERICANA</option>
                <option value="UPA">UPA - UNIVERSIDAD PARAGUAYA - ALEMANA</option>
                <option value="UPTP">UPTP - UNIVERSIDAD POLITECNICA TAIWAN PARAGUAY</option>
            </select>
            <label>Carrera:</label><input type="text" name="carrera">
            <label>Semestre:</label><input type="text" name="semestre">
        </div>
        <div class="section">
            <h3>Eventos de Capacitación</h3>
            <div id="eventos"></div>
            <button type="button" onclick="agregarEvento()">Agregar Evento</button>
        </div>

        <div class="section">
            <h3>Experiencia Laboral</h3>
            <div id="experiencia"></div>
            <button type="button" onclick="agregarExperiencia()">Agregar Experiencia</button>
        </div>

        <div class="section">
            <h3>Idiomas</h3>
            <div id="idiomas"></div>
            <button type="button" onclick="agregarIdioma()">Agregar Idioma</button>
        </div>

        <div class="section">
            <h3>Habilidades</h3>
            <p style="font-style: italic; color: #666; margin-bottom: 10px;">
                Citar las herramientas informáticas/digitales y habilidades técnicas-operativas que maneja y el nivel.<br>
                Ejemplo: Herramienta Ofimática (Excel – Nivel Avanzado, Power BI, Nivel Básico, etc)
            </p>
            <textarea name="habilidades" rows="4"></textarea>
        </div>

        <!-- Campos ocultos para JSON -->
        <input type="hidden" name="eventos_json" id="eventos_json">
        <input type="hidden" name="experiencia_json" id="experiencia_json">
        <input type="hidden" name="idiomas_json" id="idiomas_json">

        <br>
        <button type="submit">Generar CV</button>
    </form>

<script>
function agregarEvento() {
    const container = document.createElement('div');
    container.className = 'entry-container';
    container.innerHTML = `
        <label>Año:</label><input type="text" class="anio">
        <label>Tema:</label><input type="text" class="tema">
        <label>Institución:</label><input type="text" class="institucion">
        <label>Carga Horaria:</label><input type="text" class="carga">
        <button type="button" class="remove" onclick="this.parentElement.remove()">Eliminar</button>
    `;
    document.getElementById('eventos').appendChild(container);
}

function agregarExperiencia() {
    const container = document.createElement('div');
    container.className = 'entry-container';
    container.innerHTML = `
        <label>Empresa:</label><input type="text" class="empresa">
        <label>Puesto:</label><input type="text" class="puesto">
        <label>Desde:</label><input type="text" class="desde">
        <label>Hasta:</label><input type="text" class="hasta">
        <label>Referencia:</label><input type="text" class="referencia">
        <button type="button" class="remove" onclick="this.parentElement.remove()">Eliminar</button>
    `;
    document.getElementById('experiencia').appendChild(container);
}

function agregarIdioma() {
    const container = document.createElement('div');
    container.className = 'entry-container';
    container.innerHTML = `
        <label>Idioma:</label><input type="text" class="idioma">
        <label>Nivel:</label><input type="text" class="nivel">
        <label>Certificado:</label>
        <select class="certificado">
            <option value="SI">SI</option>
            <option value="NO">NO</option>
        </select>
        <button type="button" class="remove" onclick="this.parentElement.remove()">Eliminar</button>
    `;
    document.getElementById('idiomas').appendChild(container);
}

function compileJson() {
    const eventos = Array.from(document.querySelectorAll('#eventos .entry-container')).map(e => ({
        anio: e.querySelector('.anio').value,
        tema: e.querySelector('.tema').value,
        institucion: e.querySelector('.institucion').value,
        carga: e.querySelector('.carga').value
    }));
    document.getElementById('eventos_json').value = JSON.stringify(eventos);

    const experiencia = Array.from(document.querySelectorAll('#experiencia .entry-container')).map(e => ({
        empresa: e.querySelector('.empresa').value,
        puesto: e.querySelector('.puesto').value,
        desde: e.querySelector('.desde').value,
        hasta: e.querySelector('.hasta').value,
        referencia: e.querySelector('.referencia').value
    }));
    document.getElementById('experiencia_json').value = JSON.stringify(experiencia);

    const idiomas = Array.from(document.querySelectorAll('#idiomas .entry-container')).map(e => ({
        idioma: e.querySelector('.idioma').value,
        nivel: e.querySelector('.nivel').value,
        certificado: e.querySelector('.certificado').value
    }));
    document.getElementById('idiomas_json').value = JSON.stringify(idiomas);

    return true;
}
</script>
</body>
</html>
