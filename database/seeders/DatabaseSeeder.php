<?php

namespace Database\Seeders;

/** agrego el modelo */
use App\Models\User;
use App\Models\Role;
use App\Models\role_user;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        /** creo 10 usuarios */
        User::factory(10)->create();

        $roles = [
            'admin',
            'user',
            'writter'];


        foreach ($roles as $role) {
            /** creo un rol */
            Role::create(['name' => $role]);
        }

        foreach (User::all() as $user) {   // recorro todos los usuarios            
            foreach (Role::all() as $role) { //recorro todos los roles
                $user->roles()->attach($role->id);
             }
        }
    }
}
