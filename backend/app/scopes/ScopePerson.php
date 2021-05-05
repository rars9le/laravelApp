<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ScopePerson implements Scope
{
    public function apply(Builder $builer, Model $model)
    {
        $builer->where('age', '>=', 20);
    }
}
