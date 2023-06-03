<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SeederTablaUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $superusu = new User();
      $superusu->name="Superusuario";
      $superusu->email="superadmin@gmail.com";
      $superusu->password='12345678';
      $superusu->created_at=null;
      $superusu->updated_at=null;
      $superusu->save();
      /*
      INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) 
      
      
      VALUES (NULL, 'Superadminis', 'superad@gmail.com', NULL, '123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
      */



      User::factory(10)->create();

    }
}
