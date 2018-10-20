<?php
/**
 * Created by PhpStorm.
 * User: Jared
 * Date: 20.10.2018
 * Time: 13:37
 */
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$context = new \BlizzardApiService\Context\BlizzardApiContext(
    'bdccc584b6d248568298dfed6ff91aba',
    'DkAnRVvS348sbfnRliuLzlnrFegyGvZ4',
    'EU',
    'de_DE'
);
$token = $context->getAccessToken();


$connectedRealm = (new \BlizzardApiService\GameData\ConnectedRealm($context))->get(1615);
var_dump($connectedRealm);