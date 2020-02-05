<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;
$app->post('/auth', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $auth_data = [];
    $auth_data['login'] = filter_var($data['login'], FILTER_SANITIZE_STRING);
    $auth_data['pass']= filter_var($data['pass'], FILTER_SANITIZE_STRING);
    $response->getBody()->write($auth_data['pass']);

    return $response;
});