# Small Records
> Universal plugin for storing and presenting (almost) any kind of data


## Installation

**GitHub** clone into `/plugins` dir:

```sh
git clone https://github.com/jan-vince/smallrecords.git
```

**OctoberCMS backend**

Just look for 'Small Records' in search field in:
> Settings > Updates&Plugins > Install plugins

## Permissions

You can set permissions to access each of a plugin's part and also each of created lists.

## Settings
> Settings > Small Plugins > Small records

* You can configure connection between (Rainlab) Blog posts and Records.

* You can set list's preview image height and width.

----

## Records

> Main idea behind this plugin is to have a place where I can easily collect records in several lists (like portfolio, partners, sliders and their images, simple photo galleries, etc.).

### Records lists

Create one or more lists of records and assign form fields that you want to be visible in the list.

*Created list will be appended to the top of the side menu in Records administration.*

#### Custom repeater fields

When creating a new list you can allow predefined form fields or you can **create your own form** definition (based on repeater).

On tab `Custom repeater` allow its use, set basic settings and **add new fields**.

*Look inside a default `Record detail` component partial to see how to work with custom repeater data.*

## Categories

Here you can set up categories hierarchy (it is a nested tree).

*There are components ready to use for categories listing in Twig.*

## Tags

Simple list of tags that can be assigned to records.

## Attributes

If you need to store a specific information for your records, that is not covered by fields in record's form, here you can define a name of an attribute and it's type (string, text, number, switch).

If Attributes are allowed in Records list, you can select an attribute and add a value.

### Access attributes in Twig

If you assigned one or more attributes to any record, you can iterate through them with Twig code like:

````
{% for attribute in record.attributes %}

    {{ attribute.name }} : {{ attribute.value }}

{% endfor %}
````
Or there are functions to get a specific attribute (or attribute's value) by slug like:
````

    {{ record.getAttributeBySlug('my-attribute-slug') }}

    {{ record.getAttributeValueBySlug('my-attribute-slug') }}

````

## Import and Export

There are buttons ready in Records and Categories lists.

----

## Components

There are components and default partials ready to use in your Layout, Page or Partial.

Component's default partials are meant as templates - you should customize them to your needs as these can change in a future!

Best way to customize them is to copy them to yout theme folder like:

`/themes/my-theme/partials/records/default.htm`

*Folder `records` should be named after component's alias name. See more details in [OctoberCMS docs](https://octobercms.com/docs/cms/components#overriding-partials).*

### **Categories component**

>You can add a Categories component to a page, layout or partial.

Just start with putting default partial `{{ component 'categories' }}` in your layout/page/partial to inspect how to work with categories lists.

There are many component's parameters you can use to customize the list of categories.

* **Active categories only**
* **Root categories only** - get list of categories from highest level
* **Parent category slug** - get only children of this category
* Only with records from
  * **Only with records from list** - you can select a specific records list and returned categories list will be limited to those used with records in this list
  * **With main category records** - this will return only categories used in records as Main category (on Info tab of record's form)
  * **With secondary categories records** - this will return only categories used in records as Secondary category (on Categories tab of record's form)
    * *If both main and secondary categories checkboxes are checked, only categories that are used as main AND secondary category in records will be returned!*
* Links
  * **Category slug** - URL slug used to filter (eg. :category)
  * **Categories page** - CMS page with used Category slug (page with URL like /records/:category?)
* Limit
  * **Limit number of categories** - allows limiting number of returned categories
  * **Number of categories** - how many categories will be returned if 'Limit number of categories' checkbox is checked

#### Twig

Look inside of `/plugins/janvince/smallrecords/components/categories/default.htm` to learn how you can work with returned categories in Twig.

Copy it to: `/themes/my-theme/partials/records/default.htm` to make changes.

*See more details in [OctoberCMS docs](https://octobercms.com/docs/cms/components#overriding-partials).*


### **Records component**

>You can add a Records component to a page, layout or partial.

Just start with putting default partial `{{ component 'records' }}` in your layout/page/partial to inspect how to work with records lists.

There are many component's parameters you can use to customize the list of records.

* **Active records only** - get list of active records
* **Favourite records only** - get list of favourite records
* **Lists** - get records only from selected list
* With categories
  * **Category slug** - URL slug used to filter (eg. :category)
  * **With main category records** - this will return only records with selected category as Main category (on Info tab of record's form)
  * **With secondary categories records** - this will return only records with selected category as Secondary category (on Categories tab of record's form)
    * *If both main and secondary categories checkboxes are checked, only records that has selected category as main AND secondary will be returned!*
* With tags
  * **Tag slug** - URL slug used to filter (eg. :tag)
* Sorting
  * **Sort by** - select column to be used for sorting
  * **Sort direction** - ascending or descending order
* Links
  * **Detail page slug** - CMS page with RecordDetail component (eg. /record-detail)
  * **Parameter used on detail page** - URL slug used on detail page (eg. :slug)
* Limit
  * **Limit number of records** - allows limiting number of returned records
  * **Number of records** - how many records will be returned if 'Limit number of records' checkbox is checked
  * **Pagination slug** - URL slug to be used for pagination (eg.: {{ :page }})

*When `Limit number of records` is allowed, items are returned as Length aware paginator.*

#### **Record detail**

>You can add a RecordDetail component to a page, layout or partial.

Put default partial `{{ component 'recordDetail' }}` in your layout/page/partial to inspect how to work with records lists.

There are many component's parameters you can use to customize the detail of the record.

* **Active only** - get data only on Active record
* **Record slug** - set a slug used on detail page to find a specific record
* **List** - get record only from selected list
* With categories
  * **Category slug** - URL slug used to filter (eg. :category)
  * **With main category records** - this will return only records with selected category as Main category (on Info tab of record's form)
  * **With secondary categories records** - this will return only records with selected category as Secondary category (on Categories tab of record's form)
    * *If both main and secondary categories checkboxes are checked, only records that has selected category as main AND secondary will be returned!*
* Links
  * **404 error on invalid slug** - throw 404 error when record is not found

----

## Basic use case

Install Small Records plugin.

In OctoberCMS backend click in main menu on **Records** and then in left pane on **Lists**. Create a new list **Products**.

Add some records to this list, add some categories, tags and attributes (and assign them to some of your records).

### **Layout file**

Go to a CMS part of backend and **create a layout file Default** with content:

```
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Records</title>
        <meta name="title" content="Records">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        {% styles %}
    </head>
    <body>

        {% page %}

    </body>
</html>
```

### **Record detail page**

Create a CMS page `Record detail` with URL `/records/detail/:slug`.

Select its layout `Default`.

From left pane add a Record  component to the page content:

* Small Records > Record
   * List: `Products`
   * Only with records from: `Products`

Save a file.

The content of a page should be:

```
{% component 'recordDetail' %}
```

### **Records page**

Create a CMS page `Records` with URL `/records/:category?`.

Select its layout `Default`.

From left pane add components to the page content:

* Small Records > Categories
   * Active only: `checked`
   * Only with records from: `Products`
   * Category slug: `:category`
   * Categories page: `Records` (you have to save the page and reload to be able to select it)
   * Detail page slug: `record-detail`

* Small Records > Records
   * List: `Products`

Save a file;

The content of a page should be:

```
{% component 'categories' %}

{% component 'records' %}
```


>Go to frontend to a page `/records' to see the records list. You should be able to filter by category a and to click on product to see a detail.



----
> Special thanks goes to:    
> [OctoberCMS](http://www.octobercms.com) team members and supporters for this great system.
> [Samuel Zeller](https://unsplash.com/@samuelzeller) for his photo I have used in the plugin banner.
> [Font Awesome](http://www.fontawesome.io) for Universal access symbol.


Created by [Jan Vince](http://www.vince.cz), freelance web designer from Czech Republic.
