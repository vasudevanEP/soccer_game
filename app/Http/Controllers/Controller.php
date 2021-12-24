<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Soccer Game OpenApi Documentation",
     *      description="L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          email="vasudevan3092@gmial.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )

     *
     * @OA\Tag(
     *     name="Authentication",
     *     description="API Endpoints of Auth"
     * )
     *
     * @OA\Tag(
     *     name="Team Players",
     *     description="API Endpoints of Team Players"
     * )
     * 
     *
     * @OA\Tag(
     *     name="Teams",
     *     description="API Endpoints of Teams"
     * )
     */


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
