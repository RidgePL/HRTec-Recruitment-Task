<?php

namespace KrystianLataRekrutacjaHRTec;

require_once __DIR__ . '/../vendor/autoload.php';

use KrystianLataRekrutacjaHRTec\classes\CsvCreator;
use KrystianLataRekrutacjaHRTec\classes\XmlLoader;

$command = $argv[1];
$url = $argv[2];
$path = $argv[3];
if (empty($url) || empty($path) || empty($command)) {
    die('Missing parameters');
}
if (!(fopen($url, 'r') && $b = fopen($path, 'a'))) {
    die('There was a problem with your url or path');
}
$xml = new XmlLoader($url);
fclose($b);

if (substr($path, strlen($path) - 4, 4) !== ".csv") {
    $path .= ".csv";
}

switch ($command) {
    case 'csv:simple':
        $csv = new CsvCreator('w', $path, $xml);
        $csv->run();
        break;
    case 'csv:extended':
        $csv = new CsvCreator('a', $path, $xml);
        $csv->run();
        break;
    default:
        die('Unsupported command given');
        break;
}
die('Program completed');
