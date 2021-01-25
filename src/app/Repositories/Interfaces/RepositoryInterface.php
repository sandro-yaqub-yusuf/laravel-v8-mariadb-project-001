<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface as RepositoryInterfacePrettus;
/**
 * Interface RepositoryInterface.
 *
 * @package namespace App\Repositories;
 */
interface RepositoryInterface extends RepositoryInterfacePrettus
{
    /**
     * @param array $where
     * @return mixed
     */
    public function where(array $where);
    
    /**
     * @param string $relationship
     * @param string $field
     * @param array $values
     * @return mixed
     */
    public function whereHasIn(string $relationship, string $field, array $values);
    
    /**
     * @param $table
     * @param $first
     * @param $operator
     * @param $second
     * @return mixed
     */
    public function join($table,  $first, $operator, $second);
    
    /**
     * @param $table
     * @param $first
     * @param $operator
     * @param $second
     * @return mixed
     */
    public function leftJoin($table,  $first, $operator, $second);
    
    /**
     * @param array $fields
     * @return mixed
     */
    public function select(array $fields);
    
    /**
     * @param $field
     * @param null $value
     * @param string[] $columns
     * @return mixed
     */
    public function findByFieldFirst($field, $value = null, $columns = ['*']);
    
    /**
     * @param $id
     * @param string $relation
     * @param array $attributes
     * @return mixed
     */
    public function detach($id, string $relation, array $attributes);
    
    /**
     * @param string $column
     * @param array $values
     * @return $this
     */
    public function whereIn(string $column, array $values);
    
    /**
     * @return bool
     */
    public function exists():bool;
    
    /**
     * @param string $column
     * @param array $values
     * @return mixed
     */
    public function whereNotIn(string $column, array $values);
}
