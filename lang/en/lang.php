<?php return [
    'plugin' => [
        'name' => 'Small records',
        'name_short' => 'Records',
        'name_original' => 'Small records',
        'description' => 'Universal records storage plugin',
    ],

    'common' => [

        'menu' => [
            'areas' => 'Records lists',
            'area' => 'Records list',
        ],

        'tabs' => [
            'info' => 'Info',
            'images' => 'Images',
            'content' => 'Content',
            'fields' => 'Fields',
            'notes' => 'Notes',
            'tags' => 'Tags',
            'attributes' => 'Attributes',
            'attachments' => 'Attachments',
            'secondary_categories' => 'Categories',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'active' => 'Active',
            'favourite' => 'Favourite',
            'date' => 'Date',
            'url' => 'URL',
            'description' => 'Description',
            'content' => 'Content',
            'preview_image' => 'Preview image',
            'images' => 'Images',
            'attached_images_count' => 'Images',
            'area' => 'Records list',
            'category' => 'Category',
            'category_comment' => 'You can manage items on <a href="'.Backend::url('janvince/smallrecords/categories/index').'">Categories page</a>',
            'tags' => 'Tags',
            'attributes' => 'Attributes',
            'files' => 'Files',
            'categories' => 'Categories',
            'repeater' => 'Repeater',
            'repeater_prompt' => 'Add new record ...',
            'created_at' => 'Created',
            'updated_at' => 'Updated',
        ],

        'fields' => [
            'empty_option' => 'Not selected ...',
        ],

        'buttons' => [
            'reorder' => 'Reorder',
            'back_to_list' => 'Back to list',
        ],

    ],

    'areas' => [
        'new_area' => 'New records list',
        'menu_label' => 'Records lists',

        'columns' => [
            'allowed_fields' => 'Available records fields',
            'allowed_fields_comment' => 'Checked fields will be visible in records editing form. This list is long so scroll down! <br><em>Some field will be visible after you create a record (they are dependent on record\'s ID)!</em>',
        ],

    ],

    'records' => [
        'menu_label' => 'Records',

        'repeater' => [
            'repeater_prompt' => 'Add item ...',
            'value1' => 'Value 1',
            'value2' => 'Value 2',
            'value3' => 'Value 3',
            'value4' => 'Value 4',
            'text' => 'Text',
        ],

        'scoreboard' => [
            'records_count' => 'Records count',
            'records_active' => 'Active',
            'records_hidden' => 'Hidden',
            'records_favourite' => 'Favourite',
            'records_common' => 'Common',
            'latest_record' => 'Latest',
            'latest_record_date' => 'Created: ',
            'active_area' => '{0} records in|{1} record in|[2,Inf[ %count% records in',
        ]

    ],

    'categories' => [
        'menu_label' => 'Categories',
        'category' => 'Category',
        'new_category' => 'New category',
        'return_to_categories' => 'Return to Categories',
        'category' => 'Category',
        'secondary_categories' => 'More categories',
        'import' => 'Import',
        'export' => 'Export',

        'categoryimport' => [
            'truncate_table' => 'Empty table before import',
            'truncate_table_description' => 'Delete all categories and reset autoincrement',
            'delete_relations' => 'Delete records relations to categories',
            'delete_relations_description' => 'Delete all record\'s relations to categories',
        ],

        'columns' => [
            'main_category' => 'Category',
            'parent' => 'Parent category',
            'parent_comment' => 'You can change hierarchy and order on <a href="'.Backend::url('janvince/smallrecords/categories/reorder').'">Reorder page</a>',
        ],

        'tabs' => [
            'secondary_categories' => 'Secondary categories',
            'secondary_categories_comment' => 'Records can have one main category and many secondary categories',
        ]

    ],

    'attributes' => [
        'menu_label' => 'Attributes',
        'new_attribute' => 'New attribute',
        'attribute' => 'Attribute',
        'return_to_attributes' => 'Return to Attributes',

        'columns' => [
            'name' => 'Name',
            'slug' => 'Slug',
            'value_text' => 'Text',
            'value_number' => 'Number',
            'value_boolean' => 'State',
            'value_switch' => 'Switch (Yes/No)',
            'value_type' => 'Type of value data',
            'value_type_comment' => 'Based on selected data type, correct input field will be shown in relation form',
            'value_string' => 'String',
        ],

        'tabs' => [
            'attributes' => 'Attributes',
            'attributes_comment' => 'You can assign attributes and add their values',

        ],


    ],

    'tags' => [
        'menu_label' => 'Tags',
        'return_to_tags' => 'Return to Tags',
        'new_tag' => 'New Tag',
        'tag' => 'Tag',
        'reorder' => 'Reorder',

        'columns' => [
            'name' => 'Name',
            'slug' => 'Slug',
            'description' => 'Description',
            'value' => 'Value',
            'icon' => 'Icon',
        ],

        'tabs' => [
            'tags' => 'Tags'
        ]

    ],

    'forms' => [
        'reorder' => 'Reorder',
        'delete_attached_images' => 'Delete all attached images',
        'delete_attached_images_confirm' => 'Really delete all attached images on tab Images?',
        'deleting_attached_images' => 'Deleting all attached images ...',
    ],

    'components' => [

        'records' => [
            'name' => 'Records list',
            'description' => 'Get records of selected records list',

            'properties' => [
                'area' => 'Records list',
                'area_description' => 'Select a Records list to get records from',
                'category' => 'Category slug',
                'category_description' => 'Category slug (dynamic like :category or manually entered)',
                'active_only' => 'Active records only',
                'active_only_description' => 'Get only active records (unchecked will get all records)',
                'detail_page_slug' => 'Detail page slug',
                'detail_page_slug_description' => 'Enter a slug of CMS page where you want to render a record\'s details',

                'groups' => [
                    'links' => 'Links',
                ],

            ],

        ],

        'record' => [
            'name' => 'Record',
            'description' => 'Get one specific record',

            'properties' => [
                'record_slug' => 'Record slug',
                'record_slug_description' => 'Enter a slug of specific record',
            ],

        ],


    ],

    'permissions' => [
        'tab_name' => 'Small records permissions',
        'access_areas' => 'Access records lists',
        'access_area' => '> Access to list ',
        'access_records' => 'Access records',
        'access_categories' => 'Access categories',
        'access_attributes' => 'Access attributes',
        'access_settings' => 'Access settings',
        'access_tags' => 'Access tags',
        'access_denied' => 'Access denied',
    ],

    'settings' => [
        'main_section' => 'Small records settings',
        'main_section_comment' => 'Some settings for Small records plugin',

        'tabs' => [
            'lists' => 'Lists',
        ],

        'fields' => [
            'preview_width' => 'Image width for Preview image column',
            'preview_height' => 'Image height for Preview image column',
        ],

    ]

];
