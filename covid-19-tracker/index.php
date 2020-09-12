<!-- Code by Muhtarom Zain -->
<?php
function dataFormatter($data) {
    $x = $data;
    $z = number_format($x);
    return $z;
}

function casesCheck($data) {
    if ($data > 1) {
        $data =  '+'.$data.' New cases';
    } else if ($data == 1) {
        $data =  '+'.$data.' New case';
    } else {
        $data =  '+'.$data.' New case';
    }

    return $data;
}

function recoveredCheck($data) {
    if ($data > 1) {
        $data =  '+'.$data.' New recovered cases';
    } else if ($data == 1) {
        $data =  '+'.$data.' New recovered case';
    } else {
        $data =  '+'.$data.' New recovered case';
    }

    return $data;
}

function deathCheck($data) {
    if ($data > 1) {
        $data =  '+'.$data.' New deaths';
    } else if ($data == 1) {
        $data =  '+'.$data.' New death';
    } else {
        $data =  '+'.$data.' New death';
    }

    return $data;
}

function dateConverter($data, $location) {
    $x = $data;
    $y = $x / 1000;
    date_default_timezone_set($location);
    $z = date("l, j F Y H:i:s e", $y);

    return $z;
}

function yesDate($data, $location) {
    $x = $data - 86400000;
    $y = $x / 1000;
    date_default_timezone_set($location);
    $z = date("l, j F Y", $y);

    return $z;
}

// live data
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://corona.lmao.ninja/v2/countries/Indonesia,Malaysia');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

// yesterday data
$curl2 = curl_init();
curl_setopt($curl2, CURLOPT_URL, 'https://corona.lmao.ninja/v2/countries/Indonesia, Malaysia?yesterday=1');
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
$result2 = curl_exec($curl2);
curl_close($curl2);

$data = json_decode($result, true);
$data2 = json_decode($result2, true);

// live data
$data_ID = $data[0];
$data_MY = $data[1];

// yesterday data
$yesData_ID = $data2[0];
$yesData_MY = $data2[1];

$lastUpdated_ID = dateConverter($data_ID['updated'], 'Asia/Jakarta');
$lastUpdated_MY = dateConverter($data_MY['updated'], 'Asia/Kuala_Lumpur');

$yesDate = yesDate($yesData_MY['updated'], 'Asia/Kuala_Lumpur');

date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date("l, j F Y");

$name_ID = $data_ID['country'];
$name_MY = $data_MY['country'];

$flag_ID = $data_ID['countryInfo']['flag'];
$flag_MY = $data_MY['countryInfo']['flag'];

$flag_ID2 = $yesData_ID['countryInfo']['flag'];
$flag_MY2 = $yesData_MY['countryInfo']['flag'];

// live data
// new cases
$newCases_ID = dataFormatter($data_ID['todayCases']);
$newCases_ID = casesCheck($newCases_ID);
$cases_ID = dataFormatter($data_ID['cases']);
$activeCases_ID = dataFormatter($data_ID['active']);

$newCases_MY = dataFormatter($data_MY['todayCases']);
$newCases_MY = casesCheck($newCases_MY);
$cases_MY = dataFormatter($data_MY['cases']);
$activeCases_MY = dataFormatter($data_MY['active']);

// recovered
$newRecoveredCases_ID = dataFormatter($data_ID['todayRecovered']);
$newRecoveredCases_ID = recoveredCheck($newRecoveredCases_ID);
$recoveredCases_ID = dataFormatter($data_ID['recovered']);

$newRecoveredCases_MY = dataFormatter($data_MY['todayRecovered']);
$newRecoveredCases_MY = recoveredCheck($newRecoveredCases_MY);
$recoveredCases_MY = dataFormatter($data_MY['recovered']);

// deaths
$newDeathCases_ID = dataFormatter($data_ID['todayDeaths']);
$newDeathCases_ID = deathCheck($newDeathCases_ID);
$deathCases_ID = dataFormatter($data_ID['deaths']);

$newDeathCases_MY = dataFormatter($data_MY['todayDeaths']);
$newDeathCases_MY = deathCheck($newDeathCases_MY);
$deathCases_MY = dataFormatter($data_MY['deaths']);

// yesterdata data
// new cases
$yesCases_ID = dataFormatter($yesData_ID['todayCases']);
$yesCases_MY = dataFormatter($yesData_MY['todayCases']);

// recovered
$yesRecoveredCases_ID = dataFormatter($yesData_ID['todayRecovered']);
$yesRecoveredCases_MY = dataFormatter($yesData_MY['todayRecovered']);

// deaths
$yesDeathCases_ID = dataFormatter($yesData_ID['todayDeaths']);
$yesDeathCases_MY = dataFormatter($yesData_MY['todayDeaths']);

$head_title = 'PPI-UPM Covid-19 Tracker';

// credit
$credit = '&copy;Developed by Muhtarom Zain X Persatuan Pelajar Indonesia Universiti Putra Malaysia - All Rights Reserved';

// navbar
$navbar = '<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                <div class="container">
                    <a class="navbar-brand" href="../">
                        <img src="img/ppi.svg" width="35" height="35" class="d-inline-block align-top" alt="">
                        PPI-UPM
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" href="../">Home</a>
                            <a class="nav-item nav-link active" href=".">Covid-19 Tracker</a>
                        </div>
                    </div>
                </div>
            </nav>';

// title
$title = '<div class="section mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <img src="img/ppi.svg" width="200" class="img-fluid">
                            <h1>PPI-UPM Covid-19 Tracker</h1>
                            <h2>Live Updates</h2>
                            <h4>'. $date .'</h4>
                        </div>
                    </div>
                </div>
            </div>';

// data
$ID = '<div class="section mt-4">
            <div class="container">
                <div class="text-center">
                    <h5>'. $name_ID .'<img src="'. $flag_ID .'" width="25" class="img-fluid"></h5>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <h5 class="card-header text-center active-title">'. $newCases_ID .'</h5>
                            <div class="card-body active-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title text-center">Total Cases</h5>
                                        <p class="card-text text-center">'. $cases_ID .'</p>
                                    </div>
                                    <div class="col-md-6 hp">
                                        <h5 class="card-title text-center">Active Cases</h5>
                                        <p class="card-text text-center">'. $activeCases_ID .'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <h5 class="card-header text-center recovered-title">'. $newRecoveredCases_ID .'</h5>
                            <div class="card-body recovered-body">
                                <h5 class="card-title text-center">Total Recovered</h5>
                                <p class="card-text text-center">'. $recoveredCases_ID .'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <h5 class="card-header text-center death-title">'. $newDeathCases_ID .'</h5>
                            <div class="card-body death-body">
                                <h5 class="card-title text-center">Total Deaths</h5>
                                <p class="card-text text-center">'. $deathCases_ID .'</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-muted">
                    <h6 class="text-center">Last Updated: '. $lastUpdated_ID .'</h6>
                </div>
            </div>
        </div>';

$MY = '<div class="section mt-5">
            <div class="container">
                <div class="text-center">
                    <h5>'. $name_MY .'<img src="'. $flag_MY .'" width="25" class="img-fluid"></h5>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <h5 class="card-header text-center active-title">'. $newCases_MY .'</h5>
                            <div class="card-body active-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title text-center">Total Cases</h5>
                                        <p class="card-text text-center">'. $cases_MY .'</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="card-title text-center hp">Active Cases</h5>
                                        <p class="card-text text-center">'. $activeCases_MY .'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <h5 class="card-header text-center recovered-title">'. $newRecoveredCases_MY .'</h5>
                            <div class="card-body recovered-body">
                                <h5 class="card-title text-center">Total Recovered</h5>
                                <p class="card-text text-center">'. $recoveredCases_MY .'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <h5 class="card-header text-center death-title">'. $newDeathCases_MY .'</h5>
                            <div class="card-body death-body">
                                <h5 class="card-title text-center">Total Deaths</h5>
                                <p class="card-text text-center">'. $deathCases_MY .'</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-muted mb-4">
                    <h6 class="text-center">Last Updated: '. $lastUpdated_MY .'</h6>
                </div>
            </div>
        </div>';
        
$yes = '<section>
            <div class="container mt-5">
                <div class="row">
                    <div class="col text-center">
                        <h2>Yesterday Report</h2>
                        <h4>'. $yesDate .'</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="3" style="border: 0;">'. $name_ID .'<img width="25" src="'. $flag_ID2 .'"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center active-cases"><b>Cases</b><br/>+'. $yesCases_ID .'</td>
                                    <td class="text-center recovered-cases"><b>Recovered</b><br/>+'. $yesRecoveredCases_ID .'</td>
                                    <td class="text-center death-cases"><b>Death</b><br/>+'. $yesDeathCases_ID .'</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="3">'. $name_MY .'<img width="25" src="'. $flag_MY2 .'"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center active-cases"><b>Cases</b><br/>+<?= $yesCases_MY ?></td>
                                    <td class="text-center recovered-cases"><b>Recovered</b><br/>+<?= $yesRecoveredCases_MY ?></td>
                                    <td class="text-center death-cases"><b>Death</b><br/>+<?= $yesDeathCases_MY ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>';

// reference
$ref = '<section class="resource">
            <div class="container py-2">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-muted">Resource: <a href="https://www.worldometers.info/coronavirus/" target="__blank">www.worldometers.info/coronavirus</a></p>
                    </div>
                    <div class="col-md-6">
                        <p class="ref ml-auto"><a href="https://github.com/disease-sh/API" target="__blank">References</a></p>
                    </div>
                </div>
            </div>
        </section>';

// footer
$footer = '<section class="footer">
                <footer class="pt-2 pb-1 text-center" style="background-color: #red">
                    <p class="pt-2">'.$credit.'</p>
                </footer>
            </section>';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/ppi_ico.svg">

    <title><?= $head_title ?></title>
  </head>
  <body>

    <?= $navbar ?>
    <?= $title ?>
    <?= $ID ?>
    <?= $MY ?>
    <?= $yes ?>
    <?= $ref ?>
    <?= $footer ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
