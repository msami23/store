<?php

namespace App\Policies;

use App\Category;
use App\User;
use App\product;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;
    public function before(User $user,$ability){
        if($user-> type == 'super_admin'){
            return true;
        }

    }

    /**
     * Determine whether the user can view any products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    //هده تفحص هل اليوزر يقدر يشوف كل category او لا
    public function viewAny(User $user)
    {
        return $user->hasPermission('categories.view');
    }

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User  $user
     * @param  \App\product  $product
     * @return mixed
     */
    //اليوزر مسموح يشوف category معين
    public function view(User $user, Category $product)
    {
        return $user->hasPermission('categories.view');
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('categories.create');
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User  $user
     * @param  \App\product  $product
     * @return mixed
     */
    public function update(User $user, Category $product)
    {
        return $user->hasPermission('categories.update');
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\product  $product
     * @return mixed
     */
    public function delete(User $user, Category $product)
    {
        return $user->hasPermission('categories.delete');
    }

    /**
     * Determine whether the user can restore the product.
     *
     * @param  \App\User  $user
     * @param  \App\product  $product
     * @return mixed
     */
    public function restore(User $user, Category $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the product.
     *
     * @param  \App\User  $user
     * @param  \App\product  $product
     * @return mixed
     */
    public function forceDelete(User $user, Category $product)
    {
        //
    }
}
