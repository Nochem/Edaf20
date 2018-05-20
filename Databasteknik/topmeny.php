<?php 
function show_header($active){
echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Jens Naterman & Andreas Mårdèn">
    <title>';
    if ($active=="home"){echo 'Krusy';}    
    if ($active=="order"){echo 'Skapa Order';} 
    if ($active=="producera"){echo 'Producera Pall';}
    if ($active=="sok"){echo 'Sök Pall';}
    if ($active=="oversikt"){echo 'Översikt';}
    echo '</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-frontpage-min.css" rel="stylesheet">
    <style>
      html, body {
      height: calc(100% - 4rem + 4px);
      }
    </style>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="main.php">Krusty</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item';if ($active=="home"){echo ' active';} echo'">
              <a class="nav-link" href="main.php">Hem';
              if ($active=="home"){echo '<span class="sr-only">(current)</span>';}
            echo '</a>
            </li>
            <li class="nav-item';if ($active=="order"){echo ' active';} echo'">
              <a class="nav-link" href=""><strike>Skapa Order</strike>';
              if ($active=="oder"){echo '<span class="sr-only">(current)</span>';}
            echo '</a>
            </li>
            <li class="nav-item';if ($active=="producera"){echo ' active';} echo'">
              <a class="nav-link" href="producera.php">Producera Pall';
              if ($active=="producera"){echo '<span class="sr-only">(current)</span>';}
            echo '</a></li>
            <li class="nav-item';if ($active=="sok"){echo ' active';} echo'">
              <a class="nav-link" href="sok.php">Sök Pall
              <span class="sr-only">(current)</span>';
              if ($active=="sok"){echo '<span class="sr-only">(current)</span>';}
            echo '</a></li>
            <li class="nav-item';if ($active=="logout"){echo ' active';} echo'">
              <a class="nav-link" href="logout.php">Logga Ut';
              if ($active=="boka"){echo '<span class="sr-only">(current)</span>';}
            echo '</a></li>
          </ul>
        </div>
      </div>
    </nav>';}