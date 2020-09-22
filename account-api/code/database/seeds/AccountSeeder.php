<?php

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Account::create([
            'name' => 'Account 1',
            'id' => \Webpatser\Uuid\Uuid::generate(4),
            'domain' => 'dominio1',
            'database' => 'dominio1'
        ]);

        Account::create([
            'name' => 'Account 2',
            'id' => \Webpatser\Uuid\Uuid::generate(4),
            'domain' => 'dominio2',
            'database' => 'dominio2'
        ]);

        Account::create([
            'name' => 'Account 3',
            'id' => \Webpatser\Uuid\Uuid::generate(4),
            'domain' => 'dominio3',
            'database' => 'dominio3'
        ]);

        Account::create([
            'name' => 'Account 4',
            'id' => \Webpatser\Uuid\Uuid::generate(4),
            'domain' => 'dominio4',
            'database' => 'dominio4'
        ]);
    }
}
