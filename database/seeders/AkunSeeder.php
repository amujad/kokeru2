<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'syalwad',
                'name' => 'Syalwa Dea Putri P.',
                'email' => 'manajer@example.com',
                'level' => 'manajer',
                'password' => bcrypt('manajer123')
            ],
            [
                'username' => 'amujad',
                'name' => 'Auliya Mujadidurrahman',
                'email' => 'manajer@example.com',
                'level' => 'manajer',
                'password' => bcrypt('manajer123')
            ],
            [
                'username' => 'mdimas',
                'name' => 'Muhammad Dimas Andhika',
                'email' => 'manajer@example.com',
                'level' => 'manajer',
                'password' => bcrypt('manajer123')
            ],
            [
                'username' => 'idrism',
                'name' => 'Idris Mahmud',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            [
                'username' => 'ratua',
                'name' => 'Ratu Aminah',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            [
                'username' => 'ridwanf',
                'name' => 'Ridwan Firdaus',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            [
                'username' => 'intanl',
                'name' => 'Intan Latifah',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            [
                'username' => 'yusufw',
                'name' => 'Yusuf Wati',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            [
                'username' => 'susilak',
                'name' => 'Susila Kasih',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            [
                'username' => 'suryaa',
                'name' => 'Surya Ahmad',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            [
                'username' => 'muhammadr',
                'name' => 'Muhammad Ridwan',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            [
                'username' => 'buanad',
                'name' => 'Buana Dwi',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            [
                'username' => 'muhamdc',
                'name' => 'Muhamad Cahaya',
                'email' => 'cs@example.com',
                'level' => 'cs',
                'password' => bcrypt('cs123')
            ],
            ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
