<?php
chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$app = new \GianArb\Penny\App();

$template = $app->getContainer()->get('template');

$app->getContainer()->get('event_manager')->attach('ERROR_DISPATCH', function (\GianArb\Penny\Event\HttpFlowEvent $event) use ($template) {
    $e = $event->getException();

    $response = $event->getResponse()->withStatus($e->getCode());
    $event->setResponse($response);

    $response->getBody()->write($template->render("error/40x", [
        'title' => $e->getMessage(),
        'exception' => $e,
    ]));
});

$emitter = new \Zend\Diactoros\Response\SapiEmitter();
$emitter->emit($app->run());
