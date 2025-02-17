<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isTeacher() || $user->isDepartment();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->isStudent() || $user->isTeacher() || $user->isDepartment();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return  $user->isTeacher() || $user->isDepartment();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return  $user->isTeacher() || $user->isDepartment();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return  $user->isTeacher() || $user->isDepartment();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return  $user->isTeacher() || $user->isDepartment();
    }

    public function studentView(User $user): bool {
        return  $user->isStudent() ;
    }

    public function teacherView(User $user): bool {
        return  $user->isTeacher() || $user->isDepartment();
    }
    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
    public function getAllStudents(User $user): bool
    {
        return  $user->isTeacher() || $user->isDepartment();
    }

    public function approveEnrollment(User $user): bool
    {
        return  $user->isTeacher() || $user->isDepartment();
    }

    public function teacherUpdate(User $user): bool {
        return  $user->isTeacher() || $user->isDepartment();
    }

    public function studentUpdate(User $user): bool {
        return  $user->isStudent();
    }

}
