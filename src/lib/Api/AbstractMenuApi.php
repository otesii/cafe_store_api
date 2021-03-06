<?php

/**
 * cafe store api
 * PHP version 7.4
 *
 * @package OpenAPIServer
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */

/**
 * this is a sample.
 * The version of the OpenAPI document: 1.0
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 * Extend this class with your controller. You can inject dependencies via class constructor,
 * @see https://github.com/PHP-DI/Slim-Bridge basic example.
 */
namespace OpenAPIServer\Api;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Exception\HttpNotImplementedException;

/**
 * AbstractMenuApi Class Doc Comment
 *
 * @package OpenAPIServer\Api
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */
abstract class AbstractMenuApi
{
    /**
     * POST addMenu
     * Summary: add menu
     * Notes: メニュー作成
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     *
     * @return ResponseInterface
     * @throws HttpNotImplementedException to force implementation class to override this method
     */
    public function addMenu(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        $body = $request->getParsedBody();
        $message = "How about implementing addMenu as a POST method in OpenAPIServer\Api\MenuApi class?";
        throw new HttpNotImplementedException($request, $message);
    }

    /**
     * DELETE deleteMenu
     * Summary: delete menu
     * Notes: メニュー削除
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param string $menuID メニューID
     *
     * @return ResponseInterface
     * @throws HttpNotImplementedException to force implementation class to override this method
     */
    public function deleteMenu(
        ServerRequestInterface $request,
        ResponseInterface $response,
        string $menuID
    ): ResponseInterface {
        $message = "How about implementing deleteMenu as a DELETE method in OpenAPIServer\Api\MenuApi class?";
        throw new HttpNotImplementedException($request, $message);
    }

    /**
     * GET getMenu
     * Summary: list menu
     * Notes: メニュー一覧
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     *
     * @return ResponseInterface
     * @throws HttpNotImplementedException to force implementation class to override this method
     */
    public function getMenu(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        $message = "How about implementing getMenu as a GET method in OpenAPIServer\Api\MenuApi class?";
        throw new HttpNotImplementedException($request, $message);
    }

    /**
     * GET showMenu
     * Summary: show menu
     * Notes: メニュー詳細
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param string $menuID メニューID
     *
     * @return ResponseInterface
     * @throws HttpNotImplementedException to force implementation class to override this method
     */
    public function showMenu(
        ServerRequestInterface $request,
        ResponseInterface $response,
        string $menuID
    ): ResponseInterface {
        $message = "How about implementing showMenu as a GET method in OpenAPIServer\Api\MenuApi class?";
        throw new HttpNotImplementedException($request, $message);
    }

    /**
     * PUT updateMenu
     * Summary: update menu
     * Notes: メニュー更新
     * Output-Formats: [application/json]
     *
     * @param ServerRequestInterface $request  Request
     * @param ResponseInterface      $response Response
     * @param string $menuID メニューID
     *
     * @return ResponseInterface
     * @throws HttpNotImplementedException to force implementation class to override this method
     */
    public function updateMenu(
        ServerRequestInterface $request,
        ResponseInterface $response,
        string $menuID
    ): ResponseInterface {
        $body = $request->getParsedBody();
        $message = "How about implementing updateMenu as a PUT method in OpenAPIServer\Api\MenuApi class?";
        throw new HttpNotImplementedException($request, $message);
    }
}
