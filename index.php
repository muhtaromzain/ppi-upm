<?php
$head_title = 'PPI-UPM';
$credit = '&copy;Developed by Muhtarom Zain X Persatuan Pelajar Indonesia Universiti Putra Malaysia - All Rights Reserved';
$nav = '<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container">
                <a class="navbar-brand" href=".">
                    <img src="covid-19-tracker/img/ppi.svg" width="35" height="35" class="d-inline-block align-top" alt="">
                    PPI-UPM
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href=".">Home</a>
                        <a class="nav-item nav-link" href="covid-19-tracker/">Covid-19 Tracker</a>
                    </div>
                </div>
            </div>
        </nav>';

$body = '<div class="section mt-3">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <img src="covid-19-tracker/img/ppi.svg" width="200" class="img-fluid">
                        <h1 class="py-3">Coming Soon</h1>
                    </div>
                </div>
            </div>
        </div>';

$footer = '<section class="footer">
                <footer class="pt-2 pb-1 text-center" style="background-color: #red">
                    <p class="pt-2">'. $credit .'</p>
                </footer>
            </section>';

$main = '<!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

                <link rel="stylesheet" href="covid-19-tracker/css/style.css">
                <link rel="icon" href="covid-19-tracker/img/ppi_ico.svg">

                <title>'. $head_title .'</title>
            </head>
            <body>
                
                '. $nav .'
                '. $body .'
                '. $footer .'    

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
            </body>
        </html>';

 echo $main;
?>
