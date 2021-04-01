<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'feature_id' => '1',
                'title' => 'test1',
                'content' => 'test1'
            ],
            [
                'feature_id' => '1',
                'title' => 'test2',
                'content' => 'test2'
            ],
            [
                'feature_id' => '1',
                'title' => 'test3',
                'content' => 'test3'
            ],
            [
                'feature_id' => '2',
                'title' => 'test1',
                'content' => 'test1'
            ],
            [
                'feature_id' => '2',
                'title' => 'test2',
                'content' => 'test2'
            ],
            [
                'feature_id' => '2',
                'title' => 'test3',
                'content' => 'test3'
            ],
            [
                'feature_id' => '3',
                'title' => 'test1',
                'content' => 'test1'
            ],
            [
                'feature_id' => '3',
                'title' => 'test2',
                'content' => 'test2'
            ],
            [
                'feature_id' => '3',
                'title' => 'test3',
                'content' => 'test3'
            ],
            [
                'feature_id' => '4',
                'title' => 'test1',
                'content' => 'test1'
            ],
            [
                'feature_id' => '4',
                'title' => 'test2',
                'content' => 'test2'
            ],
            [
                'feature_id' => '4',
                'title' => 'test3',
                'content' => 'test3'
            ]
        ]);
    }
}
