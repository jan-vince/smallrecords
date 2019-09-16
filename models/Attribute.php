<?php

namespace JanVince\SmallRecords\Models;

use Str;
use Model;
use URL;
use October\Rain\Router\Helper as RouterHelper;
use Cms\Classes\Page as CmsPage;
use Cms\Classes\Theme;

class Attribute extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'janvince_smallrecords_attributes';
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

	public $timestamps = true;

    /*
     * Validation
     */
    public $rules = [
        'name' => 'required',
        'slug' => 'required|between:1,64|unique:janvince_smallrecords_attributes',
    ];

    public $translatable = [
        'name',
        ['slug', 'index' => true],
        'pivot[value_string]',
        'pivot[value_text]',
    ];

    protected $guarded = [];


	/**
	 * @var array Relations
	 */
	public $belongsToMany = [
		'records' => [
			'JanVince\SmallRecords\Models\Record',
			'table' => 'janvince_smallrecords_records_attributes'
		]
	];

    public function afterDelete()
    {
        $this->records()->detach();
    }

	/**
	 * Get attribute pivot value
	 */
    public function value() {

        if( !empty($this->value_type) ) {
            $valueType = $this->value_type;
        } else {
            return null;
        }

        switch($valueType) {

            case 'number':
                if( isset($this->pivot->value_number) ) {
                    return $this->pivot->value_number;
                }
                break;

            case 'string':
                if( isset($this->pivot->value_string) ) {
                    return $this->pivot->value_string;
                }
                break;

            case 'text':
                if( isset($this->pivot->value_text) ) {
                    return $this->pivot->value_text;
                }
                break;

            case 'switch':
                if( isset($this->pivot->value_boolean) ) {
                    return $this->pivot->value_boolean;
                }
                break;

            default:
                return null;
                break;
        }

        return null;

    }

}
