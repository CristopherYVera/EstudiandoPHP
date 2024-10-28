<?php
const API_URL = 'https://whenisthenextmcufilm.com/api';
/* llamada de apis con curl*/
/* 1. inicializamos una nuevasesion con curl */
$ch = curl_init(API_URL);
/* indicamos que queremos recibir el resultado de la llamada y no moestrar en pantalla */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutamos la peticion 
y guardamos resultado */
$response = curl_exec($ch);
$data = json_decode($response,true);
curl_close($ch);
/* var_dump($data); */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La proxima pelicula de Marvel</title>
    <link rel="stylesheet" href="./styles.css">
    <!-- Centered viewport -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<body>
    <h1 style="text-align: center;" >La próxima pelicula de Marvel</h1>
    <main>
<!--         <pre style="font-size: 10PX; overflow:scroll; height:300px;">
            <?php
                var_dump($data);
            ?>
        </pre> -->
        <section>
            <div style="display: grid; justify-content: center;">
                <img src="<?php echo $data["poster_url"];?>" width="300" alt="Poster de <?php echo $data["title"] ?>"
                style="border-radius: 16px;">
            </div>
        </section>
        <hgroup>
            <h2>
                <?php echo $data["title"]; ?> , se estrena en <?php echo $data["days_until"]; ?> días
            </h2>
            <p>Fecha de estreno : <?php echo $data["release_date"]; ?></p>
        </hgroup>
        <hr>
        <hgroup>
            <p>La siguiente pelicula a estrenar es : <?php echo $data["following_production"]["title"] ?></p>
            <p>Se estrena el <?php echo $data["following_production"]["release_date"] ?></p>
        </hgroup>
    </main>
</body>
</html>