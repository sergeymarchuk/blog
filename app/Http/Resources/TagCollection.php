<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TagCollection extends ResourceCollection
{

    public $collects = 'App\Http\Resources\Tag';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function withResponse($request, $response)
    {
        $data = $response->getData(true);
        $responseData['data'] = $data['data'];
        $responseData['meta'] = [
            'current_page' => $data['meta']['current_page'],
            'last_page' => $data['meta']['last_page'],
            'from' => $data['meta']['from'],
            'to' => $data['meta']['to'],
            'total' => $data['meta']['total'],
        ];

        $response->setData($responseData);
    }
}
