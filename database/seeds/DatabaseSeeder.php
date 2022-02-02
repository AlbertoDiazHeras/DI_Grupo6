<?php

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
        factory(\almagest\Transport::class, 10)->create();
        factory(\almagest\Payment_term::class, 10)->create();
        factory(\almagest\Discount::class, 10)->create();
        factory(\almagest\Bank_entity::class, 10)->create();
        factory(\almagest\Delivery_term::class, 10)->create();
        factory(\almagest\Company::class, 10)->create();
        factory(\almagest\User::class)->create(['firstname' => 'Raul','secondname'=>'Reyes','email' => 'admin@admin.com','password' => Hash::make('12345678'),'actived' => '1','email_confirmed' => '1','type' => 'a']);
        factory(\almagest\User::class)->create(['firstname' => 'Alberto','secondname'=>'Díaz','email' => 'alberto@alberto.com','password' => Hash::make('12345678'),'actived' => '1','iscontact' => 1,'email_confirmed' => '1']);
        factory(\almagest\User::class, 8)->create();
        factory(\almagest\Family::class, 8)->create();
        factory(\almagest\Article::class, 10)->create();
        factory(\almagest\Product::class, 4)->create();
        factory(\almagest\Order::class, 4)->create();
        factory(\almagest\Delivery_notes::class, 4)->create();
        factory(\almagest\Invoice::class, 4)->create();
    }
}
