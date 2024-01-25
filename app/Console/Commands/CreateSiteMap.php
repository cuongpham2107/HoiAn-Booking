<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

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
     * @return int
     */
    public function handle()
    {
        // create new sitemap object
        $sitemap = \App::make("sitemap");

        // add items to the sitemap (url, date, priority, freq)
        $sitemap->add(\URL::to('/'), Carbon::now()->toDateTimeString(), '1.0', 'weekly');

        // page in home
        $sitemap->add(\URL::to('/about'), Carbon::now()->toDateTimeString(), '0.9', 'weekly');
        $sitemap->add(\URL::to('/contact'), Carbon::now()->toDateTimeString(), '0.9', 'weekly');

        $sitemap->add(\URL::to('/services'), Carbon::now()->toDateTimeString(), '0.9', 'weekly');
            $services = \DB::table('services')->get();
            foreach ($services as $service) {
                $sitemap->add(\URL::to('/') . "/services/{$service->slug}", $service->updated_at, '0.7', 'weekly');
            }

        $sitemap->add(\URL::to('/products'), Carbon::now()->toDateTimeString(), '0.9', 'weekly');
            $products = \DB::table('products')->orderBy('created_at', 'desc')->get();
            foreach ($products as $product) {
                $sitemap->add(\URL::to('/') . "/product/{$product->slug}", $product->updated_at, '0.7', 'weekly');
            }

        $sitemap->add(\URL::to('/posts'), Carbon::now()->toDateTimeString(), '0.9', 'weekly');
            $posts = \DB::table('posts')->where('status', 'published')->orderBy('created_at', 'desc')->get();
            foreach ($posts as $post) {
                $sitemap->add(\URL::to('/') . "/posts/{$post->slug}", $post->updated_at, '0.7', 'weekly');
            }

            $categories = \DB::table('categories')->orderBy('created_at', 'desc')->get();
            foreach ($categories as $category) {
                $sitemap->add(\URL::to('/') . "/category-post/{$category->id}", $category->updated_at, '0.9', 'weekly');
            }

            $tags = \DB::table('post_tags')->orderBy('created_at', 'desc')->get();
            foreach ($tags as $tag) {
                $sitemap->add(\URL::to('/') . "/tag-post?tag={$tag->id}", $tag->updated_at, '0.9', 'weekly');
            }

        // generate your sitemap (format, filename)
        $sitemap->store('xml', 'sitemap');


    }
}
