<?php

function load($dir)
{

  if (!file_exists($dir . '/.env')) {
    return false;
  }

  $lines = file($dir . '/.env');
  foreach ($lines as $line) {
    $lineTrim = trim($line);
    putenv($lineTrim);
  }
}
