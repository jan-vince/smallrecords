<?php

namespace JanVince\SmallRecords\Models;

use Model;

class Settings extends Model
{

    public $implement = [
        'System.Behaviors.SettingsModel',
        '@RainLab.Translate.Behaviors.TranslatableModel',
    ];

    public $translatable = [];

    public $requiredPerrmision = ['janvince.smallrecords.settings'];

    public $settingsCode = 'janvince_smallrecords_settings';

    public $settingsFields = 'fields.yaml';

    protected $jsonable = [];

}
