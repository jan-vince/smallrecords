<?php return [
    'plugin' => [
        'name' => 'Записи',
        'name_short' => 'Записи',
        'name_original' => 'Small records',
        'description' => 'Универсальный плагин для управления записями',
    ],

    'common' => [

        'import' => 'Импорт',
        'export' => 'Экспорт',
        'edit' => 'Редактировать',
        'desc' => 'По убыванию',
        'asc' => 'По возрастанию',

        'menu' => [
            'areas' => 'Списки',
            'area' => 'Список',
        ],

        'tabs' => [
            'info' => 'Инфо',
            'images' => 'Изображения',
            'content' => 'Контент',
            'fields' => 'Поля',
            'notes' => 'Заметки',
            'tags' => 'Теги',
            'attributes' => 'Атрибуты',
            'attachments' => 'Файлы',
            'secondary_categories' => 'Категории',
            'testimonials' => 'Отзывы',
            'content_blocks' => 'Контент блоки',
            'records' => 'Записи',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Имя',
            'slug' => 'Слаг',
            'active' => 'Активно',
            'favourite' => 'В избранном',
            'date' => 'Дата',
            'url' => 'URL',
            'description' => 'Описание',
            'content' => 'Контент',
            'preview_image' => 'Превью',
            'preview_image_media' => 'Превью (Медиа)',
            'images' => 'Изображения',
            'images_media' => 'Изображения (Медиа)',
            'attached_images_count' => 'Изображений',
            'area' => 'Список',
            'category' => 'Основная категория',
            'category_comment' => 'Вы можете управлять предметами на <a href="'.Backend::url('janvince/smallrecords/categories/index').'">Странице Категорий</a>',
            'tags' => 'Теги',
            'attributes' => 'Атрибуты',
            'files' => 'Файлы',
            'categories' => 'Категории',
            'repeater' => 'Информация',
            'repeater_prompt' => 'Добавить запись ...',
            'testimonials' => 'Отзывы',
            'testimonials_prompt' => 'Добавить запись ...',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'created_by' => 'Создал',
            'updated_by' => 'Обновил',
            'sort_order' => 'Заданный порядок',
            'author' => 'Автор',
        ],

        'fields' => [
            'empty_option' => 'Не выбрано ...',
        ],

        'buttons' => [
            'reorder' => 'Изменить порядок',
            'back_to_list' => 'Вернуться к списку',
            'create_and_new' => 'Создать и NEW',
            'update_and_new' => 'Сохранить и NEW',
        ],

        'import_settings' => [
            'truncate_table' => 'Очистить таблицу перед импортом',
            'truncate_table_description' => 'Удалить все категории и сбросить autoincrement',
            'delete_relations' => 'Удалить отношения записей к категориям',
            'delete_relations_description' => 'Удалить все отношения записи к категориям',
        ],

    ],

    'areas' => [
        'new_area' => 'Новый список записей',
        'menu_label' => 'Списки записей',

        'import' => [
            'import_records' => 'Импортировать записи',
            'export_records' => 'Экспортировать записи',
            'area_id_description' => 'Вы можете экспортировать данные только из конкретного Списка',
            'area_id_empty_option' => '-- Все записи --',
        ],

        'columns' => [
            'allowed_fields' => 'Доступные поля записей',
            'allowed_fields_comment' => 'Отмеченные поля будут видны в форме редактирования записей. Этот список длинный, поэтому прокрутите его вниз! <br> <em> Некоторые поля будут видны после создания записи (они зависят от ID записи)! </em>',

            'custom_repeater_allow' => 'Включить настраиваемые формы',
            'custom_repeater_tab_title' => 'Заголовок вкладки настраиваемых форм',
            'custom_repeater_prompt' => 'Надпись на кнопке добавления нового предмета',
            'custom_repeater_min_items' => 'Минимальное количество предметов в настраиваемых формах',
            'custom_repeater_max_items' => 'Максимальное количество предметов в настраиваемых формах',

            'custom_repeater' => [
                'repeater_prompt' => 'Добавить поле',
                'field_type' => 'Тип поля',
                'field_name' => 'Имя поля',
                'field_name_comment' => 'Имя поля навроде: my_record_name. Используется для получения доступа к значению этого поля из Twig.',
                'field_label' => 'Лейбл поля',
                'field_span' => 'Расположение поля',
                'field_mode' => 'Режим',
                'field_size' => 'Размер',
                'options' => [
                    'text' => 'Текст',
                    'textarea' => 'Текстовая область',
                    'richeditor' => 'Richtext редактор',
                    'number' => 'Число',
                    'checkbox' => 'Чекбокс',
                    'mediafinder' => 'Mediafinder',
                    'section' => 'Секция',
                    'left' => 'Слева',
                    'right' => 'Справа',
                    'full' => 'На всю ширину',
                    'file' => 'File',
                    'image' => 'Изображение',
                    'tiny' => 'Крошечный',
                    'small' => 'Маленький',
                    'large' => 'Большой',
                    'huge' => 'Огромный',
                    'giant' => 'Гигантский',
                    'empty_option' => 'Выбрать ...'
                ]
            ],
        ],

        'tabs' => [
            'custom_repeater' => 'Настраиваемые формы',
        ]
    ],

    'records' => [
        'menu_label' => 'Записи',
        'return_to_records' => 'Вернуться к Записям',
        'reordering_description' => 'Используйте "Изменить порядок" в опции сортировки компонента.',
        'reorder' => 'Изменить порядок',

        'images_media' => [
            'image' => 'Изображение',
            'title' => 'Заголовок',
            'description' => 'Описание',
        ],

        'repeater' => [
            'repeater_prompt' => 'Добавить ...',
            'value1' => 'Значение 1',
            'value2' => 'Значение 2',
            'value3' => 'Значение 3',
            'value4' => 'Значение 4',
            'text' => 'Текст',
        ],

        'testimonials' => [
            'title' => 'Заголовок',
            'image' => 'Изображение',
            'author' => 'Автор',
            'date' => 'Дата',
            'content' => 'Контент',
        ],

        'content_blocks' => [
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'image' => 'Изображение',
            'author' => 'Автор',
            'date' => 'Дата',
            'content' => 'Контент',
            'preview_image' => 'Превью',
            'description' => 'Описание',
            'code' => 'Код',
            'disable' => 'Отключить',
            'favourite' => 'Избранное',
        ],

        'scoreboard' => [
            'records_count' => 'Количество записей',
            'records_active' => 'Активно',
            'records_hidden' => 'Скрыто',
            'records_favourite' => 'Избранное',
            'records_common' => 'Общее',
            'latest_record' => 'Последнее',
            'latest_record_date' => 'Создано: ',
            'active_area' => '{0} записей в|{1} запись в|[2,Inf[ %count% записей в',
        ]

    ],

    'categories' => [
        'menu_label' => 'Категории',
        'category' => 'Категория',
        'new_category' => 'Новая категория',
        'return_to_categories' => 'Вернуться к Категориям',
        'category' => 'Категория',
        'secondary_categories' => 'Больше категорий',
        'delete_confirm' => 'Вы действительно хотите удалить эту категорию?',

        'columns' => [
            'main_category' => 'Основная категория',
            'parent' => 'Родительская категория',
            'parent_comment' => 'Вы можете изменить иерархию и порядок на <a href="'.Backend::url('janvince/smallrecords/categories/reorder').'">Изменить порядок</a>',
        ],

        'tabs' => [
            'secondary_categories' => 'Дополнительные категории',
            'secondary_categories_comment' => 'Записи могут иметь одну основную категорию и множество дополнительных.',
        ]

    ],

    'attributes' => [
        'menu_label' => 'Атрибуты',
        'new_attribute' => 'Новый аттрибут',
        'attribute' => 'Атрибут',
        'return_to_attributes' => 'Вернуться к Атрибутам',

        'columns' => [
            'name' => 'Имя',
            'slug' => 'Слаг',
            'value_text' => 'Текст',
            'value_number' => 'Число',
            'value_boolean' => 'Состояние',
            'value_switch' => 'Свич (Да/Нет)',
            'value_type' => 'Тип данных значения',
            'value_type_comment' => 'В зависимости от выбранного типа данных правильное поле ввода будет отображаться в форме отношения',
            'value_string' => 'Строка',
        ],

        'tabs' => [
            'attributes' => 'Атрибуты',
            'attributes_comment' => 'Вы можете назначать атрибуты и добавлять их значения',

        ],


    ],

    'tags' => [
        'menu_label' => 'Теги',
        'return_to_tags' => 'Вернуться к Тегам',
        'new_tag' => 'Новый Тег',
        'tag' => 'Тег',
        'reorder' => 'Изменить порядок',

        'columns' => [
            'name' => 'Имя',
            'slug' => 'Слаг',
            'description' => 'Описание',
            'value' => 'Значение',
            'icon' => 'Иконка',
        ],

        'tabs' => [
            'tags' => 'Теги'
        ]

    ],

    'forms' => [
        'reorder' => 'Изменить порядок',
        'delete_attached_images' => 'Удалить все вложенные изображения',
        'delete_attached_images_confirm' => 'Действительно удалить все вложенные изображения на вкладке Изображения?',
        'deleting_attached_images' => 'Удаление всех вложенных изображений ...',
    ],

    'components' => [

        'common' => [
            
            'properties' => [
                'active_only' => 'Активные',
                'active_only_description' => 'Отфильтровать только активные записи.',
                'active_records_only' => 'Активные записи',
                'active_records_only_description' => 'Отфильтровать только с активными записями.',
                'favourite_only' => 'В избранном',
                'favourite_only_description' => 'Получить только избранные записи (будучи невыбранным возвращает все записи).',
                'root_categories_only' => 'Только корневые категории',
                'root_categories_only_description' => 'Возвращает только корневые категории.',

                'area_slug' => 'Фильтр по списку',
                'area_slug_description' => 'Выбрать Список из которого возвращаются записи.',
                'category_slug' => 'Слаг категории',
                'category_slug_description' => 'Отфильтровать по динамическому URL параметру, такому как ":category", или по введённому вручную, такому как "my-category".',
                'record_slug' => 'Слаг записи',
                'record_slug_description' => 'Отфильтровать по динамическому URL параметру, такому как ":record", или по введённому вручную, такому как "my-record".',
                'tag_slug' => 'Слаг тега',
                'tag_slug_description' => 'Отфильтровать по динамическому URL параметру, такому как ":tag", или по введённому вручную, такому как "my-tag".',
                'page_slug' => 'Слаг страничной пагинации',
                'page_slug_description' => 'Отфильтровать по динамическому URL параметру, такому как ":page", или по введённому вручную, такому как "1".',
                'parent_category_slug' => 'Слаг родительской категории',
                'parent_category_slug_description' => 'Отфильтровать по динамическому URL параметру, такому как ":parent-category", или по введённому вручную, такому как "my-parent_category".',

                'record_page' => 'Имя страницы записи',
                'record_page_description' => 'Введите имя CMS страницы на которой хотите отобразить запись (например "record").',
                'record_page_slug' => 'Слаг страницы записи',
                'record_page_slug_description' => 'Введите имя URL параметра используемого на странице записи (например "slug" для URL страницы навроде /record/:slug).',

                'category_page' => 'Имя страницы категории',
                'category_page_description' => 'Введите имя CMS страницы на которой хотите отобразить категорию (например "category").',
                'category_page_slug' => 'Слаг страницы категории',
                'category_page_slug_description' => 'Введите имя URL параметра используемого на странице категории (например ":category" для URL страницы навроде /category/:category).',
                'categories_page' => 'Имя страницы категорий',
                'categories_page_description' => 'Введите имя CMS страницы на которой хотите отобразить список категорий (например "categories").',
                'categories_page_slug' => 'Слаг страницы категорий',
                'categories_page_slug_description' => 'Введите URL слаг используемый на странице категорий (например ":category" для URL страницы навроде /records/:category).',

                'tag_page' => 'Имя страницы тега',
                'tag_page_description' => 'Введите имя CMS страницы на которой хотите отобразить тег (например "tag").',
                'tag_page_slug' => 'Слаг страницы тега',
                'tag_page_slug_description' => 'Введите имя параметра URL используемое на странице тега (например ":tag" для URL страницы навроде /tag/:tag).',
                'tags_page' => 'Имя страницы тегов',
                'tags_page_description' => 'Введите имя CMS страницы на которой хотите отобразить список тегов (например "tags").',
                'tags_page_slug' => 'Слаг страницы тегов',
                'tags_page_slug_description' => 'Введите URL слаг используемый на странице тегов (например ":tag" для URL страницы навроде /records/:tag).',

                'use_main_category' => 'Фильтр по осн. категории',
                'use_main_category_description' => 'Если установлен слаг категории, возвращать только запись с назначенной этой основной категорией.',
                'use_multicategories' => 'Фильтр по доп. категории',
                'use_multicategories_description' => 'Если установлен слаг категории, возвращать только запись с назначенной этой вторичной категорией.',

                'order_by' => 'Упорядочить по',
                'order_by_direction' => 'По направлению',
                'order_as_collection' => 'Как коллекцию',
                'order_as_collection_description' => 'Получить все данные в коллекции и отсортировать их. Полезно, когда база данных не может правильно упорядочить данные в текущей локали.',

                'allow_limit' => 'Ограничить кол-во записей',
                'allow_limit_description' => 'Если выбрано, только указанное количество записей будет возвращено. Также будет разрешена пагинация.',
                'limit' => 'Вернуть штук',
                'limit_description' => 'Как много записей будет возвращено.',

                'throw404' => '404 error на ошибку',
                'throw404_description' => 'Вернуть ошибку 404 если какая-либо запись не была найдена.',
                'set_page_meta' => 'Установить мета свойства страницы',
                'set_page_meta_description' => 'page_title, meta_title и meta_description будут установлены из названия и описания записи.',
            ],

            'forms' => [
                'empty_option' => 'Не выбрано',
            ],

            'groups' => [
                'links' => 'Ссылки',
                'order' => 'Порядок',
                'limit' => 'Ограничения',
                'filter_area' => 'Отфильтровать по Списку',
                'filter_category' => 'Отфильтровать по Категории',
                'filter_tag' => 'Отфильтровать по Тегу',
                'filter_records' => 'Отфильтровать по Записям',
                'seo' => 'SEO',
                'links' => 'Ссылки',
            ],            
        ],

        'records' => [
            'name' => 'Записи',
            'description' => 'Получить список записей',
        ],

        'record' => [
            'name' => 'Запись',
            'description' => 'Получить одну конкретную запись',
        ],

        'categories' => [
            'name' => 'Категории',
            'description' => 'Получить список категорий',

            'properties' => [
                'category_slug_description' => 'Задать параметр динамического URL, например ":category" или ввести вручную, например, "my-category". Это можно использовать, например, для установки активной категории в меню категорий.',
            ],
        ],

        'category' => [
            'name' => 'Категория',
            'description' => 'Получить одну конкретную категорию',
        ],

        'tags' => [
            'name' => 'Теги',
            'description' => 'Получить список тегов',

            'properties' => [
                'tag_slug_description' => 'Задать параметр динамического URL, например ":tag" или ввести вручную, например, "my-tag". Это можно использовать, например, для установки активного тега в меню тегов.',
            ],
        ],

        'tag' => [
            'name' => 'Тег',
            'description' => 'Получить один конкретный тег',
        ],
    ],

    'permissions' => [
        'tab_name' => 'Записи',
        'access_areas' => 'Доступ к спискам',
        'access_area' => '> Доступ к списку ',
        'access_records' => 'Доступ к записям',
        'access_categories' => 'Доступ к категориям',
        'access_attributes' => 'Доступ к аттрибутам',
        'access_settings' => 'Доступ к настройкам',
        'access_tags' => 'Доступ к тегам',
        'access_denied' => 'Доступ запрещён',
    ],

    'settings' => [
        'main_section' => 'Настройки для Записей',
        'main_section_comment' => 'Немного настроек для плагина Записи',

        'tabs' => [
            'lists' => 'Списки',
            'connections' => 'Связи',
        ],

        'fields' => [
            'preview_width' => 'Ширина изображения в колонке Превью',
            'preview_height' => 'Высота изображения в колонке Превью',
            'connections_section_blog' => '(Rainlab) Блог',
            'connections_section_pages' => '(Rainlab) Страницы',
            'allow_records_in_blog_posts' => 'Включить записи в постах плагина Блог',
            'allow_records_in_blog_posts_comment' => 'Отображает список записей в блог-постах (Rainlab.Blog плагин должен быть установлен)',
            'allow_records_in_blog_posts_area' => 'Показывать записи из Списка',
            'allow_records_in_pages' => 'Включить записи в Страницах',
            'allow_records_in_pages_comment' => 'Отображает список записей на статической странице (Rainlab.Pages плагин должен быть установлен)',
            'allow_records_in_pages_area' => 'Показывать записи из Списка',
        ],
    ]
];
