<?php return [
    'plugin' => [
        'name' => 'Small records',
        'name_short' => 'Records',
        'name_original' => 'Small records',
        'description' => 'Universal records storage plugin',
    ],

    'common' => [

        'import' => 'Import',
        'export' => 'Export',
        'edit' => 'Edit',
        'desc' => 'Descending',
        'asc' => 'Ascending',

        'menu' => [
            'areas' => 'Lists',
            'area' => 'List',
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
            'testimonials' => 'Testimonials',
            'content_blocks' => 'Content blocks',
            'records' => 'Records',
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
            'preview_image_media' => 'Preview (Media)',
            'images' => 'Images',
            'images_media' => 'Images (Media)',
            'attached_images_count' => 'Images',
            'area' => 'List',
            'category' => 'Main category',
            'category_comment' => 'You can manage items on <a href="'.Backend::url('janvince/smallrecords/categories/index').'">Categories page</a>',
            'tags' => 'Tags',
            'attributes' => 'Attributes',
            'files' => 'Files',
            'categories' => 'Categories',
            'repeater' => 'Information',
            'repeater_prompt' => 'Add new record ...',
            'testimonials' => 'Testimonials',
            'testimonials_prompt' => 'Add new record ...',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
            'created_by' => 'Created by',
            'updated_by' => 'Updated by',
            'sort_order' => 'Custom order',
            'author' => 'Author',
        ],

        'fields' => [
            'empty_option' => 'Not selected ...',
        ],

        'buttons' => [
            'reorder' => 'Reorder',
            'back_to_list' => 'Back to list',
            'create_and_new' => 'Create and NEW',
            'update_and_new' => 'Save and NEW',
        ],

        'import_settings' => [
            'truncate_table' => 'Empty table before import',
            'truncate_table_description' => 'Delete all categories and reset autoincrement',
            'delete_relations' => 'Delete records relations to categories',
            'delete_relations_description' => 'Delete all record\'s relations to categories',
        ],

    ],

    'areas' => [
        'new_area' => 'New records list',
        'menu_label' => 'Records lists',

        'import' => [
            'import_records' => 'Import records',
            'export_records' => 'Export records',
            'area_id_description' => 'You can export data only from a specific List',
            'area_id_empty_option' => '-- All records --',
        ],

        'columns' => [
            'allowed_fields' => 'Available records fields',
            'allowed_fields_comment' => 'Checked fields will be visible in records editing form. This list is long so scroll down! <br><em>Some fields will be visible after you create a record (they are dependent on record\'s ID)!</em>',

            'custom_repeater_allow' => 'Allow custom form fields blocks',
            'custom_repeater_tab_title' => 'Custom form fields tab title',
            'custom_repeater_prompt' => 'Custom form fields "Add new item" custom prompt',
            'custom_repeater_min_items' => 'Custom form fields minimum required items',
            'custom_repeater_max_items' => 'Custom form fields maximum allowed items',

            'custom_repeater' => [
                'repeater_prompt' => 'Add field',
                'field_type' => 'Field type',
                'field_name' => 'Field name',
                'field_name_comment' => 'Field name like: my_record_name. You will use this in Twig to access field value.',
                'field_label' => 'Field label',
                'field_span' => 'Field span',
                'field_mode' => 'Mode',
                'field_size' => 'Size',
                'options' => [
                    'text' => 'Text',
                    'textarea' => 'Text area',
                    'richeditor' => 'Richtext editor',
                    'number' => 'Number',
                    'checkbox' => 'Checkbox',
                    'mediafinder' => 'Mediafinder',
                    'section' => 'Section',
                    'left' => 'Left',
                    'right' => 'Right',
                    'full' => 'Full',
                    'file' => 'File',
                    'image' => 'Image',
                    'tiny' => 'Tiny',
                    'small' => 'Small',
                    'large' => 'Large',
                    'huge' => 'Huge',
                    'giant' => 'Giant',
                    'empty_option' => 'Select ...'
                ]
            ],
        ],

        'tabs' => [
            'custom_repeater' => 'Custom form fields',
        ]
    ],

    'records' => [
        'menu_label' => 'Records',
        'return_to_records' => 'Return to Records',
        'reordering_description' => 'Use "Custom order" in components\'s sorting option.',
        'reorder' => 'Custom order',

        'images_media' => [
            'image' => 'Image',
            'title' => 'Title',
            'description' => 'Description',
        ],

        'repeater' => [
            'repeater_prompt' => 'Add item ...',
            'value1' => 'Value 1',
            'value2' => 'Value 2',
            'value3' => 'Value 3',
            'value4' => 'Value 4',
            'text' => 'Text',
        ],

        'testimonials' => [
            'title' => 'Title',
            'image' => 'Image',
            'author' => 'Author',
            'date' => 'Date',
            'content' => 'Content',
        ],

        'content_blocks' => [
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'image' => 'Image',
            'author' => 'Author',
            'date' => 'Date',
            'content' => 'Content',
            'preview_image' => 'Preview image',
            'description' => 'Description',
            'code' => 'Code',
            'disable' => 'Disable',
            'favourite' => 'Favourite',
        ],

        'scoreboard' => [
            'records_count' => 'Records count',
            'records_active' => 'Active',
            'records_hidden' => 'Hidden',
            'records_favourite' => 'Favourite',
            'records_common' => 'Common',
            'latest_record' => 'Latest',
            'latest_record_date' => 'Created: ',
            'active_area' => '{0} records in | {1} record in | [2,Inf[ %count% records in',
        ]

    ],

    'categories' => [
        'menu_label' => 'Categories',
        'category' => 'Category',
        'new_category' => 'New category',
        'return_to_categories' => 'Return to Categories',
        'secondary_categories' => 'More categories',
        'delete_confirm' => 'Do you really want to delete this category?',

        'columns' => [
            'main_category' => 'Main category',
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

        'common' => [
            
            'properties' => [
                'active_only' => 'Active',
                'active_only_description' => 'Filter only active records',
                'active_records_only' => 'Active records',
                'active_records_only_description' => 'Filter with active records only',
                'favourite_only' => 'Favourite',
                'favourite_only_description' => 'Get only favourite records (unchecked will get all records)',
                'root_categories_only' => 'Root categories only',
                'root_categories_only_description' => 'Return only root categories',

                'area_slug' => 'Filter records by list',
                'area_slug_description' => 'Select a List to get records from',
                'category_slug' => 'Category slug',
                'category_slug_description' => 'Filter with dynamic URL parameter like ":category" or manually entered like "my-category".',
                'record_slug' => 'Record slug',
                'record_slug_description' => 'Filter with dynamic URL parameter like ":record" or manually entered like "my-record".',
                'tag_slug' => 'Tag slug',
                'tag_slug_description' => 'Filter with dynamic URL parameter like ":tag" or manually entered like "my-tag".',
                'page_slug' => 'Page pagination slug',
                'page_slug_description' => 'Filter with dynamic URL parameter like ":page" or manually entered like "1".',
                'parent_category_slug' => 'Parent category slug',
                'parent_category_slug_description' => 'Filter with dynamic URL parameter like ":parent-category" or manually entered like "my-parent_category".',

                'record_page' => 'Record page name',
                'record_page_description' => 'Enter name of CMS page where you want to render a single record (eg. "record")',
                'record_page_slug' => 'Record page slug',
                'record_page_slug_description' => 'Enter URL parameter name used on the single record page (eg. "slug" for page URL like /record/:slug).',

                'category_page' => 'Category page name',
                'category_page_description' => 'Enter name of CMS page where you want to render single category (eg. "category")',
                'category_page_slug' => 'Category page slug',
                'category_page_slug_description' => 'Enter URL parameter name used on the single category page (eg. ":category" for page URL like /category/:category).',
                'categories_page' => 'Categories page name',
                'categories_page_description' => 'Enter name of CMS page where you want to render categories list (eg. "categories")',
                'categories_page_slug' => 'Categories page slug',
                'categories_page_slug_description' => 'Enter URL slug name used on the categories page (eg. ":category" for page URL like /records/:category).',

                'tag_page' => 'Tag page name',
                'tag_page_description' => 'Enter name of CMS page where you want to render single tag (eg. "tag")',
                'tag_page_slug' => 'Tag page slug',
                'tag_page_slug_description' => 'Enter URL parameter name used on the single tag page (eg. ":tag" for page URL like /tag/:tag).',
                'tags_page' => 'Tags page name',
                'tags_page_description' => 'Enter name of CMS page where you want to render tags list (eg. "tags")',
                'tags_page_slug' => 'Tags page slug',
                'tags_page_slug_description' => 'Enter URL slug name used on the tags page (eg. ":tag" for page URL like /records/:tag).',

                'use_main_category' => 'Filter by main category',
                'use_main_category_description' => 'If category slug is set, return only record with this main category assigned.',
                'use_multicategories' => 'Filter by secondary category',
                'use_multicategories_description' => 'If category slug is set, return only record with this secondary category assigned.',

                'order_by' => 'Order by',
                'order_by_direction' => 'Order by direction',
                'order_as_collection' => 'Order as collection',
                'order_as_collection_description' => 'Get all data in collection and sort it. Usefull when database cannot order data correctly in current locale.',

                'allow_limit' => 'Limit number or records',
                'allow_limit_description' => 'If checked, only required number of records will be returned. Also a pagination will be allowed.',
                'limit' => 'Number of returned records',
                'limit_description' => 'How many records will be returned.',

                'throw404' => '404 error on error',
                'throw404_description' => 'Return 404 error when any record has not been found.',
                'set_page_meta' => 'Set page meta properties',
                'set_page_meta_description' => 'page_title, meta_title and meta_description will be set from record name and description.',
            ],

            'forms' => [
                'empty_option' => 'Not selected',
            ],

            'groups' => [
                'links' => 'Links',
                'order' => 'Order by',
                'limit' => 'Limit',
                'filter_area' => 'Filter by List',
                'filter_category' => 'Filter by Category',
                'filter_tag' => 'Filter by Tag',
                'filter_records' => 'Filter by Records',
                'seo' => 'SEO',
            ],            
        ],

        'records' => [
            'name' => 'Records',
            'description' => 'Get list of records',
        ],

        'record' => [
            'name' => 'Record',
            'description' => 'Get one specific record',
        ],

        'categories' => [
            'name' => 'Categories',
            'description' => 'Get list of categories',

            'properties' => [
                'category_slug_description' => 'Set dynamic URL parameter like ":category" or manually entered like "my-category". This can be used eg. to set active category in categories menu.',
            ],
        ],

        'category' => [
            'name' => 'Category',
            'description' => 'Get one specific category',
        ],

        'tags' => [
            'name' => 'Tags',
            'description' => 'Get list of tags',

            'properties' => [
                'tag_slug_description' => 'Set dynamic URL parameter like ":tag" or manually entered like "my-tag". This can be used eg. to set active tag in tags menu.',
            ],
        ],

        'tag' => [
            'name' => 'Tag',
            'description' => 'Get one specific tag',
        ],
    ],

    'permissions' => [
        'tab_name' => 'Small records permissions',
        'access_areas' => 'Access Lists',
        'access_area' => '> Access to list ',
        'access_records' => 'Access Records',
        'access_categories' => 'Access Categories',
        'access_attributes' => 'Access Attributes',
        'access_settings' => 'Access Settings',
        'access_tags' => 'Access Tags',
        'access_denied' => 'Access denied',
    ],

    'settings' => [
        'main_section' => 'Small records settings',
        'main_section_comment' => 'Some settings for Small records plugin',

        'tabs' => [
            'lists' => 'Lists',
            'connections' => 'Connections',
        ],

        'fields' => [
            'preview_width' => 'Image width for Preview image column',
            'preview_height' => 'Image height for Preview image column',
            'connections_section_blog' => '(Rainlab) Blog',
            'connections_section_pages' => '(Rainlab) Static pages',
            'allow_records_in_blog_posts' => 'Allow records in Blog posts',
            'allow_records_in_blog_posts_comment' => 'Show records list in blog posts (Rainlab.Blog plugin must be installed)',
            'allow_records_in_blog_posts_area' => 'Show records from List',

            'allow_records_in_pages' => 'Allow records in Static pages',
            'allow_records_in_pages_comment' => 'Show records list in static page (Rainlab.Pages plugin must be installed)',
            'allow_records_in_pages_area' => 'Show records from List',
        ],
    ]
];
