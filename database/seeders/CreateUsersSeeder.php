<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run() {
    $users = [
      [
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'is_admin' => '1',
        'password' => bcrypt('12345678'),
      ],
      [
        'name' => 'User',
        'email' => 'user@gmail.com',
        'is_admin' => '0',
        'password' => bcrypt('87654321'),
      ],
        ['name' => 'Historia','email' => 'historia@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$Vgr6/YGdgEoIYd4qp1Mg6eEG4KVVmyCam7HcptVT.mfB84CJZqzRW','is_admin' => NULL,'address' => NULL,'phone' => NULL,'picture' => 'default.png','remember_token' => NULL,'created_at' => '2021-03-25 01:21:22','updated_at' => '2021-03-25 01:21:22'],
        ['name' => 'reiner braun','email' => 'ricky03senju@gmail.com','email_verified_at' => '2021-06-22 04:06:22','password' => '$2y$10$kVuoCvfHObHm9GUtNPQXlOsJOcBtfhX0llWUWJInbOuhnDYAI5tY6','is_admin' => '1','address' => NULL,'phone' => NULL,'picture' => 'default.png','remember_token' => NULL,'created_at' => '2021-06-22 03:53:12','updated_at' => '2021-06-22 04:06:22'],
        ['name' => 'Levi Ackerman','email' => 'levi@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$sF521MqTEnwz6wVw04Am/eHYNRkj6PNgzGa1eDxXbe.q9LCRuzKX.','is_admin' => '1','address' => 'Kp.Ciduga Des.Margahayu Kec.Leuwigoong Kab.Garut','phone' => '08292824616','picture' => '2021052021981.jpg','remember_token' => NULL,'created_at' => '2021-04-05 10:37:36','updated_at' => '2021-05-20 09:08:52'],
        ['name' => 'okabe rintorou','email' => 'okarin777@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$JzIDwD.aq08etOObPzE8t.bh0s1epbED7AzBaoTSqddsxWtX5t7dO','is_admin' => '1','address' => 'JL. KH Hasan Arief no 29 RT 02 RW 09 Cihuni Kulon, Desa Bantar Jati','phone' => '087909823000','picture' => '2021060983439.png','remember_token' => NULL,'created_at' => '2021-05-25 15:50:33','updated_at' => '2021-06-09 01:53:30'],
        ['name' => 'okarin sama','email' => 'okarin7@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$t8bKfRlCCUS47d4gb0K/UO0AhgWLDFdiWrf6afak7g2E.ruFbACmK','is_admin' => NULL,'address' => 'cihuni kulon','phone' => '025798235','picture' => 'default.png','remember_token' => NULL,'created_at' => '2021-05-28 07:37:54','updated_at' => '2021-05-28 08:06:51'],
        ['name' => 'mayuri','email' => 'goose73thecat@gmail.com','email_verified_at' => '2021-06-21 10:59:20','password' => '$2y$10$3CW.VSgEJ4.unJQ4B0yp6.vjURUo/Zqe6Pm3APhOOvpMF1C.YedqW','is_admin' => NULL,'address' => NULL,'phone' => NULL,'picture' => 'default.png','remember_token' => NULL,'created_at' => '2021-06-21 10:51:25','updated_at' => '2021-06-21 10:59:20'],
        ['name' => 'mikey','email' => 'mikey000@toman.co','email_verified_at' => NULL,'password' => '$2y$10$KUdg6Ipk.NJLbaqZ2QhN0.S6sjlUWZ4xVJiYqJZYhFmu56d9KOnOi','is_admin' => NULL,'address' => 'shibuya, Tokyo city, Japan','phone' => '12345675543','picture' => 'default.png','remember_token' => NULL,'created_at' => '2021-06-09 03:47:40','updated_at' => '2021-06-09 04:15:35']
    ];

    foreach ($users as $key => $value) {
      User::create($value);
    }

  }
}