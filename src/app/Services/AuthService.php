<?php

namespace App\Services;

use App\Enums\SearchTypeEnum;
use App\Repositories\Interfaces\AuthRepository;
use App\Repositories\AuthRepositoryEloquent;
use App\Services\Traits\{Crud, Order, Paginate, Search};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Hash;
use DB;
use Exception;

class AuthService extends AbstractService
{
    use Crud, Order, Paginate, Search;

    public function __construct(Application $app, AuthRepository $repository)
    {
        parent::__construct($app, $repository);
    }

    public function all(): self
    {
        $this->search(
            [
                'name'
            ],
            [
                'name' => ['column' => 'products.name', 'type' => SearchTypeEnum::CONTAINS]
            ]
        );
        
        $this->order();
        
        return $this;
    }

    public function create(array $data)
    {
        DB::beginTransaction();

        try {
            $data['password'] = Hash::make($data['password']);

            $result = $this->repository->create($data);
        }
        catch (Exception $e) {
            DB::rollBack();
            
            throw $e;
        }

        DB::commit();

        return $result;
    }

    public function update(array $data, $id)
    {
        DB::beginTransaction();

        try {
            $result = $this->repository->update($data, $id);
        }
        catch (Exception $e) {
            DB::rollBack();
            
            throw $e;
        }

        DB::commit();

        return $result;
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $result = $this->repository->delete($id);
        }
        catch (Exception $e) {
            DB::rollBack();
            
            throw $e;
        }

        DB::commit();

        return $result;
    }

    public function getLogin(array $data)
    {
        $user = $this->repository->where('email', '=', $data['email'])->first();

        if ($user) {
            if (Hash::check($data['password'], $user->password)) return $user;
        }

        throw new Exception('Usuário ou Senha incorretos.');
    }
}
