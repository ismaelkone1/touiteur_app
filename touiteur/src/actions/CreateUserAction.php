<?php

namespace touiteur\app\actions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use touiteur\app\exceptions\UnsufficientRightsException;
use touiteur\app\services\AuthorService;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class CreateUserAction extends Action
{
    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError|UnsufficientRightsException
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $as = new AuthorService();
        $id = $_SESSION['id'];
        $a = $as->isAdmin($id);

        if (!$a) {
            throw new UnsufficientRightsException('Vous n\'avez pas les droits pour créer un utilisateur');
        } else {
            return Twig::fromRequest($request)->render($response, 'register.twig', [
                'author' => $as->getAuthorID($args['id'])
            ]);
        }
    }
}