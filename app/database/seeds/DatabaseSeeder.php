<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {

    	Eloquent::unguard();

        $this->call('PerkaTableSeeder');

        $this->command->info('Perka table seeded!');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {                

        $hashed = Hash::make('123');                

        User::create(array('id' => 4, 
        	'name' => 'Pembina Kemahasiswaan', 
        	'email' => '6398234+4@gmail.com',
        	'password' => $hashed
        	));        
    }

}

class HakakseTableSeeder extends Seeder 
{

    public function run()
    {                     

        Hakakse::create(array('id' => 5, 
            'user_id' => 4, 
            'peran' => 'approver'            
            ));       
    }

}

class PerkaTableSeeder extends Seeder 
{
    public function run()
    {
        Perka::create(array('id' => 1,
                'jenis' => 'ekstrakurikuler',
                'hakakse_id' => 1
            ));
    }    
}