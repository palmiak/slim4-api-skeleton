<?php

declare(strict_types=1);

namespace App\Controller\Language;

use App\CustomResponse as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Fig\Http\Message\StatusCodeInterface;

final class Delete extends Base
{
    /**
     * @param array<string> $args
     */
    public function __invoke(
        Request $request,
        Response $response,
        array $args
    ): Response {
        $this->getLanguageService()->delete((int) $args['id']);

        return $response->withJson('', StatusCodeInterface::STATUS_NO_CONTENT);
    }
}
