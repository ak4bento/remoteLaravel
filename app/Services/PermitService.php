<?php

namespace App\Services;

use App\Date;
use Request;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\DataEmptyException;
use App\Permit;
use App\Repositories\PermitRepository;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Validator;

class PermitService extends BaseService
{
    public $model;

    public $repository;

    public $service;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->model = new Permit;
        $this->modelDate = new Date;
        $this->repository = new PermitRepository;
    }

    public function create($data = null)
    {
        \DB::beginTransaction();

        $dataRecord = Arr::only($data, [
            'id',
            'user_id',
            'file',
            'description',
            'dates'
        ]);
        
        $this->model::validate($dataRecord + $data, [
            'file' => 'required',
            'description' => 'required',
            'dates' => 'required',
        ]);

        // create
        $result = $this->model->create($dataRecord);

        \DB::commit();

        return $this->repository->getSingleData($result->id);
    }
}