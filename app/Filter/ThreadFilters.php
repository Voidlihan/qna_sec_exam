<?php
namespace App\Filter;
use App\Models\User;
use App\Filter\Filters;

class ThreadFilters extends Filters
{
    protected $filters = ['by', 'popular', 'answered'];
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }
    protected function popular()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('replies_count', 'desc');
    }
    protected function answered()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder
            ->whereHas('replies')
            ->orderBy('replies_count', 'desc');
    }
}
