<?php

namespace App\Console\Commands;

use App\Models\Brand;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Google\Cloud\Translate\V2\TranslateClient;
use Modules\MenuBuilder\Http\Models\MenuItems;

class EditProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cats:translate';

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
        // if (!Schema::hasColumn('brands', 'old_name')) {
        //     Schema::table('brands', function (Blueprint $table) {
        //         $table->string('name_old', 191)->nullable()->after('name');
        //     });
        // }


        // $brands = Brand::all();
        // foreach ($brands as $brand){
        //     $brand->name_old = $brand->name;
        //     $brand->save();

        // }

        // $tags = \App\Models\Tag::all();
        // foreach ($tags as $tag) {
        //     $tag->name_old = $tag->name;

        //     $tag->save();
        // }

        Schema::table('brands', function (Blueprint $table) {
            // remove index from name

            $table->dropColumn('name');
            // check if database has name column
            // if (!Schema::hasColumn('categories', 'name')) {
            //     $table->json('name')->nullable()->after('name_old');
            // }
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->json('name')->nullable()->after('name_old');
        });


        // // move name to name_en
        $brands = Brand::all();

        foreach ($brands as $brand) {

            if ($brand->name_old == null) {
                $brand->delete();
            } else {
                $translate = new TranslateClient([
                    'key' => 'AIzaSyD00WEBISsQvBWV4xV1h3I0frsYcsm4MJw'
                ]);

                $name_trans = $translate->translate($brand->name_old, [
                    'target' => 'ar'
                ]);
                $name_ar = $name_trans['text'];
                $brand->setTranslation('name', 'en', $brand->name_old);
                $brand->setTranslation('name', 'ar', $name_ar);


                $brand->save();
            }
        }
    }
}
