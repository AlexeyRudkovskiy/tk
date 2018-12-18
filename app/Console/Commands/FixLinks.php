<?php

namespace App\Console\Commands;

use App\Page;
use Illuminate\Console\Command;

class FixLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-links';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Page::chunk(100, function ($pages) {
            foreach ($pages as $page) {
                $pageContent = $page->content;
                $pageContent = str_replace('title="undefined"', '', $pageContent);
                $pageContent = str_replace('title=""', '', $pageContent);

                $page->content = $pageContent;
                $page->save([ 'timestamps' => false ]);
            }
        });
    }
}
