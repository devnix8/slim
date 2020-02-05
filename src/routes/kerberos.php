<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../src/class/kinit.php';

$app = new \Slim\App;
// API url to validate domain users by kerberos PNO domain, arguments for validations is $post data:login:password
$app->post('/auth', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $post = [];
    $post['login'] = filter_var($data['login'], FILTER_SANITIZE_STRING);
    $post['password']= filter_var($data['password'], FILTER_SANITIZE_STRING);
    $kerberos = KInit::auth($post['login'], $post['password']) ? $response->withStatus(200) : $response->withStatus(401);
    return $kerberos;
});