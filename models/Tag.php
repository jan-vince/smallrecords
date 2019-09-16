<?php

namespace JanVince\SmallRecords\Models;

use Str;
use Model;
use URL;
use October\Rain\Router\Helper as RouterHelper;
use Cms\Classes\Page as CmsPage;
use Cms\Classes\Theme;

class Tag extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'janvince_smallrecords_tags';
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $timestamps = true;

    /*
     * Validation
     */
    public $rules = [
        'name' => 'required',
        'slug' => 'required|between:1,64|unique:janvince_smallrecords_tags',
    ];

    public $translatable = [
        'name',
        ['slug', 'index' => true],
        'content',
        'description',
    ];

    protected $guarded = [];


    /**
     * @var array Relations
     */
    public $belongsToMany = [
        'records' => [
            'JanVince\SmallRecords\Models\Record',
            'table' => 'janvince_smallrecords_records_tags'
        ]
    ];

    public $attachMany = [
        'images' => ['System\Models\File', 'delete' => true],
    ];

    public $attachOne = [
        'preview_image' => ['System\Models\File'],
    ];

    public function afterDelete()
    {
        $this->records()->detach();
    }

    /**
     *  SCOPES
     */
    public function scopeIsActive($query) {
        return $query->where('active', '=', true);
    }
}
