#Pico Section Naviagtion

Shows the child pages from a section page.
This plugin will only output the contents of the section (folder) the content is in.
This helps with blog posts and even ecommerce type sites.


Installation
------------

copy the php file in your plugin folder

Setup
-----

Use just like the base template navigation, sorting is set on the config.php file.

    {% for page in section_navigation.navigation %}
        <a href="{{ page.url }}">{{ page.title }}</a><br>
    {% endfor %}
