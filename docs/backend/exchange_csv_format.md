# Ergonode csv exchange format

Data exchange takes place via dedicated csv files, and
it allows you to export or import data such as:

|Data|File|
|-|-|
|Attributes|attributes.csv|
|Attribute options|options.csv|
|Templates|templates.csv|
|Template elements|templates_elements.csv|
|Categories|categories.csv|
|Multimedia|multimedia.scv|
|Products|products.scv|

## Attributes

|column|Description|Required|Limitation|
|-|-|-|-|
|_code|Attribute Code|Yes|Max length 128 chars, accept only letters numbers and "_" character| 
|_type|Attribute type|Yes|One of attribute types|
|_language|Language code|Yes|Pair of language and country code eg. en_GB|
|_name|Attribute name|No|Max length 255 characters|
|_hint|Attribute hint|No|Max length 4000 characters|
|_placeholder|Attribute hint|No|Max length 255 characters|
|_scope|Attribute scope|YES|LOCAL for local scope or GLOBAl for global|
|format|Date format|YES if attribute type is DATE|One of available date attribute formats|
|currency|Currency format|YES if attribute type is MONEY|One of available currencies|
|rich_edit|specifies whether the attribute is a plain text field or rich edit|YES if attribute type is TEXTAREA|true or false|
|unit|Unit code|YES if attribute type is UNIT|One of available units| 

## Attributes options

|column|Description|Required|Limitation|
|-|-|-|-|
|_code|Attribute option code|Yes|Max length 128 chars, accept only letters numbers and "_" character|
|_language|Language code|Yes|Pair of language and country code eg. en_GB|
|_label|Option label|No|Max length 255 characters|
|_attribute|Attribute code|Yes|Max length 128 chars, accept only letters numbers and "_" character, attribute must exist in system|

## Categories

|column|Description|Required|Limitation|
|-|-|-|-|
|_code|Category code|Yes|Max length 128 chars, accept only letters numbers and "_" character|
|_name|Option label|No|Max length 255 characters|
|_language|Language code|Yes|Pair of language and country code eg. en_GB|

## Templates

|column|Description|Required|Limitation|
|-|-|-|-|
|_name|Template name|No|Max length 255 characters|
|_language|Language code|Yes|Pair of language and country code eg. en_GB|

## Templates elements

|column|Description|Required|Limitation|
|-|-|-|-|
|_name|Template name|No|Max length 255 characters|
|_type|template element type|Yes|one of attribute or ui|
|_language|Language code|Yes|Pair of language and country code eg. en_GB|
|_x|Horizontal position of element on the template|Yes|numeric value between 0 and 3|
|_y|Vertical position of element on the template|Yes|numeric value starts from 0|
|_width|Width of element on the template|Yes|numeric value between 0 and 3|
|_height|Height of element on the template|Yes|numeric value between 0 and 3|
|attribute|Attribute code|Yes if _type is attribute|Max length 128 chars, accept only letters numbers and "_" character, attribute must exist in system|
|require|Attribute required| Yes if _type is attribute|true or false|
|label|Label| Yes if _type is ui|max 255 characters|

## Templates elements

|column|Description|Required|Limitation|
|-|-|-|-|
|_name|Template name|No|Max length 255 characters|
|_type|template element type|Yes|one of attribute or ui|
|_language|Language code|Yes|Pair of language and country code eg. en_GB|
|_x|Horizontal position of element on the template|Yes|numeric value between 0 and 3|
|_y|Vertical position of element on the template|Yes|numeric value starts from 0|
|_width|Width of element on the template|Yes|numeric value between 0 and 3|
|_height|Height of element on the template|Yes|numeric value between 0 and 3|
|attribute|Attribute code|Yes if _type is attribute|Max length 128 chars, accept only letters numbers and "_" character, attribute must exist in system|
|require|Attribute required| Yes if _type is attribute|true or false|
|label|Label| Yes if _type is ui|max 255 characters|

## Multimedia

|column|Description|Required|Limitation|
|-|-|-|-|
|_name|multimedia name, identifier, used for linking in the product.csv file|Yes|Max length 128 characters|
|_url|Downloadable multimedia url|Yes|Valid supported multimedia resource url|
|_language|Language code|Yes|Pair of language and country code eg. en_GB|
|_alt|Multimedia alt for given language|No|Max length 128 characters|

## Products

|column|Description|Required|Limitation|
|-|-|-|-|
|_sku|Product sku|Yes|Max length 255 characters|
|_language|Language code|Yes|Pair of language and country code eg. en_GB|
|_type|Product type|Yes|one of product types (SIMPLE-PRODUCT, GROUPING-PRODUCT, VARIABLE-PRODUCT)|
|_children|Product children skus, used for variable and grouping product|No|Available in system sku, separated by commas|
|_bindings|Product attribute binding for the variable product|No|Available in system attribute codes, separated by commas|
|_categories|Product categories|No|Available in system category codes, separated by commas|

Product imports can have additional columns, where a single column represents the values for a selected attribute.
In this case the column name must be the same as the code of the selected attribute and the values and their format will depend on the type of attribute.

### Supported attribute types

|Attribute type|Limitation|
|-|-|
|TEXT|Max length 255 characters|
|TEXTAREA||
|NUMERIC|Numerical values|
|PRICE|Numerical values|
|UNIT|Numerical values|
|DATE|value in supported date format|
|SELECT|Option code for given attribute|
|MULTI_SELECT|Option codes for given attribute, separated by commas|
|IMAGE|Multimedia name, allows only image type multimedia|
|GALLERY|Multimedia names separated by commas, allows only image type multimedia|
|FILE|Multimedia names separated by commas|