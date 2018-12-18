<?php

namespace App\Console\Commands;

use App\Post;
use App\PostMeta;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use Illuminate\Console\Command;

class Transfer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:transfer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transfer news from old website to new (using json dumps)';

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
        $info = \Storage::get('transfer/info.json');
        $info = json_decode($info);
        $processed = 1;

        $progressbar = $this->output->createProgressBar($info->total);

        while ($processed < $info->total) {
            $postToBeProcessed = $info->total - $processed;
            $page = \Storage::get('transfer/posts/post' . $postToBeProcessed . '.json');
            $page = json_decode($page);

            $preview_image = '';
            if (property_exists($page, 'preview_image')) {
                $preview_image = $page->preview_image;
            }

            $title = $page->title;
            $title = str_replace('(>>далі)', '', $title);
            $title = str_replace('(далі>>)', '', $title);
            $title = str_replace('(фотозвіт>>)', '', $title);
            $title = str_replace('(>>фотозвіт)', '', $title);
            $title = str_replace('(>>див.фото)', '', $title);
            $title = str_replace('(>>див. фото)', '', $title);
            $title = str_replace('(див. фото)', '', $title);
            $title = trim($title);
            $title = rtrim($title);

            if (property_exists($page, 'content')) {
                $content = $page->content;
            } else {
                $content = $page->preview_text;
            }
            $content = trim($content);
            $content = rtrim($content);

            $preview = $page->preview_text;
            $preview = trim($preview);
            $preview = rtrim($preview);

            $slugify = new Slugify();
            $slug = $slugify->slugify($title);
            $pub_date = $page->publication_datetime;
            $pub_date = Carbon::parse($pub_date);
            $content_text = strip_tags($content);

            $postsWithSameName = Post::title($title)->count();
            if ($postsWithSameName > 0) {
                $slug .= '-' . $postsWithSameName;
            }

            if (strlen($page->preview_text) > 0) {
                $content = $page->preview_text . '<p>[read-more]</p>' . $content;
            }

            while (strpos($content_text, '  ') !== false) {
                $content_text = str_replace('  ', '', $content_text);
            }

            $content_text = str_replace("\t", '', $content_text);
            $content_text = str_replace("\n", '', $content_text);
            $content_text = str_replace("\r", '', $content_text);

            $content_text = trim($content_text);
            $content_text = rtrim($content_text);

            $post = new Post();
            $post->title = $title;
            $post->slug = $slug;
            $post->content = $content;
            $post->content_text = $content_text;
            $post->id = $info->total - $page->id_reversed;
            $post->created_at = $pub_date->format('Y-m-d H:i:s');
            $post->updated_at = $pub_date->format('Y-m-d H:i:s');
            $post->author_id = 1;
            $post->is_old_post = 1;

            $post->save([ 'timestamps' => false ]);

            if (is_string($preview_image) && strlen($preview_image) > 0) {
                $preview_meta = new PostMeta();
                $preview_meta->key = 'preview';
                $preview_meta->value = $preview_image;
                $post->metas()->save($preview_meta);
            }

            $progressbar->advance(1);
            $processed++;
        }

        $progressbar->finish();

        $this->output->writeln(PHP_EOL);

        return 0;
    }
}
