<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Class AbstractRepository
 * @package App\Repositories
 *
 * @property Model $model
 */
abstract class AbstractRepository extends BaseRepository implements RepositoryInterface
{
    abstract public function model();
    
    /**
     * @param array $where
     * @return $this
     */
    public function whereConditions(array $where)
    {
        $this->applyConditions($where);
    
        return $this;
    }
    
    /**
     * @param string $relationship
     * @param string $field
     * @param array $values
     * @return $this
     */
    public function whereHasIn(string $relationship, string $field, array $values)
    {
        $this->whereHas($relationship, function (Builder $query) use($field, $values) {
            $query->whereIn($field, $values);
        });
        
        return $this;
    }
    
    /**
     * @param $table
     * @param $first
     * @param $operator
     * @param $second
     * @return $this
     */
    public function join($table, $first, $operator, $second)
    {
        $this->model = $this->model->join($table, $first, $operator, $second);
        
        return $this;
    }
    
    /**
     * @param \Closure|string|array $column
     * @param null $operator
     * @param null $value
     * @param string $boolean
     * @return $this|mixed
     */
    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        $this->model = $this->model->where($column, $operator, $value, $boolean);
        
        return $this;
    }
    
    /**
     * @param $table
     * @param $first
     * @param $operator
     * @param $second
     * @return $this
     */
    public function leftJoin($table,  $first, $operator, $second)
    {
        $this->model = $this->model->leftJoin($table, $first, $operator, $second);
        
        return $this;
    }
    
    /**
     * @param array|mixed $columns
     * @return $this
     */
    public function select($columns): self
    {
        $this->model = $this->model->select($columns);
        
        return $this;
    }
    
    /**
     * Find data by field and value
     *
     * @param       $field
     * @param       $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findByFieldFirst($field, $value = null, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();

        $model = $this->model->where($field, '=', $value)->get($columns);

        $this->resetModel();
        
        if ($model->count() === 0){
            $exception = new ModelNotFoundException();

            $exception->setModel($this->model());
            
            throw $exception;
        }
        
        return $this->parserResult($model->first());
    }
    
    /**
     * @param $id
     * @param string $relation
     * @param array $attributes
     * @return mixed
     */
    public function detach($id, string $relation, array $attributes)
    {
        return $this->find($id)->{$relation}()->detach($attributes);
    }
    
    /**
     * @param string $column
     * @param array $values
     * @return $this
     */
    public function whereIn(string $column, array $values)
    {
        $this->model = $this->model->whereIn($column, $values);
        
        return $this;
    }
    
    /**
     * @param \Closure|array|string $column
     * @param mixed $operator
     * @param mixed $value
     */
    public function orWhere($column, $operator = null, $value = null)
    {
        $this->model = $this->model->orWhere($column, $operator, $value);
        
        return $this;
    }
    
    /**
     * @param string $column
     * @param mixed $values
     * @return $this
     */
    public function orWhereIn($column, $values)
    {
        $this->model = $this->model->orWhereIn($column, $values);
        
        return $this;
    }
    
    /**
     * @param string $column
     * @return $this
     */
    public function whereNotNull(string $column)
    {
        $this->model = $this->model->whereNotNull($column);
        
        return $this;
    }    
    
    /**
     * @param string $column
     * @param array $values
     * @return $this
     */
    public function whereNotIn(string $column, array $values)
    {
        $this->model = $this->model->whereNotIn($column, $values);
        
        return $this;
    }    
    
    /**
     * @param string $column
     * @param array $values
     * @return $this
     */
    public function exists(): bool
    {
        return $this->model->exists();
    }
}
