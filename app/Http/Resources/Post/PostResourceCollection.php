<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\{Request, JsonResponse};

class PostResourceCollection extends ResourceCollection
{

    public $collects = 'App\Http\Resources\Post\PostResource';

    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * @param Request $request
     *
     * @param JsonResponse $response
     */
    public function withResponse($request, $response)
    {
        $data = $response->getData(true);
        $responseData['data'] = $data['data'];

        if (isset($data['meta'])) {
            $responseData['meta'] = [
                'current_page' => $data['meta']['current_page'],
                'last_page' => $data['meta']['last_page'],
                'from' => $data['meta']['from'],
                'to' => $data['meta']['to'],
                'total' => $data['meta']['total'],
            ];
        }

        $response->setData($responseData);
    }
}
