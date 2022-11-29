toastr.options.preventDuplicates = true;
$(document).ready(function () {
    const tieneSoporteUserMedia = () => {
        return (navigator.mediaDevices == null) ? false : !!(navigator.mediaDevices.getUserMedia);
    };
    if (typeof MediaRecorder === "undefined" || !tieneSoporteUserMedia())
        return toastr.error("Tu navegador web no cumple los requisitos; por favor, actualiza a un navegador decente como Firefox o Google Chrome", "");
    const btnStartRecord = document.getElementById('btnStartRecord');
    const btnStopRecord = document.getElementById('btnStopRecord');
    const btnPlayText = document.getElementById('playText');
    const texto = document.getElementById('texto');

    let recognition = new webkitSpeechRecognition();
    recognition.lang = 'es-ES';
    recognition.continuous = true;
    recognition.interimResults = false;
    recognition.pitch = 1;

    const frases_clave = [
        "modelo",
        "color",
        "placas",
    ];

    recognition.onresult = (event) => {
        const results = event.results;
        //La variable frase es la que guarda
        const frase = results[results.length - 1][0].transcript;
        texto.value += frase;
    }

    recognition.onend = (event) => {
        console.log('El micrófono deja de escuchar');
    }

    recognition.onerror = (event) => {
        console.log(event.error);
    }

    btnStartRecord.addEventListener('click', () => {
        recognition.start();
        $(document).find("#btnStartRecord").hide();
        $(document).find("#btnStopRecord").show();
    });
    $(document).find("#btnStopRecord").hide();
    btnStopRecord.addEventListener('click', () => {
        recognition.abort();
        $(document).find("#btnStopRecord").hide();
        $(document).find("#btnStartRecord").show();
    });

    btnPlayText.addEventListener('click', () => {
        leerTexto(texto.value);
    });
    permisosMicrofono();
    $(document).find("#texto").trigger("change");
});

$(document).on("change", "#texto", function () {
    if($(this).val().trim() != ""){
        $(document).find("#btnPlayText").show();
    }
    $(document).find("#btnPlayText").hide();
});

function leerTexto(texto) {
    const speech = new SpeechSynthesisUtterance();
    speech.text = texto;
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;

    window.speechSynthesis.speak(speech);
}

function permisosMicrofono() {
    let myConstraints = {
        audio: true,
        video: false
    }

    navigator.mediaDevices.getUserMedia(myConstraints).then(function (mediaStream) {
        toastr.success("Correcto", "Acceso correcto al microfono");
    }).catch(function (err) {
        toastr.error("Incorrecto", "Sin acceso correcto al microfono");
        permisosMicrofono();
    });
}

$(document).on("click", "#btn-redirect", function(){
    let text = $(document).find("#texto").val();
    text = text.toUpperCase();
    text = text.replace(/[^A-Z0-9]/g,'');

    window.location.href = "consulta.php?text=" + text;
});