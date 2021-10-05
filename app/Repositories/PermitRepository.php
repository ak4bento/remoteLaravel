<?php
namespace App\Repositories;

use Request;
use App\Permit;
use App\Exceptions\DataEmptyException;

/**
 * code for system logic
 */
class PermitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => 'id',
        'user_id' => 'user_id',
        'file' => 'file',
        'description' => 'description',
    ];

    /**
     * [$module description]
     * @var string
     */
    static $module = 'Permit';

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->model = new Permit;
    }

    /**
     * [getIndexData description]
     * @param  array $sortableAndSearchableColumn [description]
     * @return  void [type]                              [description]
     * @throws DataEmptyException
     * @throws \App\Exceptions\ValidationException
     */
    public function getIndexData($sortableAndSearchableColumn = null)
    {
        $data = $this->model
            ->setSortableAndSearchableColumn($sortableAndSearchableColumn)
            ->select(['*'])
            ->search()
            ->sort()
            ->paginate(Request::get('per_page'));

        $data->sortableAndSearchableColumn = $sortableAndSearchableColumn;

        if($data->total() == 0) throw new DataEmptyException(trans('validation.attributes.dataNotExist',['attr' => self::$module]));

        return $data;
    }

    /**
     * [getSingleData description]
     * @param  [type] $id [description]
     * @return void [type]     [description]
     * @throws DataEmptyException
     */
    public function getSingleData($id)
    {
        $return = $this->model
            ->getAll()
            ->where('id',$id)
            ->first();

        if($return === null) throw new DataEmptyException(trans('validation.attributes.dataNotExist',['attr' => self::$module]));

        return $return;
    }

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Article::class;
    }
}
