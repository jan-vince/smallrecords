<?php return [
    'plugin' => [
        'name' => 'Záznamy',
        'name_short' => 'Záznamy',
        'name_original' => 'Záznamy',
        'description' => 'Univerzální plugin pro správu záznamů',
    ],

    'common' => [

        'menu' => [
            'areas' => 'Seznamy',
            'area' => 'Seznam',
        ],

        'tabs' => [
            'info' => 'Informace',
            'images' => 'Obrázky',
            'content' => 'Obsah',
            'fields' => 'Formulářová pole',
            'notes' => 'Poznámky',
            'tags' => 'Značky',
            'attributes' => 'Vlastnosti',
            'attachments' => 'Přílohy',
            'secondary_categories' => 'Kategorie',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Název',
            'slug' => 'Slug',
            'active' => 'Aktivní',
            'favourite' => 'Oblíbený',
            'date' => 'Datum',
            'url' => 'URL',
            'description' => 'Popisek',
            'content' => 'Obsah',
            'preview_image' => 'Náhledový obrázek',
            'images' => 'Obrázky',
            'attached_images_count' => 'Obrázků',
            'area' => 'Seznam',
            'category' => 'Kategorie',
            'category_comment' => 'Záznamy můžete zpravovat na <a href="'.Backend::url('janvince/smallrecords/categories/index').'">stránce Kategorií</a>',
            'tags' => 'Značky',
            'attributes' => 'Vlastnosti',
            'files' => 'Soubory',
            'categories' => 'Kategorie',
            'repeater' => 'Repeater',
            'repeater_prompt' => 'Přidat novou položku ...',
        ],

        'fields' => [
            'empty_option' => 'Není vybrán ...',
        ],

        'buttons' => [
            'reorder' => 'Změnit pořadí',
            'back_to_list' => 'Zpět na seznam',
        ],

    ],

    'areas' => [
        'new_area' => 'Nový seznam',
        'menu_label' => 'Seznamy',

        'columns' => [
            'allowed_fields' => 'Povolené formulářové prvky',
            'allowed_fields_comment' => 'Označené položky budou viditelné ve formuláři při editaci záznamu. Položek je hodně, proto skrolujte dolů.<br><em>Některá pole formuláře budou viditelná až ve chvíli, kdy uložíte záznam (jsou závislá na ID záznamu)!</em>',
        ],

    ],

    'records' => [
        'menu_label' => 'Záznamy',

        'repeater' => [
            'repeater_prompt' => 'Přidat položku ...',
            'value1' => 'Hodnota 1',
            'value2' => 'Hodnota 2',
            'value3' => 'Hodnota 3',
            'value4' => 'Hodnota 4',
            'text' => 'Text',
        ],

        'scoreboard' => [
            'records_count' => 'Počet záznamů',
            'records_active' => 'Aktivních',
            'records_hidden' => 'Skrytých',
            'records_favourite' => 'Oblíbených',
            'records_common' => 'Všech',
            'latest_record' => 'Nejnovější',
            'latest_record_date' => 'Vytvořeno: ',
            'active_area' => '{0} záznamů v|{1} záznam v|[2,4[ %count% záznamy v|[5,Inf[ %count% záznamů v',
        ]

    ],

    'categories' => [
        'menu_label' => 'Kategorie',
        'category' => 'Kategorie',
        'new_category' => 'Nová kategorie',
        'return_to_categories' => 'Zpět na kategorie',
        'category' => 'Kategorie',
        'secondary_categories' => 'Další kategorie',

        'columns' => [
            'main_category' => 'Kategorie',
            'parent' => 'Nadřazená kategorie',
            'parent_comment' => 'Můžete změnit pořadí a zařazení na <a href="'.Backend::url('janvince/smallrecords/categories/reorder').'">stránce pro změnu pořadí</a>',
        ],

        'tabs' => [
            'secondary_categories' => 'Další kategorie',
            'secondary_categories_comment' => 'Záznamy mohou mít jednu hlavní a několik sekundárních kategorií',
        ]

    ],

    'attributes' => [
        'menu_label' => 'Vlastnosti',
        'new_attribute' => 'Nová vlastnost',
        'attribute' => 'Vlastnost',
        'return_to_attributes' => 'Zpět na Vlastnosti',

        'columns' => [
            'value_text' => 'Text',
            'value_number' => 'Číslo',
            'value_boolean' => 'Stav',
            'value_switch' => 'Přepínač (Ano/Ne)',
            'value_type' => 'Typ hodnoty',
            'value_type_comment' => 'Na základě vybraného typu hodnoty, bude zobrazeno správné formulářové pole.',
            'value_string' => 'Krátký text',
        ],

        'tabs' => [
            'attributes' => 'Vlastnosti',
            'attributes_comment' => 'Můžete přiřadit vlastnosti a zadat jejich hodnoty',

        ],


    ],

    'tags' => [
        'menu_label' => 'Štítky',
        'return_to_tags' => 'Zpět na Štítky',
        'new_tag' => 'Nový štítek',
        'tag' => 'Štítek',
        'reorder' => 'Změnit pořadí',

        'columns' => [
            'value' => 'Hodnota',
            'icon' => 'Ikona',
        ],

        'tabs' => [
            'tags' => 'Štítky'
        ]

    ],

    'forms' => [
        'reorder' => 'Změnit pořadí',
        'delete_attached_images' => 'Smazat všechny přiřazené obrázky',
        'delete_attached_images_confirm' => 'Opravdu chcete smazat všechny obrázky na záložce Obrázky?',
        'deleting_attached_images' => 'Mazání přiřazených obrázků ...',
    ],

    'components' => [

        'records' => [
            'name' => 'Záznamy',
            'description' => 'Získá záznamy z vybraného seznamu záznamů',

            'properties' => [
                'area' => 'Seznam',
                'area_description' => 'Vyberte seznam, ze kterého chcete získat záznamy',
                'category' => 'Parametr kategorie (slug)',
                'category_description' => 'Záznamy můžete omezit na vybranou kategorie (dynamicky parametrem např. ":category" nebo ručně)',
                'active_only' => 'Pouze aktivní záznamy',
                'active_only_description' => 'Vybere pouze záznamy označené jako aktivní (Pokud není zaškrtnuto, vybere všechny záznamy)',
                'detail_page_slug' => 'Slug stránky detailu záznamu',
                'detail_page_slug_description' => 'Vložte slug CMS stránky, na které chcete zobrazit detail vybraného záznamu',

                'groups' => [
                    'links' => 'Odkazy',
                ],

            ],

        ],

        'record' => [
            'name' => 'Záznam',
            'description' => 'Získá jeden konkrétní záznam',

            'properties' => [
                'record_slug' => 'Slug záznamu',
                'record_slug_description' => 'vložte slug vybraného záznamu',
            ],

        ],

    ],

    'permissions' => [
        'tab_name' => 'Záznamy',
        'access_areas' => 'Přístup k Seznamům záznamů',
        'access_records' => 'Přístup k Záznamům',
        'access_categories' => 'Přístup ke Kategoriím',
        'access_attributes' => 'Přístup k Vlastnostem',
        'access_settings' => 'Přístup k nastavení pluginu',
        'access_tags' => 'Přístup ke Štítkům',
    ],

    'settings' => [
        'main_section' => 'Nastavení Záznamů',
        'main_section_comment' => 'Pár předvoleb pro plugin Záznamy',

        'tabs' => [
            'lists' => 'Seznamy',
        ],

        'fields' => [
            'preview_width' => 'Šířka náhledového obrázku v seznamu',
            'preview_height' => 'Výška náhledového obrázku v seznamu',
        ],

    ]

];
