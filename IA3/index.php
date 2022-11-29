<!-- HEADER -->
<?php include 'includes/header.php'; ?>

<center>
  <h1>Reconocimiento de voz</h1>
  <p>Para consultar, por favor active el reconocimiento de voz e indique la
    <span> placa o color </span>
  </p>
  <textarea id="texto" cols="50" rows="5" name="texto"></textarea>
  <br>
  <div class="botones">
    <span id="btnStartRecord" class="btn btn-light btn-circle btn-xl">
      <img src="./img/play.png" alt="" style="width: 100%;">
    </span>
    <span id="btnStopRecord" class="btn btn-light btn-circle btn-xl">
      <img src="./img/pause.png" alt="" style="width: 100%;">
    </span>
    <span id="playText" class="btn btn-light btn-circle btn-xl">
      <img src="./img/altavoz.png" alt="" style="width: 100%;">
    </span>
    <a class="btn btn-light btn-circle btn-xl" id="btn-redirect">
      <img src="./img/save.png" alt="" style="width: 100%;">
    </a>
  </div>
</center>



<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>