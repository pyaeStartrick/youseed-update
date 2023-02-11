<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'categories';
    public $timestamps = false;
    protected $dateFormat = 'U';
    protected $guarded = ['id'];

    static $cacheKey = 'categories';

    public $translatedAttributes = ['title'];

    public function getTitleAttribute()
    {
        return getTranslateAttributeValue($this, 'title');
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany($this, 'parent_id', 'id')->orderBy('order', 'asc');
    }

    public function subCategoriesStage()
    {
        return $this->hasMany($this, 'parent_id', 'id')->orderBy('order', 'asc');
    }

    public function filters()
    {
        return $this->hasMany('App\Models\Filter', 'category_id', 'id');
    }

    public function webinars()
    {
        return $this->hasMany('App\Models\Webinar', 'category_id', 'id');
    }

    public function userOccupations()
    {
        return $this->hasMany('App\Models\UserOccupation', 'category_id', 'id');
    }

    public function getUrl()
    {
        $url = '/categories/';

        if (!empty($this->category)) {
            $url .= str_replace(' ', '-', $this->category->title) . '/';
        }

        $url .= str_replace(' ', '-', $this->title);

        return $url;
    }

    static function getCategories()
    {
        $categories = cache()->remember(self::$cacheKey, 24 * 60 * 60, function () {
            return self::whereNull('parent_id')
                ->with([
                    'subCategories' => function ($query) {
                        $query->orderBy('order', 'asc');
                    },
                ])
                ->get();
        });

        return $categories;
    }

    public function getCategoryCourses()
    {
        $webinars = collect([]);
        $subCategories = $this->webinars;
// dd($subCategories);
        // foreach ($subCategories as $category) {
        //     $webinars = $webinars->merge($category->webinars);
        // }

        return $subCategories;
    }

    public function getCategoryInstructorsIdsHasMeeting()
    {
        $ids = [];
        $subCategories = $this->webinars;
        // dd($subCategories);

        // foreach ($subCategories as $category) {
        //     if (count($category->userOccupations)) {
        //         foreach ($category->userOccupations as $occupation) {
        //             if (!empty($occupation->user) and !$occupation->user->isUser() and !$occupation->user->isAdmin()) {
        //                 if (!empty($occupation->user->hasMeeting())) {
        //                     $ids[] = $occupation->user->id;
        //                 }
        //             }
        //         }
        //     }
        // }
        return $subCategories;
    }
}
