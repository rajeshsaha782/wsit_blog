<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,

            //'link'=> route('show', ['id' => $this->id]),
            
        ];
    }
    // public function with($request)
    // {
    //     return [
    //         'links' => [
    //             'self' => route('show',1),
    //         ],
    //     ];
    // }
}
