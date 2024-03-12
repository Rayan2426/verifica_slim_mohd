<?php

use Slim\Factory\AppFactory;

include("./controllers/SiteController.php");
include("./controllers/ImpiantoController.php");
include("./controllers/DispositiviAllarmeController.php");
include("./controllers/RilevatoriPressioneController.php");
include("./controllers/RilevatoriUmiditaController.php");

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/',"ImpiantoController:index");
$app->get('/impianto',"ImpiantoController:index");
$app->get('/impianto/',"ImpiantoController:index");

$app->get('/dispositivi_di_allarme',"DispositiviAllarmeController:index");
$app->get('/dispositivi_di_allarme/',"DispositiviAllarmeController:index");
$app->get('/dispositivi_di_allarme/{id}',"DispositiviAllarmeController:show");
$app->get('/dispositivi_di_allarme/{id}/',"DispositiviAllarmeController:show");

$app->get('/rilevatori_di_pressione',"RilevatoriPressioneController:index");
$app->get('/rilevatori_di_pressione/',"RilevatoriPressioneController:index");
$app->get('/rilevatori_di_pressione/{id}',"RilevatoriPressioneController:show");
$app->get('/rilevatori_di_pressione/{id}/',"RilevatoriPressioneController:show");
$app->get('/rilevatori_di_pressione/{id}/misurazioni',"RilevatoriPressioneController:measures");
$app->get('/rilevatori_di_pressione/{id}/misurazioni/',"RilevatoriPressioneController:measures");
$app->get('/rilevatori_di_pressione/{id}/misurazioni/{value}',"RilevatoriPressioneController:measuresAbove");
$app->get('/rilevatori_di_pressione/{id}/misurazioni/{value}/',"RilevatoriPressioneController:measuresAbove)");

$app->get('/rilevatori_di_umidita',"RilevatoriUmiditaController:index");
$app->get('/rilevatori_di_umidita/',"RilevatoriUmiditaController:index");
$app->get('/rilevatori_di_umidita/{id}',"RilevatoriUmiditaController:show");
$app->get('/rilevatori_di_umidita/{id}/',"RilevatoriUmiditaController:show");
$app->get('/rilevatori_di_umidita/{id}/misurazioni',"RilevatoriUmiditaController:measures");
$app->get('/rilevatori_di_umidita/{id}/misurazioni/',"RilevatoriUmiditaController:measures");
$app->get('/rilevatori_di_umidita/{id}/misurazioni/{value}',"RilevatoriUmiditaController:measuresAbove");
$app->get('/rilevatori_di_umidita/{id}/misurazioni/{value}/',"RilevatoriUmiditaController:measuresAbove)");

$app->run();
