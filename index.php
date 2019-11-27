<?php
// Wir rufen die API von Metaweather für Berlin und packen sie in die Varibale Wetter

$wetter = file_get_contents('https://www.metaweather.com/api/location/638242/');

// Wir verwandeln JSON in PHP Array
$wetter=json_decode($wetter,true);

// Array für das Wetter von heute
$wetter_heute=$wetter['consolidated_weather'][0];
$city=$wetter['title'];


 ?>




<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nicht so tolle Wetter App</title>

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="hero is-fullheight is-dark is-bold">
      <div class="container has-text-centered">
        <div class="content is-small">
            <?php echo $city; ?>
            <?php
            $timestamp = time();
            $datum = date("d.m.Y - H:i", $timestamp);
            echo $datum;?>
        </div>

      <div class="rel state">
        <img src="img/<?php echo $wetter_heute['weather_state_abbr']; ?>.svg"   alt="Wetter Icon" width="200" height="200">
        <p>
          <span class="min-temp">
              <?php echo round($wetter_heute['min_temp'],);

               ?>

          </span>

          <span class="max-temp">
              <?php echo round($wetter_heute['max_temp'],);

               ?>

          </span>
        </p>
        </div>

        <div class="content is-large state">
          <p class="is-size-1 is-uppercase has-text-weight-bold">
            <?php

            $wetter['consolidated_weather'][0]="lc";

             if ($wetter['consolidated_weather'][0]=="c"){
                echo "La vie est belle";
            }

            elseif ($wetter['consolidated_weather'][0]=="lc") {
                echo "Nutz ja nix";
            }
            else {
                echo "Blödes Wetter";
            }

                 ?>


          </p>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
