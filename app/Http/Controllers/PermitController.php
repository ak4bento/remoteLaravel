<?php

namespace App\Http\Controllers;

use App\Date;
use App\Resources\PermitResource;
use App\Services\PermitService;
use Illuminate\Http\Request;

class PermitController extends Controller
{

    /** @var  ArticleService */
    public $service;

    /**
     * Construct a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->service = new PermitService;
    }

    public function index()
    {
        $data = $this->service->getIndexData([
            'id' => 'id',  
            'user_id' => 'title',
            'file' => 'file',
            'description' => 'description',
        ]);

        // return resultIndex($data);
        return (PermitResource::collection($data))->additional([
            'sortableAndSearchableColumn' => $data->sortableAndSearchableColumn,
        ]); 
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data = $this->service->create($data);

        foreach($request->dates as $item)
        {
            $date = new Date;
            $date->permit_id = $data->id;
            $date->date = $item;
            $date->save();
        } 

        return new PermitResource($data);
    }

    public function show($id)
    {
        $data = $this->service->getSingleData($id);  
        // dd($data);
        return new PermitResource($data);
    }
}
