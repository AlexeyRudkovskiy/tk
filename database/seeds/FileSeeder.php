<?php

use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::all()
            ->each(function(\App\Post $post) {
                factory(\App\File::class)
                    ->times(2)
                    ->make()
                    ->each(function(\App\File $file) use ($post) {
                        $post->files()->save($file);
                    });
            });
    }
}
