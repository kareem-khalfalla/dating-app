<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Traits\FormValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use FormValidation;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, $this->userRules())->validate();

        try {
            DB::beginTransaction();

            $input['password'] = Hash::make($input['password']);

            /** @var \App\Models\User $user */
            $user = User::create($input);

            $user->profile()->create();

            DB::commit();

            return $user;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }
}
