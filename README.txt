Genesis README.txt
		
Genesis is a kick-ass theme framework for Drupal 6. Genesis allows
you to quickly build any theme using its preconfigured directory structure, 
tpl files and modular stylesheets.

For online help see the Genesis documentation: http://drupal.org/node/323404


## CREATE A NEW SUBTHEME
   To create your subtheme first make a copy of the ~/genesis_SUBTHEME/ directory.

   The best place to save your new sub-theme is ~/sites/all/themes/

   The new subtheme does not have to be inside the /genesis/ diretory, as this
   is optional in Drupal 6.

1. The New Sub-theme Folder ~/genesis_SUBTHEME folder
   Change "SUBTHEME" to your theme name e.g. /genesis_mytheme 

2. The .info File ~/genesis_SUBTHEME/genesis_SUBTHEME.info
   Change "SUBTHEME" to your theme name e.g genesis_mytheme.info
   Inside the .info file change:
    1) the theme name
    2) the description


## LAYOUT - How to Change the Layout

   Open these two files:
   ~/genesis/genesis/css/layout.css
   ~/genesis_SUBTHEME/page.tpl.php
		  
   In layout.css you will find the 4 preconfigured layout methods to choose from.
				
   To change the layout select the ID selector that matches your preferred layout and 
   change the <body id="...."> in page.tpl.php
				
   By default this is <body id="genesis_1">. Save and upload the file and viola, the layout 
   will automagically change. 


## OVERRIDING THE LAYOUT

   If you want to change the sidebar widths or otherwise modify the layout, simply copy
   the relevant layout CSS to your page.css file in your subtheme and modify it there.

				
## SUBTHEME PREPROCESS FUNCTIONS
				
   If you need to use a preprocess funtion open the template.php file
   in your new subtheme (one is included by default) and rename the function
   using your theme name e.g. mytheme_preprocess_page. This follows the standard
   Drupal convention of themeName_preprocess_hook.

   
   
   