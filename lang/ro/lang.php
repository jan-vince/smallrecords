<?php return [
    'plugin' => [
        'name' => 'Mini Înregistrări',
        'name_short' => 'Înregistrări',
        'name_original' => 'Small records',
        'description' => 'Plugin universal pentru stocarea înregistrărilor',
    ],

    'common' => [

        'import' => 'Importă',
        'export' => 'Exportă',
        'edit' => 'Editeză',
        'desc' => 'Descrescător',
        'asc' => 'Crescător',

        'menu' => [
            'areas' => 'Liste',
            'area' => 'Listă',
        ],

        'tabs' => [
            'info' => 'Info',
            'images' => 'Imagini',
            'content' => 'Conținut',
            'fields' => 'Cîmpuri',
            'notes' => 'Note',
            'tags' => 'Etichete',
            'attributes' => 'Atribute',
            'attachments' => 'Fișiere anexate',
            'secondary_categories' => 'Categorii',
            'testimonials' => 'Recomandări',
            'content_blocks' => 'Blocuri de conținut',
            'records' => 'Înregistrări',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Nume',
            'slug' => 'Slug',
            'active' => 'Activ',
            'favourite' => 'Favorit',
            'date' => 'Data',
            'url' => 'URL',
            'description' => 'Descriere',
            'content' => 'Conținut',
            'preview_image' => 'Previzualizare imagine',
            'preview_image_media' => 'Previzualizare (Media)',
            'images' => 'Imagini',
            'images_media' => 'Imagini (Media)',
            'attached_images_count' => 'Imagini',
            'area' => 'Listă',
            'category' => 'Categorie principală',
            'category_comment' => 'Poți gestiona articolele la <a href="'.Backend::url('janvince/smallrecords/categories/index').'">Pagina de categorii</a>',
            'tags' => 'Etichete',
            'attributes' => 'Atribute',
            'files' => 'Fișiere',
            'categories' => 'Categorii',
            'repeater' => 'Informații',
            'repeater_prompt' => 'Adaugă o înregistrare nouă ...',
            'testimonials' => 'Recomandări',
            'testimonials_prompt' => 'Adaugă o înregistrare nouă ...',
            'created_at' => 'Creat în',
            'updated_at' => 'Actualizat în',
            'created_by' => 'Creat de către',
            'updated_by' => 'Actualizat de către',
            'sort_order' => 'Ordonare personalizată ',
            'author' => 'Autor',
        ],

        'fields' => [
            'empty_option' => 'Nu ai selectat nimic ...',
        ],

        'buttons' => [
            'reorder' => 'Rearanjează',
            'back_to_list' => 'Înapoi la listă',
            'create_and_new' => 'Creează și NOU',
            'update_and_new' => 'Salvează  și NOU',
        ],

        'import_settings' => [
            'truncate_table' => 'Golește tabelul înainte de a importa',
            'truncate_table_description' => 'Șterge toate categoriile și resetează numerotarea automată',
            'delete_relations' => 'Șterge relația dintre înregistrări și categorii',
            'delete_relations_description' => 'Șterge toate relațiile dintre înregistrare(i) și categorii',
        ],
    ],

    'areas' => [
        'new_area' => 'Listă nouă de înregistrări',
        'menu_label' => 'Liste de înregistrări',

        'import' => [
            'import_records' => 'Importă înregistrări',
            'export_records' => 'Exportă înregistrări',
            'area_id_description' => 'Poți să exporți date doar dintr-o listă specifică',
            'area_id_empty_option' => '-- Toate înregistrările --',
        ],

        'columns' => [
            'allowed_fields' => 'Cîmpuri disponibile pentru înregistrări',
            'allowed_fields_comment' => 'Cîmpurile selectate vor fi vizibile în formularul pentru editarea înregistrărilor. Această listă este lungă, așa că derulați în jos! <br><em>Unele cîmpuri vor fi vizibile după ce creați o înregistrare (sînt dependente de ID-ul înregistrării/lor)!</em>',

            'custom_repeater_allow' => 'Permite blocuri de câmpuri de formular personalizate',
            'custom_repeater_tab_title' => 'Titlul Tab-ului câmpurilor de formular personalizate',
            'custom_repeater_prompt' => 'Câmpuri de formular personalizate "Adăugare element nou" messaj prompt personalizat',
            'custom_repeater_min_items' => 'Câmpuri de formular personalizate, număr minim de elemente necesare',
            'custom_repeater_max_items' => 'Câmpuri de formular personalizate, număr maxim de elemente permise',

            'custom_repeater' => [
                'repeater_prompt' => 'Adaugă cîmp',
                'field_type' => 'Tip cîmp',
                'field_name' => 'Nume cîmp',
                'field_name_comment' => 'Numele cîmpului ca: înregistrarea_mea_nume. Îl veți folosi în Twig pentru a accesa valoarea cîmpului.',
                'field_label' => 'Denumire cîmp',
                'field_span' => 'Întindere cîmp',
                'field_mode' => 'Mod',
                'field_size' => 'Mărime',
                'options' => [
                    'text' => 'Text',
                    'textarea' => 'Regiune text',
                    'richeditor' => 'Editor Richtext',
                    'number' => 'Număr',
                    'checkbox' => 'Căsuță de selectare',
                    'mediafinder' => 'Căutare Media',
                    'section' => 'Secțiune',
                    'left' => 'Stînga',
                    'right' => 'Dreapta',
                    'full' => 'Întreg',
                    'file' => 'Fișier',
                    'image' => 'Imagine',
                    'tiny' => 'Minuscul',
                    'small' => 'Mic',
                    'large' => 'Larg',
                    'huge' => 'Imens',
                    'giant' => 'Gigantic',
                    'empty_option' => 'Selectați ...'
                ]
            ],
        ],

        'tabs' => [
            'custom_repeater' => 'Cîmpuri de formular personalizate',
        ]
    ],

    'records' => [
        'menu_label' => 'Înregistrări',
        'return_to_records' => 'Întoarce-te la Înregistrări',
        'reordering_description' => 'Utilizează "Aranjare personalizată" în opțiunea de sortare a componentelor.',
        'reorder' => 'Aranjare personalizată',

        'images_media' => [
            'image' => 'Imagine',
            'title' => 'Titlu',
            'description' => 'Descriere',
        ],

        'repeater' => [
            'repeater_prompt' => 'Adaugă element ...',
            'value1' => 'Valoare 1',
            'value2' => 'Valoare 2',
            'value3' => 'Valoare 3',
            'value4' => 'Valoare 4',
            'text' => 'Text',
        ],

        'testimonials' => [
            'title' => 'Titlu',
            'image' => 'Imagine',
            'author' => 'Autor',
            'date' => 'Data',
            'content' => 'Conținut',
        ],

        'content_blocks' => [
            'title' => 'Titlu',
            'subtitle' => 'Subtitlu',
            'image' => 'Imagine',
            'author' => 'Autor',
            'date' => 'Data',
            'content' => 'Conținut',
            'preview_image' => 'Previzualizează imaginea',
            'description' => 'Descriere',
            'code' => 'Cod',
            'disable' => 'Dezactivează',
            'favourite' => 'Favorit',
        ],

        'scoreboard' => [
            'records_count' => 'Număr înregistrări',
            'records_active' => 'Active',
            'records_hidden' => 'Ascunse',
            'records_favourite' => 'Favorite',
            'records_common' => 'Comune',
            'latest_record' => 'Ultimele',
            'latest_record_date' => 'Create: ',
            'active_area' => '{0} înregistrări în | {1} înregistrare în | [2,Inf[ %count% înregistrări în',
        ]
    ],

    'categories' => [
        'menu_label' => 'Categorii',
        'category' => 'Categorie',
        'new_category' => 'Categorie nouă',
        'return_to_categories' => 'Întoarce-te la Categorii',
        'secondary_categories' => 'Mai multe categorii',

        'columns' => [
            'main_category' => 'Categorie principală',
            'parent' => 'Categorie părinte',
            'parent_comment' => 'Puteți schimba ierarhia și ordinea la <a href="'.Backend::url('janvince/smallrecords/categories/reorder').'">Rearanjare pagină</a>',
        ],

        'tabs' => [
            'secondary_categories' => 'Categorii secundare',
            'secondary_categories_comment' => 'Înregistrările pot avea o categorie principală și mai multe categorii scundare',
        ]
    ],

    'attributes' => [
        'menu_label' => 'Atribute',
        'new_attribute' => 'Atribut nou',
        'attribute' => 'Atribut',
        'return_to_attributes' => 'Întoarce-te la Atribute',

        'columns' => [
            'name' => 'Nume',
            'slug' => 'Slug',
            'value_text' => 'Text',
            'value_number' => 'Număr',
            'value_boolean' => 'Stare',
            'value_switch' => 'Înlocuiește (Da/Nu)',
            'value_type' => 'Tipul de date',
            'value_type_comment' => 'Pe baza tipului de date selectat este afișat cîmpul de formular selectat',
            'value_string' => 'Șir de caractere',
        ],

        'tabs' => [
            'attributes' => 'Atribute',
            'attributes_comment' => 'Puteți adăuga atribute și să le conferiți valori',

        ],
    ],

    'tags' => [
        'menu_label' => 'Etichete',
        'return_to_tags' => 'Întoarce-te la Etichete',
        'new_tag' => 'Etichetă nouă',
        'tag' => 'Etichetă',
        'reorder' => 'Rearanjează',

        'columns' => [
            'name' => 'Nume',
            'slug' => 'Slug',
            'description' => 'Descriere',
            'value' => 'Valoare',
            'icon' => 'Iconiță',
        ],

        'tabs' => [
            'tags' => 'Etichete'
        ]

    ],

    'forms' => [
        'reorder' => 'Rearanjează',
        'delete_attached_images' => 'Șterge toate imaginile anexate',
        'delete_attached_images_confirm' => 'Sigur ștergeți toate imaginile anexate Tab-ului Imagini?',
        'deleting_attached_images' => 'Ștergerea tuturor imaginilor anexate ...',
    ],

    'components' => [

        'common' => [
            
            'properties' => [
                'active_only' => 'Active',
                'active_only_description' => 'Filtrează doar înregistrările active',
                'active_records_only' => 'Înregistrări active',
                'active_records_only_description' => 'Filtrează doar cu înregistrări active',
                'favourite_only' => 'Favorite',
                'favourite_only_description' => 'Obține doar înregistrările favorite (dacă nu este selectat va prelua toate înregistrările)',
                'root_categories_only' => 'Doar categorii rădăcină',
                'root_categories_only_description' => 'Obține doar categorii rădăcină',

                'area_slug' => 'Filtrează înregistrările pe baza listei',
                'area_slug_description' => 'Selectează o listă pentru a obține înregistrări pe baza ei',
                'category_slug' => 'Slug-ul categoriei',
                'category_slug_description' => 'Filtrează cu un parametru URL dinamic ca ":category" sau introdus manual ca "categoria_mea" - fără diacritice.',
                'record_slug' => 'Slug-ul înregistrării',
                'record_slug_description' => 'Filtrează cu un parametru URL dinamic ca ":record" sau introdus manual ca "inregistrarea_mea" - fără diacritice.',
                'tag_slug' => 'Slug-ul etichetei',
                'tag_slug_description' => 'Filtrează cu un parametru URL dinamic ca ":tag" sau introdus manual ca "eticheta_mea" - fără diacritice.',
                'page_slug' => 'Slug-ul paginii',
                'page_slug_description' => 'Filtrează cu un parametru URL dinamic ca ":page" sau introdus manual ca "1" - fără diacritice.',
                'parent_category_slug' => 'Slug-ul categoriei părinte',
                'parent_category_slug_description' => 'Filtrează cu un parametru URL dinamic ca ":parent-category" sau introdus manual ca "categoria_mea_parinte" - fără diacritice.',

                'record_page' => 'Numele paginii înregistrării',
                'record_page_description' => 'Întroduceți numele paginii din CMS unde doriți să redați o singură înregistrare (ex. "inregistrare" - fără diacritice)',
                'record_page_slug' => 'Slug pentru pagina înregistrării',
                'record_page_slug_description' => 'Întroduceți numele parametrului URL utilizat pentru pagina cu o singură înregistrare (ex. "slug" pentru un URL ca /inregistrare/:slug - fără diacritice).',

                'category_page' => 'Numele paginii categoriei',
                'category_page_description' => 'Întroduceți numele paginii din CMS unde doriți să redați o singură categorie (ex. "categorie" - fără diacritice)',
                'category_page_slug' => 'Slug pentru pagina categoriei',
                'category_page_slug_description' => 'Întroduceți numele parametrului URL utilizat pentru pagina cu o singură categorie (ex. ":category" pentru un URL ca /categorie/:category - fără diacritice).',
                'categories_page' => 'Numele paginii categoriilor',
                'categories_page_description' => 'Întroduceți numele paginii din CMS unde doriți să redați o singură listă de categorii (ex. "categorii" - fără diacritice)',
                'categories_page_slug' => 'Slug pentru pagina categorii',
                'categories_page_slug_description' => 'Întroduceți numele parametrului URL utilizat pentru pagina categoriilor (ex. ":category" pentru un URL ca /inregistrari/:category - fără diacritice).',

                'tag_page' => 'Numele paginii etichetei',
                'tag_page_description' => 'Întroduceți numele paginii din CMS unde doriți să redați o singură etichetă (ex. "eticheta" - fără diacritice)',
                'tag_page_slug' => 'Slug pentru pagina etichetei',
                'tag_page_slug_description' => 'Întroduceți numele parametrului URL utilizat pentru pagina cu o singură etichetă (ex. ":tag" pentru un URL ca /eticheta/:tag - fără diacritice).',
                'tags_page' => 'TNumele paginii etichetelor',
                'tags_page_description' => 'Întroduceți numele paginii din CMS unde doriți să redați lista etichetelor (ex. "etichete" - fără diacritice)',
                'tags_page_slug' => 'Slug pentru pagina etichetelor',
                'tags_page_slug_description' => 'Întroduceți numele parametrului URL utilizat pentru pagina etichetelor (ex. ":tag" pentru un URL ca /inregistrari/:tag - fără diacritice).',

                'use_main_category' => 'Filtrează pe baza categoriei principale',
                'use_main_category_description' => 'Dacă slug-ul categoriei este setat, obține doar înregistrarea cu această categorie principală atribuită.',
                'use_multicategories' => 'Filtrează pe baza categoriei secundare',
                'use_multicategories_description' => 'Dacă slug-ul categoriei este setat, obține doar înregistrarea cu această categorie secundară atribuită.',

                'order_by' => 'Aranjează după',
                'order_by_direction' => 'Aranjează după direcție',
                'order_as_collection' => 'Aranjează sub formă de colecție',
                'order_as_collection_description' => 'Obțineți toate datele din colecție și sortați-le. Util când baza de date nu poate aranja corect datele în locul curent.',

                'allow_limit' => 'Limiteaă număr sau înregistrări',
                'allow_limit_description' => 'Dacă este selectat, doar numărul necesar de înregistrări va fi obținut. De asemenea, va fi permisă o paginare.',
                'limit' => 'Număr de înregistrări obținute',
                'limit_description' => 'Cît de multe înregistrări vor fi obținute.',

                'throw404' => 'Eroare 404',
                'throw404_description' => 'Întoarce eroare 404 cînd nu a fost găsită nici o înregistrare.',
                'set_page_meta' => 'Setare proprietăți meta ale paginii',
                'set_page_meta_description' => 'page_title, meta_title și meta_description vor fi setate din numele și decrierea înregistrării.',
            ],

            'forms' => [
                'empty_option' => 'Nu este selectat',
            ],

            'groups' => [
                'links' => 'Legături',
                'order' => 'Aranjează după',
                'limit' => 'Limită',
                'filter_area' => 'Filtrează după listă',
                'filter_category' => 'Filtrează după Categorie',
                'filter_tag' => 'Filtrează după Etichetă',
                'filter_records' => 'Filtrează după Înregistrări',
                'seo' => 'SEO',
            ],            
        ],

        'records' => [
            'name' => 'Înregistrări',
            'description' => 'Obține lista înregistrărilor',
        ],

        'record' => [
            'name' => 'Înregistrare',
            'description' => 'Obține o anumită înregistrare',
        ],

        'categories' => [
            'name' => 'Categorii',
            'description' => 'Obține lista categoriilor',

            'properties' => [
                'category_slug_description' => 'Setează parametrul URL dinamic ca ":category" sau introdus manual ca "categoria_mea". Aceasta poate fi utilizat de ex. pentru a seta categoria activă în meniul categorii.',
            ],
        ],

        'category' => [
            'name' => 'Categorie',
            'description' => 'Obține o anumită categorie',
        ],

        'tags' => [
            'name' => 'Etichete',
            'description' => 'Obține lista etichetelor',

            'properties' => [
                'tag_slug_description' => 'Setează parametrul URL dinamic ca ":tag" sau introdus manual ca "eticheta_mea". Aceasta poate fi utilizat de ex. pentru a seta categoria activă în meniul etichete.',
            ],
        ],

        'tag' => [
            'name' => 'Etichetă',
            'description' => 'bține o anumită etichetă',
        ],
    ],

    'permissions' => [
        'tab_name' => 'Permisiuni mini înregistrări',
        'access_areas' => 'Liste acces',
        'access_area' => '> Acces la listă ',
        'access_records' => 'Acces Înregistrări',
        'access_categories' => 'Acces Categorii',
        'access_attributes' => 'Acces Atribute',
        'access_settings' => 'Acces Setări',
        'access_tags' => 'Acces Etichete',
        'access_denied' => 'Acces refuzat',
    ],

    'settings' => [
        'main_section' => 'Setări mini înregistrări',
        'main_section_comment' => 'Cîteva setări pentru plugin-ul Mini înregistrări',

        'tabs' => [
            'lists' => 'Liste',
            'connections' => 'Conexiuni',
        ],

        'fields' => [
            'preview_width' => 'Lățimea imaginii pentru coloana Previzualizare imagine',
            'preview_height' => 'Înălțimea imaginii pentru coloana Previzualizare imagine',
            'connections_section_blog' => '(Rainlab) Blog',
            'connections_section_pages' => '(Rainlab) Pagini Statice',
            'allow_records_in_blog_posts' => 'Permite înregistrări în Postări Blog',
            'allow_records_in_blog_posts_comment' => 'Arată lista înregistrărilor în postările blog-ului (Plugin-ul Rainlab.Blog trebuie instalat)',
            'allow_records_in_blog_posts_area' => 'Arată înregistrările din Listă',

            'allow_records_in_pages' => 'Permite înregistrări în Pagini Statice',
            'allow_records_in_pages_comment' => 'Arată lista înregistrărilor în Pagini Statice (Plugin-ul Rainlab.Pages trebuie instalat)',
            'allow_records_in_pages_area' => 'Arată înregistrările din Listă',
        ],
    ]
];
