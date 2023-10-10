<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use Cache;
use App\Traits\ModelTraits\hasFiles;
use Exception;
use Modules\MediaManager\Http\Models\ObjectFile;
use Spatie\Translatable\HasTranslations;


class Tag extends Model
{
    use ModelTrait, hasFiles, HasTranslations;

    public $translatable = ['name',];

    protected $fillable = ['name', 'vendor_id', 'status', 'name_old'];

    /**
     * Relation with ProductTag model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productTag()
    {

        return $this->hasMany('App\Models\ProductTag', 'tag_id', 'id');
    }

    public function image()
    {
        return $this->hasOne('App\Models\File', 'object_id')->where('object_type', 'Tag');
    }


    /**
     * Store
     *
     * @param $data
     * @return false
     */
    public function store($data = [])
    {
        $locale = app()->getLocale();
        // if (request()->has('name')) {
        //     $data['name'] = request()->name;
        // }

        $id =
            $this->create($data)->id;
        $fileIds = [];

        if (request()->has('file_id')) {
            foreach (request()->file_id as $data) {
                $fileIds[] = $data;
            }
        }



        ObjectFile::storeInObjectFiles($this->objectType(), $this->objectId(), $fileIds);


        if (!empty($id)) {
            self::forgetCache();

            return $id;
        }

        return false;
    }
    public function updateTag($data = [], $id = null)
    {

        $locale = app()->getLocale();
        $result = $this->where('id', $id);

        if ($result->exists()) {


            $result->update($data);

            if (request()->file_id) {
                $result->first()->updateFiles(['isUploaded' => false, 'isOriginalNameRequired' => true]);
            } else {
                $result->first()->deleteFromMediaManager();
            }

            self::forgetCache();

            return true;
        }

        return false;
    }
    public function remove($id = null)
    {
        $data = ['status' => 'fail', 'message' => __('Something went wrong, please try again.')];
        $record = parent::find($id);

        if (!empty($record)) {
            try {
                $record->delete();
                #delete file region
                $record->deleteFiles();
                $data['status'] = 'success';
                $data['message'] = __('The :x has been successfully deleted.', ['x' => __('Brand')]);
            } catch (Exception $e) {
                $data['message'] = $e->getMessage();
            }
        }

        return $data;
    }
}
