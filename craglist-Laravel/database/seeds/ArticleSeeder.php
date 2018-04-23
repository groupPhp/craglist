<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();

        for ($i=0; $i < 10; $i++) {
            \App\Article::create([
                'title'   => 'Test Title '.$i,
                'type'    => 'Housing',
                'body'    => 'Test Body '.$i,
                'user_id' => random_int(0, 5),
            ]);
        }
    }
}
