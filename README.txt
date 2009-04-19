Genesis README.txt
		
Genesis is a kick-ass theme framework for Drupal 6. Genesis allows
you to quickly build any theme using its preconfigured directory structure, 
tpl files and modular stylesheets.

For online help see the Genesis documentation: http://drupal.org/node/323404
		
## CREATE A NEW SUBTHEME
   To create your sub-theme first make a copy of the ~/genesis_SUBTHEME/ directory 
   and rename every instance of "SUBTHEME" to your theme name.

   The best place to save your new sub-theme is ~/sites/all/themes/

   The new subtheme does not have to be inside the /genesis/ diretory, as this
   is optional in Drupal 6.


## The New Sub-theme Folder ~/genesis_SUBTHEME folder
   Change "SUBTHEME" to your theme name e.g. /genesis_mytheme 


## The .info File ~/genesis_SUBTHEME/genesis_SUBTHEME.info
   Change "SUBTHEME" to your theme name e.g genesis_mytheme.info
   Inside the .info file change:
    1) the theme name
    2) the description


## The CSS file ~/genesis_SUBTHEME/genesis_SUBTHEME.css
   Change "SUBTHEME" to your theme name e.g genesis_mytheme.css. This is the 
   main CSS file for your theme and the one you will add the majority of your
   modifictions to.


## LAYOUT - How to Change the Layout:

   Open these two files:
   ~/genesis/layout.css
   ~/genesis_SUBTHEME/page.tpl.php
		  
   In layout.css you will find 7 preconfigured layouts to choose from. Take a look
   at that file now - there are visual comments that describe each layout.
				
   To change the layout select the ID selector that matches your preferred layout and 
   change the <body id="...."> in page.tpl.php
				
   By default this is <body id="genesis_1">. Save and upload the file and viola, the layout 
   will automagically change. 
				
				
## SUBTHEME PREPROCESS FUNCTIONS
				
   If you need to use a preprocess funtion open the template.php file
   in your new subtheme (one is included by default) and rename the function
   using your theme name e.g. mytheme_preprocess_page. This follows the standard
   Drupal convention of themeName_preprocess_hook.

   
   
   