<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // Cria usuários demo (dados faker)
        $this->createUsers(); 
    }

    public  function createUsers()
    {
         //usuario 1
         User::create([
            'name'      => 'Fernando',
            'email'     => 'user@user.com',
            'password'  => bcrypt('123456'),
        ]);

         // Exibe uma informação no console durante o processo de seed
         $this->command->info('Usuario 1 Fernando criado com sucesso');

         //usuario 2
         User::create([
            'name'      => 'Augusto',
            'email'     => 'au@au.com',
            'password'  => bcrypt('123456'),
        ]);

         // Exibe uma informação no console durante o processo de seed
         $this->command->info('Usuario 2 Augusto criado com sucesso');

         //usuario 3
        User::create([
            'name'      => 'Patricia',
            'email'     => 'pat@pat.com',
            'password'  => bcrypt('123456'),
        ]);

         // Exibe uma informação no console durante o processo de seed
         $this->command->info('Usuario 3 Patricia criado com sucesso');

         //usuario 4
         User::create([
            'name'      => 'Kamile',
            'email'     => 'ka@ka.com',
            'password'  => bcrypt('123456'),
        ]);

         // Exibe uma informação no console durante o processo de seed
         $this->command->info('Usuario 4 Kamile criado com sucesso');
    }
}
