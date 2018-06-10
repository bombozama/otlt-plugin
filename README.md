# One True Lookup Table Plugin (OTLT) for OctoberCMS
Allows to add and manage lookup categories easily. Intended for situations in which you need many small text-based lookup tables (maybe for dropdowns only). Keeps the code clean by enabling a dynamic controller that handles all your categories.

This will save you time if you are working with a lot of identical key/value based models and controllers.

Use with caution: OTLT IS POOR DATABASE DESIGN. If your lookup table needs to hold more than just key/string-value data, go with a regular model and do the work.

You should install only if you are still convinced to have a OTLT after reading these (or googling about it): 

* [Best practices for using Simple Lookup Tables](https://www.apress.com/gp/blog/all-blog-posts/best-practices-for-using-simple-lookup-tables/13323426)
* [Lookup table madness](http://www.sqlservercentral.com/articles/Advanced/lookuptablemadness/1464/)
* [Five Simple Database Design Errors You Should Avoid](https://www.red-gate.com/simple-talk/sql/database-administration/five-simple-database-design-errors-you-should-avoid/)

## Features
* Includes key/value/extra-value/is_published fields (pretty common)
* Includes a user_id field so that certain categories can be revisionable
* Soft delete ready
* Form fields are easily overridable
* List headers are easily overridable
* Permissions enabled

## Installation
* Install the plugin
* Extend it in your plugin's boot method (more on this later)

## Creating a lookup category
* To create a lookup category, just create a model in your plugin tha extends \Bombozama\OTLT\Models\LookupValue
* Add two entries in your language file.
* You can now navigate to bombozama/otlt/lookupvalues/index/your_model_name to start working with your lookup category

## Optionals
* Restrict access by creating permissions
* Add navigation shortcuts to lookup category management
* Override form fields by creating a new form field definition
* Override list headers by creating a new list columns definition

## Future
* Work on the documentation
* Add special cases to documentation (file attachments)

## Like this plugin?
If you like this plugin, give this plugin a Like or please consider making a donation.