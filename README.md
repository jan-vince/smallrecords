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

### Permissions

You can set permissions to access each of a plugin parts.

### Settings

* You can configure connection between (Rainlab) Blog posts and Records.

* You can set list's preview image height and width.


## Records

> Main idea behind this is to have a place where I can easily collect records in several lists (like portfolio, partners, sliders and their images, simple photo galleries, etc.).

### Records lists

Create one or more lists of records and assign form fields that you want to be visible in the list.

*Created list will be appended to the top of the side menu in Records administration.*

### Categories

Here you can set up categories hierarchy (it is a nested tree).

*There are components ready to use for categories listing in Twig.*

### Tags

Simple list of tags that can be assigned to records.

### Attributes

If you need a specific information for your records, here you can define a name of an attribute and it's type (string, text, number, switch).

If Attributes are allowed in Records list, you can select an attribute and add a custom content to it.

#### Access attributes in Twig

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

You can export and import data to Categories and to Records (Records through Import/Export buttons in Lists toolbar).


## Components

### Records

You can add a Records component to a page, layout or partial.

*There are several parameters - only Records list slug is required.*

You can access all properties in twig like: ````{{records.property('detailPageSlug')}}````

#### Record detail

You can add a record detail to yout page, layout or partial.

*Record list and record slug is required.*



----
> Special thanks goes to:    
> [OctoberCMS](http://www.octobercms.com) team members and supporters for this great system.
> [Samuel Zeller](https://unsplash.com/@samuelzeller) for his photo I have used in the plugin banner.
> [Font Awesome](http://www.fontawesome.io) for Universal access symbol.


Created by [Jan Vince](http://www.vince.cz), freelance web designer from Czech Republic.
