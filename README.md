# Small Records
> Universal plugin for storing and presenting (almost) any kind of data

Install from OctoberCMS backend `Settings > Updates&Plugins > Install plugins` with name `Small Records`.

You can set permissions for plugin parts and created lists.

There are some settings in `Settings > Small Plugins > Small records`.

## **About Small Records**

Main idea behind this plugin is to have a place where I can easily organize records in several lists (like portfolio, partners, sliders and their images, simple photo galleries, etc.).

The simplest scenario is:

**Manage records:**
* Go to backend and open Records from top menu.
* Create some categories, tags, attributes.
* Create lists of records.
* Create records in those lists and assign categories, tags, attributes - if needed.

**Create pages**
* Create default *Layout* for all pages
* Create page `Record` with URL `/record/:record` 
  * Add component *Small Records > Record*
* Create page `Category` with URL `/category/:category`
  * Add component *Small Records > Category*
* Create page `Tag` with URL `/tag/:tag`
  * Add component *Small Records > Tag*
* Create page `Records` with URL `/records/:category?`
  * Add components *Small Records > Categories* and *Small Records > Records* 

**Visit frontend**

Go to page /records. There should be categories tags and records listed.

All records, categories and tags are connected with links.

> Look at the end of this documentation for more detailed how to.


## **Small Records parts**

## Lists

Lists are groups of records. They can be eg. Products, Photo albums, Logos, ...

Created list will be appended to the top of the left side menu.

### Add custom records form fields

When creating a new list you can allow predefined form fields or you can **create your own form** definition (based on repeater).

When creating or editing a *List*, open tab `Custom form fields` and allow its use.

Set basic settings and **add new fields** to your custom form.

Each list can has a different form.

*Look inside a default `Record detail` component partial to see how to work with custom repeater data.*

### Categories

Here you can manage categories.

They can be organized into a tree - click on button Reorder and drag&drop category over another one.

## Tags

Simple list of tags that can be assigned to records.

## Attributes

If you need to store a specific information for your records, that is not in default records form, here you can define a name of an attribute and it's type (string, text, number, switch).

Create or edit a record and go to tab Attributes (but this tab must be allowed in List settings to be visible!).

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

## **Components**

There are components and default partials ready to use in your Layout, Page or Partial.

Component's default partials are meant as templates - you should customize them to your needs as these can change in a future!

Best way to customize them is to copy them to yout theme folder like:

`/themes/my-theme/partials/records/default.htm`

*Folder `records` should be named after component's alias name. See more details in [OctoberCMS docs](https://octobercms.com/docs/cms/components#overriding-partials).*

### **Component: Categories**

Put default partial `{% component 'categories' %}` in your layout/page/partial to inspect how to work with categories lists.

Customize component's parameters.

### **Component: Tags**

Put default partial `{% component 'tags' %}` in your layout/page/partial to inspect how to work with tags lists.

Customize component's parameters.

### **Component: Records**

>You can add a Records component to a page, layout or partial.

Put default partial `{% component 'records' %}` in your layout/page/partial to inspect how to work with records lists.

Customize component's parameters.

#### **Component: Record**

Put default partial `{% component 'recordDetail' %}` in your layout/page/partial to inspect how to work with records lists.

Customize component's parameters.

## **Basic use case**

Install Small Records plugin.

In OctoberCMS backend click in main menu on **Records** and then in left pane on **Lists**. 

Create a new list.

Add some records to this list, add some categories, tags and attributes (and assign them to some of your records if you want).

### **Layout file**

Go to a CMS part of backend and create a layout file `Default` with content:

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

### **Single record page**

Create a CMS page with name `Record` and URL `/record/:record`.

Select its layout `Default`.

From left pane add a **Small Records > Record** component to the page content window on right side.

Save a file.

### **Single category page**

Create a CMS page with name `Category` and URL `/category/:category`.

Select its layout `Default`.

From left pane add a **Small Records > Category** component to the page content window on right side.

Save a file.

### **Single tag page**

Create a CMS page with name `Tag` and URL `/tag/:tag`.

Select its layout `Default`.

From left pane add a **Small Records > Tag** component to the page content window on right side.

Save a file.

### **Records and categories page**

Create a CMS page `Records` with URL `/records/:category?`.

Select its layout `Default`.

From left pane add components to the page content:

Save a file;

### **The result**

Open URL `/records' to see the records list.

You should be able to filter by category and tag and to click on records to see a detail.


# HOWTO

## Getting records with scopes

`Record::isActive()->area('news')->tag('important')->limit(6)->get();`


----
> Special thanks goes to:    
> [OctoberCMS](http://www.octobercms.com) team members and supporters for this great system.
> [Samuel Zeller](https://unsplash.com/@samuelzeller) for his photo I have used in the plugin banner.
> [Font Awesome](http://www.fontawesome.io) for Universal access symbol.


Created by [Jan Vince](http://www.vince.cz), freelance web designer from Czech Republic.
