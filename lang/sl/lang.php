<?php return [
    'plugin' => [
        'name' => 'Zapisi',
        'name_short' => 'Zapisi',
        'name_original' => 'Small Records',
        'description' => 'Univerzalni vtičnik Zapisi',
    ],

    'common' => [

        'import' => 'Uvozi',
        'export' => 'Izvozi',
        'edit' => 'Uredi',
        'desc' => 'Padajoče',
        'asc' => 'Naraščujoče',

        'menu' => [
            'areas' => 'Seznami',
            'area' => 'Seznam',
        ],

        'tabs' => [
            'info' => 'Info',
            'images' => 'Slike',
            'content' => 'Vsebina',
            'fields' => 'Polja',
            'notes' => 'Opombe',
            'tags' => 'Značke',
            'attributes' => 'Atributi',
            'attachments' => 'Priloge',
            'secondary_categories' => 'Kategorije',
            'testimonials' => 'Mnenja',
            'content_blocks' => 'Vsebinski bloki',
            'records' => 'Zapisi',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Naziv',
            'slug' => 'Slug',
            'active' => 'Aktivno',
            'favourite' => 'Izpostavljeno',
            'date' => 'Datum',
            'url' => 'URL',
            'description' => 'Opis',
            'content' => 'Vsebina',
            'preview_image' => 'Predogled slika',
            'preview_image_media' => 'Predogled slika (Media brskalnik)',
            'images' => 'Naloži slike',
            'images_media' => 'Izberi slike (Media brskalnik)',
            'attached_images_count' => 'Slike',
            'area' => 'Seznam',
            'category' => 'Glavna kategorija',
            'category_comment' => 'Kategorije lahko urejate na strani <a href="'.Backend::url('janvince/smallrecords/categories/index').'">Kategorije</a>',
            'tags' => 'Značke',
            'attributes' => 'Atributi',
            'files' => 'Datoteke',
            'categories' => 'Kategorije',
            'repeater' => 'Informacije',
            'repeater_prompt' => 'Dodaj novo ...',
            'testimonials' => 'Mnenja',
            'testimonials_prompt' => 'Dodaj novo ...',
            'created_at' => 'Ustvarjeno',
            'updated_at' => 'Spremenjeno',
            'created_by' => 'Ustvaril',
            'updated_by' => 'Spremenil',
            'sort_order' => 'Sortiranje',
            'author' => 'Avtor',
        ],

        'fields' => [
            'empty_option' => 'Ni izbrano ...',
        ],

        'buttons' => [
            'reorder' => 'Sortiranje',
            'back_to_list' => 'Nazaj na seznam',
            'create_and_new' => 'Ustvari in nov',
            'update_and_new' => 'Shrani in nov',
        ],

        'import_settings' => [
            'truncate_table' => 'Izbriši tabelo pred uvozom',
            'truncate_table_description' => 'Izbriši vse kategorije in ponastavi štetje',
            'delete_relations' => 'Zbriši razmerje Zapis > Kategorija',
            'delete_relations_description' => 'Zbriši vsa razmerja Zapis > Kategorije',
        ],

    ],

    'areas' => [
        'new_area' => 'Nov seznam zapisov',
        'menu_label' => 'Seznam zapisov',

        'import' => [
            'import_Zapisi' => 'Uvozi zapise',
            'export_Zapisi' => 'Izvozi zapise',
            'area_id_description' => 'Mogoče je izvozi samo podatke iz določenega seznama',
            'area_id_empty_option' => '-- Vsi zapisi --',
        ],

        'columns' => [
            'allowed_fields' => 'Dovoljena polja',
            'allowed_fields_comment' => 'Izbrana polja bodo vidna na vnosni maski zapisa. Seznam je daljši, zato podrsajte navzdol!<br><em>Nekatera polja bodo vidna na vnosni maski zapisa šele ko je ustvarjen zapis (odvisna so od ID polja zapisa)!</em>',

            'custom_repeater_allow' => 'Dovoli vnosne bloke po meri',
            'custom_repeater_tab_title' => 'Naziv zavihka bloka',
            'custom_repeater_prompt' => 'Naziv poziva "Dodaj nov blok"',
            'custom_repeater_min_items' => 'Minimalno število zahtevanih blokov',
            'custom_repeater_max_items' => 'Maksimalno število zahtevanih blokov',

            'custom_repeater' => [
                'repeater_prompt' => 'Dodaj novo polje',
                'field_type' => 'Vrsta polja',
                'field_name' => 'Ime polja',
                'field_name_comment' => 'Primer imena polja: moj_zapis_ime. To ime se lahko uporabi v Twigu za priklic vrednosti polja.',
                'field_label' => 'Oznaka polja',
                'field_span' => 'Položaj polja',
                'field_mode' => 'Način',
                'field_size' => 'Velikost',
                'options' => [
                    'text' => 'Tekst',
                    'textarea' => 'Besedilni vnos',
                    'richeditor' => 'Obogateno besedilo',
                    'number' => 'Številka',
                    'checkbox' => 'Potrditveno polje',
                    'mediafinder' => 'Media brskalnik',
                    'section' => 'Sekcija',
                    'left' => 'Levo',
                    'right' => 'Desno',
                    'full' => 'Polna širina',
                    'file' => 'Datoteka',
                    'image' => 'Slika',
                    'tiny' => 'Drobno',
                    'small' => 'Majhno',
                    'large' => 'Veliko',
                    'huge' => 'Večje',
                    'giant' => 'Največje',
                    'empty_option' => 'Izberi ...'
                ]
            ],
        ],

        'tabs' => [
            'custom_repeater' => 'Vnosni bloki po meri',
        ]
    ],

    'records' => [
        'menu_label' => 'Zapisi',
        'return_to_records' => 'Nazaj na Zapise',
        'reordering_description' => 'Uporabi "Sortiranje" v nastavitvah komponente.',
        'reorder' => 'Sortiranje',

        'images_media' => [
            'image' => 'Slika',
            'title' => 'Naslov',
            'description' => 'Opis',
        ],

        'repeater' => [
            'repeater_prompt' => 'Dodaj ...',
            'value1' => 'Vrednost 1',
            'value2' => 'Vrednost 2',
            'value3' => 'Vrednost 3',
            'value4' => 'Vrednost 4',
            'text' => 'Tekst',
        ],

        'testimonials' => [
            'title' => 'Naslov',
            'image' => 'Slika',
            'author' => 'Avtor',
            'date' => 'Datum',
            'content' => 'Vsebina',
        ],

        'content_blocks' => [
            'title' => 'Naslov',
            'subtitle' => 'Podnaslov',
            'image' => 'Slika',
            'author' => 'Avtor',
            'date' => 'Datum',
            'content' => 'Vsebina',
            'preview_image' => 'Slika',
            'description' => 'Opis',
            'code' => 'Koda',
            'disable' => 'Onemogoči',
            'favourite' => 'Izpostavi',
        ],

        'scoreboard' => [
            'records_count' => 'Število zapisov',
            'records_active' => 'Aktivni',
            'records_hidden' => 'Skriti',
            'records_favourite' => 'Izpostavljeni',
            'records_common' => 'Splošni',
            'latest_records' => 'Zadnji',
            'latest_record_date' => 'Ustvarjen: ',
            'active_area' => '{0} zapisov v|{1} zapis v|{2} zapisa v|{3} zapisi v|{4} zapisi v|[5,Inf[ %count% zapisov v',
        ]

    ],

    'categories' => [
        'menu_label' => 'Kategorije',
        'category' => 'Kategorija',
        'new_category' => 'Nova kategorija',
        'return_to_categories' => 'Nazaj na Kategorije',
        'category' => 'Kategorija',
        'secondary_categories' => 'Več kategorij',

        'columns' => [
            'main_category' => 'Glavna kategorija',
            'parent' => 'Nadrejena kategorija',
            'parent_comment' => 'Sprememba hierarhije in sortiranja se spremeni na strani <a href="'.Backend::url('janvince/smallrecords/categories/reorder').'">Sortiranje</a>',
        ],

        'tabs' => [
            'secondary_categories' => 'Sekundarne kategorije',
            'secondary_categories_comment' => 'Zapis ima lahko eno glavno kategorijo in več sekundarnih kategorij',
        ]

    ],

    'attributes' => [
        'menu_label' => 'Atributi',
        'new_attribute' => 'Nov atribut',
        'attribute' => 'Atribut',
        'return_to_attributes' => 'Nazaj na atribute',

        'columns' => [
            'name' => 'Ime',
            'slug' => 'Slug',
            'value_text' => 'Obogateno besedilo',
            'value_number' => 'Število',
            'value_boolean' => 'Logična vrednost',
            'value_switch' => 'Stikalo (Da/Ne)',
            'value_type' => 'Oblika zapisa atributa',
            'value_type_comment' => 'Na podlagi izbrane oblike se prikaže izbrano vnosno polje.',
            'value_string' => 'Tekst',
        ],

        'tabs' => [
            'attributes' => 'Atributi',
            'attributes_comment' => 'Določite atribute in njihove vrednosti',

        ],


    ],

    'tags' => [
        'menu_label' => 'Značke',
        'return_to_tags' => 'Nazaj na značke',
        'new_tag' => 'Nova značka',
        'tag' => 'značka',
        'reorder' => 'Sortiranje',

        'columns' => [
            'name' => 'Ime',
            'slug' => 'Slug',
            'description' => 'Opis',
            'value' => 'Vrednost',
            'icon' => 'Ikona',
        ],

        'tabs' => [
            'tags' => 'Značke'
        ]

    ],

    'forms' => [
        'reorder' => 'Sortiranje',
        'delete_attached_images' => 'Izbriši vse naložene slike',
        'delete_attached_images_confirm' => 'Resnično želite zbrisati vse naložene slike iz zavihka Slike?',
        'deleting_attached_images' => 'Brisanje vseh naloženih slik ...',
    ],

    'components' => [

        'common' => [

            'properties' => [
                'active_only' => 'Samo aktivni',
                'active_only_description' => 'Prikaži samo aktivne vpise',
                'active_records_only' => 'Z aktivnimi zapisi',
                'active_records_only_description' => 'Prikaži samo, če ima aktivne zapise',
                'favourite_only' => 'Izpostavljeni',
                'favourite_only_description' => 'Prikaži samo izpostavljene zapise (če je neizbrano, bo prikazalo vse zapise)',
                'root_categories_only' => 'Samo korenske kategorije',
                'root_categories_only_description' => 'Prikaži samo korenske kategorije',

                'area_slug' => 'Prikaži zapise iz seznama',
                'area_slug_description' => 'Izberi seznam iz katerega se prikažejo zapisi',
                'category_slug' => 'Slug kategorije',
                'category_slug_description' => 'Prikaži z dinamičnim URL parametrom, kot recimo ":category" ali ročno vnesi vrednost slug, recimo "moja-kategorija".',
                'record_slug' => 'Slug zapisa',
                'record_slug_description' => 'Prikaži z dinamičnim URL parametrom, kot recimo ":record" ali ročno vnesi vrednost slug, recimo "moj-zapis".',
                'tag_slug' => 'Slug značke',
                'tag_slug_description' => 'Prikaži z dinamičnim URL parametrom, kot recimo ":tag" ali ročno vnesi vrednost slug, recimo "moja-znacka".',
                'page_slug' => 'Slug oštevilčenja strani',
                'page_slug_description' => 'Prikaži z dinamičnim URL parametrom, kot recimo ":page" ali ročno vnesi vrednost slug, recimo "1".',
                'parent_category_slug' => 'Slug nadrejene kategorije',
                'parent_category_slug_description' => 'Prikaži z dinamičnim URL parametrom, kot recimo ":parent-category" ali ročno vnesi vrednost slug, recimo "moja-nadrejena-kategorija".',

                'record_page' => 'Ime strani za zapis',
                'record_page_description' => 'Vpišite ime CMS strani, kjer želite, da se prikaže posamezen zapis (recimo "zapis")',
                'record_page_slug' => 'Slug strani zapisa',
                'record_page_slug_description' => 'Vpišite ime URL parametra, ki je uporabljen na CMS strani posameznega zapisa (recimo ":slug", kjer je URL strani /zapis/:slug).',

                'category_page' => 'Ime strani za kategorijo',
                'category_page_description' => 'Vpišite ime CMS strani, kjer želite, da se prikaže posamezna kategorija (recimo "kategorija")',
                'category_page_slug' => 'Slug strani kategorija',
                'category_page_slug_description' => 'Vpišite ime URL parametra, ki je uporabljen na CMS strani posamezne kategorije (recimo ":category", kjer je URL strani like /kategorija/:category).',
                'categories_page' => 'Ime strani za kategorije',
                'categories_page_description' => 'Vpišite ime CMS strani, kjer želite, da se prikaže seznam kategorij (recimo "kategorije")',
                'categories_page_slug' => 'Slug strani kategorije',
                'categories_page_slug_description' => 'Vpišite ime URL parametra, ki je uporabljen na CMS strani seznama kategorij (recimo ":category", kjer je URL strani /zapisi/:category).',

                'tag_page' => 'Ime strani za značko',
                'tag_page_description' => 'Vpišite ime CMS strani, kjer želite, da se prikažejo zapisi z izbrano značko (recimo "znacka")',
                'tag_page_slug' => 'Slug strani značke',
                'tag_page_slug_description' => 'Vpišite ime URL parametra, ki je uporabnjen na CMS strani izbrane značke (recimo ":tag", kjer je URL strani /znacka/:tag).',
                'tags_page' => 'Ime strani za značke',
                'tags_page_description' => 'Vpišite ime CMS strani, kjer želide, da se prikaže seznam značk (recimo, "znacke")',
                'tags_page_slug' => 'Slug strani značk',
                'tags_page_slug_description' => 'Vpišite ime URL parametra, ki je uporabni na strani značk (recimo ":tag", kjer je URL strani /zapisi/:tag).',

                'use_main_category' => 'Prikaži po glavni kategoriji',
                'use_main_category_description' => 'Če je vpisan slug kategorije, bo prikazan samo zapis, kjer je vpisana glavna kategorija.',
                'use_multicategories' => 'Prikaži po sekundarni kategoriji',
                'use_multicategories_description' => 'Če je vpisan slug kategorije, prikaži samo zapis, kjer je rvpisana sekundarna kategorija.',

                'order_by' => 'Sortiraj po polju',
                'order_by_direction' => 'Sortiraj v smeri',
                'order_as_collection' => 'Sortiraj kot zbirka',
                'order_as_collection_description' => 'Pridobi vse podatke v zbirko in sortiraj. Uporabno, kadar ni mogoče pravilno sortirati tabele po izbrani trenutni lokalizaciji.',

                'allow_limit' => 'Omeji število prikazov',
                'allow_limit_description' => 'Če izbrano bo prikazano samo omejeno število prikazov. Dovoljeno bo oštevilčenje strani.',
                'limit' => 'Število prikazov',
                'limit_description' => 'Kolikšno naj bo število prikazov.',

                'throw404' => 'Prikaži stran 404 ob napaki',
                'throw404_description' => 'Prikazana bo stran 404 kadar ni najdenih zapisov.',
                'set_page_meta' => 'Nastavi meta podatke',
                'set_page_meta_description' => 'Naslov strani, meta naslov in meta opis bodo nastavljeni iz naziva in opisa zapisa.',
            ],

            'forms' => [
                'empty_option' => 'Ni izbrano',
            ],

            'groups' => [
                'links' => 'Povezave',
                'order' => 'Sortiranje',
                'limit' => 'Omejitve',
                'filter_area' => 'Prikaži iz seznama',
                'filter_category' => 'Prikaži po kategoriji',
                'filter_tag' => 'Prikaži po znački',
                'filter_records' => 'Prikaži po zapisih',
                'seo' => 'SEO',
                'links' => 'Povezave',
            ],
        ],

        'records' => [
            'name' => 'Zapisi',
            'description' => 'Prikaži seznam zapisov',
        ],

        'record' => [
            'name' => 'Zapis',
            'description' => 'Prikaži posamezen zapis',
        ],

        'categories' => [
            'name' => 'Kategorije',
            'description' => 'Prikaži seznam kategorij',

            'properties' => [
                'category_slug_description' => 'Nastavi dinamičen URL parameter kot je ":category" ali ročno vpiši, recimo "moja-kategorija". To se lahko recimo uporabi pri nastavitvi aktivne kategorije v meniju kategorij.',
            ],
        ],

        'category' => [
            'name' => 'Kategorija',
            'description' => 'Prikaži posamezno kategorijo',
        ],

        'tags' => [
            'name' => 'Značke',
            'description' => 'Prikaži seznam značk',

            'properties' => [
                'tag_slug_description' => 'Nastavi dinamičen URL parameter kot je ":tag" ali ročno vpiši, recimo "moja-znacka". To se lahko recimo uporabi pri nastavitvi aktivne značke v meniju značk.',
            ],
        ],

        'tag' => [
            'name' => 'Značka',
            'description' => 'Prikaži posamezno značko',
        ],
    ],

    'permissions' => [
        'tab_name' => 'Dovoljenja za Zapisi',
        'access_areas' => 'Dostop do seznamov',
        'access_area' => '> Dostop do seznama ',
        'access_records' => 'Dostop do zapisov',
        'access_categories' => 'Dostop do kategorij',
        'access_attributes' => 'Dostop do atributov',
        'access_settings' => 'Dostop do nastavitev',
        'access_tags' => 'Dostop do značk',
        'access_denied' => 'Dostop onemogočen',
    ],

    'settings' => [
        'main_section' => 'Zapisi nastavitve',
        'main_section_comment' => 'Nekaj nastavitev za vtičnik Zapisi',

        'tabs' => [
            'lists' => 'Seznami',
            'connections' => 'Povezave',
        ],

        'fields' => [
            'preview_width' => 'Širina slike za stolpec Predogled slika',
            'preview_height' => 'Višina slike za stolpec Predogled slika',
            'connections_section_blog' => '(Rainlab) Blog',
            'connections_section_pages' => '(Rainlab) Strani',
            'allow_records_in_blog_posts' => 'Dovoli zapise v Blog objavah',
            'allow_records_in_blog_posts_comment' => 'Prikaži seznam zapisov v blog objavah (Rainlab.Blog vtičnik mora biti nameščen)',
            'allow_records_in_blog_posts_area' => 'Prikaži zapise iz seznama',

            'allow_records_in_pages' => 'Dovoli zapise v Strani',
            'allow_records_in_pages_comment' => 'Prikaži seznam zapisov v statičnih straneh (Rainlab.Pages vtičnik mora biti nameščen)',
            'allow_records_in_pages_area' => 'Prikaži zapise iz seznama',
        ],
    ]
];
