<?php
    require __DIR__.'/vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;

    $serviceAccount = ServiceAccount::fromValue(__DIR__ . '/testing-6a43f-firebase-adminsdk-5smwa-f1d96a5df1.json');

    $factory = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://testing-6a43f-default-rtdb.firebaseio.com/');
    $database = $factory->createDatabase();






?>