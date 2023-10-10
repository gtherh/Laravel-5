<?php

namespace App\Console\Commands;

use App\Models\File;
use Illuminate\Console\Command;
use Modules\MediaManager\Http\Models\ObjectFile;

class AddTagPic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-random-pic-to-tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $tags = \App\Models\Tag::all();
        $files = File::all();
        foreach ($tags as $tag) {
            $file = $files->random();
            ObjectFile::storeInObjectFiles('Brand', $tag->id, [$file->id]);
        }
    }
}
