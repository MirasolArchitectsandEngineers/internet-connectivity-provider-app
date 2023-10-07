<?php

namespace Database\Seeders;

use App\Models\{DeviceUser, DeviceUserGroup, Router, RouterConfig};
use Illuminate\Database\Seeder;
use RouterOS\{Client, Config, Query};

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Router::factory(10)->create();

        RouterConfig::factory(10)->create();

        DeviceUserGroup::factory(10)->create([
            'router_id' => Router::inRandomOrder()->first()->id,
        ]);

        DeviceUser::factory(100)->create([
            'device_user_group_id' => DeviceUserGroup::inRandomOrder()->first()->id,
        ]);
    }

    public function routerApi()
    {
        $config = new Config([
            'host' => '192.168.1.5',
            'user' => 'admin',
            'pass' => 'password',
            'port' => 8728,
        ]);

        $client = new Client($config);

        $query = new Query('/ip/address/print');

        $response = $client->query($query)->read();

        dump($response);

        $query = new Query('/system/shutdown');

        $response = $client->query($query)->read();

        dd($response);
    }
}
