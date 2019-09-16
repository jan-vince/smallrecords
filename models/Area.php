<?php namespace JanVince\SmallRecords\Models;

use Str;
use Model;
use URL;
use October\Rain\Router\Helper as RouterHelper;
use Cms\Classes\Page as CmsPage;
use Cms\Classes\Theme;

class Area extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'janvince_smallrecords_areas';

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $timestamps = true;

    protected $guarded = [];

    protected $jsonable = ['allowed_fields', 'custom_repeater_fields'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /*
     * Validation
     */
    public $rules = [
        'name' => 'required',
        'slug' => 'required|between:1,64|unique:janvince_smallrecords_categories',
    ];

    public $translatable = [
        'name',
        ['slug', 'index' => true],
        'custom_repeater_tab_title',
        'custom_repeater_fields',
        'custom_repeater_prompt',
    ];


    /**
     * @var array Relations
     */
    public $hasMany = [
        'records' => [
            'JanVince\SmallRecords\Models\Record', 'delete' => true
        ]
    ];

    /**
     *  SCOPES
     */
    public function scopeIsActive($query) {
        return $query->where('active', '=', true);
    }

}
