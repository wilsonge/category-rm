Categories Readmore text
========

This plugin allows you to gain usage of the readmore functionality given in com_content articles.

After running this plugin event in your code you can find available two extra variables - fulltext and introtext (assuming you inject a valid object with a description property - like a category).

The plugin was initially built for splitting up category descriptions (as part of the stack overflow question at http://joomla.stackexchange.com/questions/9537/read-more-introtext-fulltext-functionaltiy-in-category-page-in-joomla-3-x/)

Instructions for use
=========

Install and enable the plugin. In your code add in the relevent calls to the event. For example in com_content, com_contact, com_weblinks you should template override the following file: https://github.com/joomla/joomla-cms/blob/3.4.1/layouts/joomla/content/category_default.php

In the template override file at line 48 (https://github.com/joomla/joomla-cms/blob/3.4.1/layouts/joomla/content/category_default.php#L48) change the code to the following:

```php
<?php $displayData->get('category')->description = JHtml::_('content.prepare', $displayData->get('category')->description, '', $extension . '.category'); ?>
<?php $category = $displayData->get('category'); ?>
<?php JEventDispatcher::getInstance()->trigger('onCategorySplit', array(&$category)); ?>
<?php echo $category->introtext; ?>
```

The variable category now contains your category object but with the added parameters of ```introtext``` and ```fulltext``` like in your articles which you can now manipulate to your heart's content