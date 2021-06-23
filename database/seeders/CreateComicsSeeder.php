<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class CreateComicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = [
            ['title' => 'Dr. Stone','author' => 'Denki Aoyama','desc' => 'The struggle of young men who\'s been slept or sealed over 3000 years have to return a modern technology','price' => '48000','picture' => '2021043029279.jpg','stock' => '2','created_at' => '2021-04-30 10:52:07','updated_at' => '2021-06-12 07:39:51'],
            ['title' => 'Attack on titan','author' => 'Hajime Aoyama','desc' => 'A boy named Eren Yeager, who lives in the town of Shiganshina. In the year 845, the wall is breached by two new types of Titans, named the Colossus Titan and the Armored Titan.','price' => '50000','picture' => '2021043092341.jpg','stock' => '5','created_at' => '2021-04-30 10:52:29','updated_at' => '2021-06-21 01:44:58'],
            ['title' => 'Kimetsu no Yaiba','author' => 'Fujiyama Kugisaki','desc' => 'A boy who his family was slaughtered by a \'Devil\' and his young sister Nezuko was affected. So he is looking for the king of Devil that slaughtered his family','price' => '60000','picture' => '2021050337443.jpg','stock' => '31','created_at' => '2021-05-03 14:27:21','updated_at' => '2021-06-13 02:24:40'],
            ['title' => 'Dragon Ball Super','author' => 'Akira Toriyama','desc' => 'The battle of the 7th universe against the others universes to gain Super Dragon ball and the dangerous anger of God of Destruction, Beerus.','price' => '58000','picture' => '2021051223531.jpg','stock' => '11','created_at' => '2021-05-12 15:06:15','updated_at' => '2021-06-16 02:15:19'],
            ['title' => 'My Hero Academia','author' => 'Kawarama Kibutsuji','desc' => 'The young boy that inherits the power that called One for All, try to attack the anemy that called devil allience.','price' => '48000','picture' => '2021061286366.png','stock' => '24','created_at' => '2021-06-12 08:12:04','updated_at' => '2021-06-22 03:01:27'],
            ['title' => 'One Punch Man','author' => 'ONE','desc' => 'the human with god power who\'s looking for strongest opponents','price' => '120000','picture' => '2021062283666.jpg','stock' => '24','created_at' => '2021-06-22 08:02:28','updated_at' => '2021-06-22 08:02:28'],
            ['title' => 'One Piece','author' => 'Eichiro Oda','desc' => 'the pirates that\'s looking for a treasure called \'One Piece\'','price' => '79000','picture' => '2021062262768.jpg','stock' => '29','created_at' => '2021-06-22 08:06:25','updated_at' => '2021-06-22 08:06:25'],
            ['title' => 'Boruto','author' => 'Ukyo Odachi','desc' => 'the boy who has curse sign from otsutsuki clan and try to vanish that','price' => '69000','picture' => '202106225467.jpg','stock' => '35','created_at' => '2021-06-22 08:10:29','updated_at' => '2021-06-22 08:15:25']
          ];

          foreach ($comics as $key => $value) {
              Books::create($value);
          }
          
    }
}