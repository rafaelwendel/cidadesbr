<?php
require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use CidadesBR\Config\Connection;

//Instancia o "slim"
$app = AppFactory::create();

/* Customização das requisições que causam Erro 404 */
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setErrorHandler(\Slim\Exception\HttpNotFoundException::class, function (
    \Psr\Http\Message\ServerRequestInterface $request,
    \Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails
) {
    $response = new \Slim\Psr7\Response();
    $response->getBody()->write(json_encode(['code' => 404, 'status' => 'not found']));

    return $response->withStatus(404);
});


//GET "estados"
$app->get('/estados[/{params:.*}]', function (Request $request, Response $response, $args) {
    $estado = new CidadesBR\Models\EstadoModel(Connection::getConnection());
    $estados = $estado->getEstados($args['params']);
    $response->getBody()->write(json_encode($estados));
    return $response->withHeader('Content-Type', 'application/json');
});

//GET "cidades"
$app->get('/cidades[/{params:.*}]', function (Request $request, Response $response, $args) {
    $cidade = new CidadesBR\Models\CidadeModel(Connection::getConnection());
    $cidades = $cidade->getCidades($args['params']);
    $response->getBody()->write(json_encode($cidades));
    return $response->withHeader('Content-Type', 'application/json');
});


//Executa
try {
    $app->run();
} catch (Throwable $exception) {
    http_response_code(400);
    echo sprintf('Bad Request: %s', $exception->getMessage());
}