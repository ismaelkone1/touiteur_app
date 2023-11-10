<?php

namespace touiteur\app\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use touiteur\app\services\TouiteService;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class PostTouiteAction extends Action
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $ts = new TouiteService();
        $ts->createTouite($_POST['content'], $_SESSION['id']);
        return Twig::fromRequest($request)->render($response, 'home.twig');
    }
}