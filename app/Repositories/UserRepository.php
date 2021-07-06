<?php

namespace App\Repositories;

use App\Models\MUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class UserRepository extends BaseRepository
{
    public function __construct(MUser $users)
    {
        $this->model = $users;
    }

    public function delete(Builder $target)
    {
        return $target->update(['delete_flg' => 1]);
    }
}
