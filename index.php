<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva session de curl; ch = cURL handle
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado de la peticion y no mostrarla en la pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*
Ejecutar la petición
y guardamos el resultado
*/
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
?>

<head>
  <meta charset="UTF-8" />
  <title>La proxima peli de Marvel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<main>
  <section>
    <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"] ?>">
  </section>
</main>

<hgroup>
  <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"] ?> </h2>
  <p class="relase">Fecha de estreno: <?= $data["release_date"]?> </p>
  <p>La siguiente es: <?= $data["following_production"]["title"] ?></p>
</hgroup>


<style>
  :root {
    color-scheme: light dark;
  }

  body {
    display: grid;
    place-content: center;
  }

  main {
    display: flex;
    justify-content: center;
  }

  section {
    display: flex;
    justify-content: center;
  }

  img {
    margin: 0 auto;
  }

  hgroup {
    display: flex;
    justify-content: center;
    flex-direction: column;
  }
  p {
    display: flex;
    justify-content: center;
  }

</style>