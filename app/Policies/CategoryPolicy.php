<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    public function viewAny(User $user)
    {
        return $user->household_id !== null;
    }

    public function view(User $user, Category $category)
    {
        return $user->household_id === $category->household_id;
    }

    public function create(User $user)
    {
        return $user->household_id !== null;
    }

    public function update(User $user, Category $category)
    {
        return $user->household_id === $category->household_id;
    }

    public function delete(User $user, Category $category)
    {
        return $user->household_id === $category->household_id;
    }
    public function restore(User $user, Category $category)
    {
        return false;
    }

    public function forceDelete(User $user, Category $category)
    {
        return false;
    }
}
