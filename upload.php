<?php

do {
  if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    // Controllo che il file non superi i 18 KB
    if ($_FILES['image']['size'] > 18432) {
      $msg = "<p>Il file non deve superare i 18 KB!!</p>";
      break;
    }
    // Ottengo le informazioni sull'immagine
    list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
    // Controllo che le dimensioni (in pixel) non superino 160x180
    if (($width > 160) || ($height > 180)) {
      $msg = "<p>Dimensioni non corrette!!</p>";
      break;
    }
    // Controllo che il file sia in uno dei formati GIF, JPG o PNG
    if (($type!=1) && ($type!=2) && ($type!=3)) {
      $msg = "<p>Formato non corretto!!</p>";
      break;
    }
    // Verifico che sul sul server non esista già un file con lo stesso nome
    // In alternativa potrei dare io un nome che sia funzione della data e dell'ora
    if (file_exists('C:/xampp/htdocs/tesi/immagini/'.$_FILES['image']['name'])) {
      $msg = "<p>File già esistente sul server. Rinominarlo e riprovare.</p>";
      break;
    }
    // Sposto il file nella cartella da me desiderata
    if (!move_uploaded_file($_FILES['image']['tmp_name'], 'C:/xampp/htdocs/tesi/immagini/'.$_FILES['image']['name'])) {
      $msg = "<p>Errore nel caricamento dell'immagine!!</p>";
      break;
    }
  }
} while (false);
header("location:private.php");
?>