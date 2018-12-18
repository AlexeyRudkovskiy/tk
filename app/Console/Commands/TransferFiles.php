<?php

namespace App\Console\Commands;

use App\Post;
use Illuminate\Console\Command;

class TransferFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:transfer:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transfer files from posts and pages';

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
        $this->output->writeln("Coping files from posts and pages to local storage");
        $progressbar = $this->output->createProgressBar(Post::count());
        $posts = Post::latest()->chunk(100, function ($posts) use ($progressbar) {
            foreach ($posts as $post) {
                $progressbar->advance(1);

                $preview = $post->meta('preview');
                if ($preview !== null) {
                    $previewUrl = $preview->value;
                    if (!starts_with($previewUrl, '/storage/')) {
                        $previewUrl = str_replace('//', '/', $previewUrl);
                        $previewUrl = str_replace('http:/', 'http://', $previewUrl);
                        $uploadedUrl = $this->copyFile($previewUrl);
                        $uploadedPath = str_replace('/storage/', '/public/', $uploadedUrl);
                        $uploadedPath = storage_path('app' . $uploadedPath);

                        if (!file_exists($uploadedPath)) {
                            $preview->delete();
                        } else {
                            $preview->value = $uploadedUrl;
                            $preview->save();
                        }
                    }
                }

                $content = $post->content;
                $content = str_replace("<p>\n<p>", '<p>', $content);
                $content = str_replace("<p>\n <p>\n", "<p>\n", $content);
                $content = substr($content, 0, strlen($content) - 4);
                $content = str_replace('<br/>', '', $content);

                $isHaveChanges = false;

                $replace_with_processed = '';

                preg_match_all("%<script type=\"text/javascript\">\n?( +)?ajax_loadblock\('([a-z0-9]+)','([a-zA-Z0-9\&\\\/\:\.\?\=\_\%]+)',null\);\n?( +)?</script>%i", $content, $ajax_loads);
                foreach ($ajax_loads[3] as $index => $ajax_url) {
                    $to_replace = $ajax_loads[0][$index];
                    $replace_with = file_get_contents($ajax_url);

                    $replace_with = str_replace('<META content="text/html; charset=windows-1251" http-equiv="Content-Type">', '', $replace_with);

                    $styles_start = strpos($replace_with, '<style');
                    $styles_end = strpos($replace_with, '</style>');

                    if ($styles_start !== false) {
                        $styles = mb_substr($replace_with, $styles_start, $styles_end - $styles_start + strlen('</style>'));
                        $replace_with_processed .= $styles;
                    }

                    $body_start = mb_strpos($replace_with, '<body>');
                    $body_end = mb_strpos($replace_with, '</body>');

                    if ($body_start !== false) {
                        $body_start += strlen('<body>');
                        $body = mb_substr($replace_with, $body_start, $body_end - $body_start);
                        $replace_with_processed .= $body;
                    }

                    $content = str_replace($to_replace, $replace_with_processed, $content);
                    $isHaveChanges = true;
                }

                preg_match_all("%href=\"http://(web\.znu\.edu\.ua|tk\.znu\.edu\.ua)/([a-z0-9\:\\\/\.\?\=\&\_\%\-]+)%im", $content, $links);
                preg_match_all("%img src=\"http://(web\.znu\.edu\.ua|tk\.znu\.edu\.ua)/([a-z0-9\:\\\/\.\?\=\&\_\%\-]+)%im", $content, $images);
                preg_match_all("%img align=\"(left|right|center)\" src=\"http://(web\.znu\.edu\.ua|tk\.znu\.edu\.ua)/([a-z0-9\:\\\/\.\?\=\&\_\%\-]+)%im", $content, $images_with_align);

                foreach ($links[2] as $index => $link) {
                    if (strpos($link, '=gallery/photo') !== false) {
                        $fullLink = 'http://' . $links[1][$index] . '/' . $link;
                        $page_content = file_get_contents($fullLink);
                        if (mb_strlen($page_content) === mb_strlen('Галерея не знайдена')) {
                            continue;
                        }
                        preg_match_all("%img src=\"([a-z0-9\:\\\/\.\?\=\&\_\%\-]+)%im", $page_content, $_images);
                        $image = $_images[1][1];
                        $copiedPath = $this->copyFile($image);
                        $originalLink = $links[1][$index] . '/' . $link;
                        $originalLink = str_replace('//', '/', $originalLink);
                        $originalLink = 'http://' . $originalLink;
                        $content = str_replace($originalLink, $copiedPath, $content);
                        $isHaveChanges = true;
                    } else {

                    }
                }

                foreach ($images[2] as $index => $image) {
                    $url = $images[1][$index] . '/' . $image;
                    $url = str_replace('//', '/', $url);
                    $url = 'http://' . $url;
                    $copiedPath = $this->copyFile($url);

                    $to_replace = 'http://' . $images[1][$index] . '/' . $image;
                    $content = str_replace($to_replace, $copiedPath, $content);
                    $isHaveChanges = true;
                }

                foreach ($images_with_align[3] as $index => $image) {
                    $url = $images_with_align[2][$index] . '/' . $image;
                    $url = str_replace('//', '/', $url);
                    $url = 'http://' . $url;
                    $copiedPath = $this->copyFile($url);

                    $to_replace = 'http://' . $images_with_align[2][$index] . '/' . $image;
                    $content = str_replace($to_replace, $copiedPath, $content);
                    $isHaveChanges = true;
                }

                if ($isHaveChanges) {
                    $post->content = $content;
                    $post->save();
                }
            }
        });
        $progressbar->finish();
        $this->output->writeln(PHP_EOL . "Completed");

        return 0;
    }

    protected function copyFile($url) {
        $image = str_replace('http://tk.znu.edu.ua/', '', $url);
        $image = 'public/' . $image;
        $image = str_replace('//', '/', $image);
        $_image = explode('/', $image);
        $filename = array_pop($_image);
        $base_path = storage_path('app');
        $base_path .= '/' . implode('/', $_image);
        if (!is_dir($base_path)) {
            mkdir($base_path, 0777, true);
        }
        chdir($base_path);
        exec("wget {$url} -q -O " . $filename . " > /dev/null", $output);
        $image = str_replace('public/', 'storage/', $image);
        if (!starts_with($image, '/')) {
            $image = '/' . $image;
        }
        return $image;
    }

}
