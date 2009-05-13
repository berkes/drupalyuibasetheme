
  Genesis README.txt
		
  Genesis is a kick-ass starter theme Drupal 6. Genesis allows
  you to quickly build any theme using its preconfigured directory structure, 
  template files and modular stylesheets.

  Online Genesis documentation: http://drupal.org/node/323404

  This is a basic guide for getting started with your own subtheme.



  CREATE A NEW SUBTHEME
  Online docs: http://drupal.org/node/439698
  
  1. First copy/paste one of the subthemes: 
   
     genesis_LITE (less html, same features)
     genesis_SUBTHEME (more html, easier to theme)

     Save your new sub-theme in the sites/all/themes directory.

  2. Rename the new subtheme folder with your theme name. For example if you 
     want to name your theme "foo" name the folder "genesis_foo".

  3. Rename genesis_SUBTHEME.info file. For example "genesis_foo.info".

  4. Inside the genesis_foo.info file change:
      - the theme name
      - the description
       
     Internet Explorer CSS: 
     If you want to use an IE stylesheet follow the instructions in the info 
     file for downloading the Conditional Styles module and setting up 
     the stylesheets. http://drupal.org/project/conditional_styles
       
     Equal hight columns: 
     Uncomment the jQuery script in genesis_foo.info.
       
     WAI ARIA Roles: 
     By default these are enabled. If for some reason you do not want them
     simply comment out the jQuery script in genesis.info (the core info file, not your
     subthemes).
  
       

  SETTING UP THE LAYOUT
  Online docs: http://drupal.org/node/439670
  
  First open these two files:
  /genesis/genesis/css/layout.css
  /genesis_foo/templates/page/page.tpl.php (your subthemes page.tpl.php file)
		  
  In layout.css you will find the preconfigured layout methods to choose from.
   
  There are 3 main layouts, please see the documentation in layout.css.
				
  To change the layout select the ID selector that matches your preferred layout and 
  change the <body id="...."> in page.tpl.php
				
  By default this is <body id="genesis_1a">.



  OVERRIDING THE LAYOUT
  Online docs: http://drupal.org/node/439670
  
  If you want to change the sidebar widths or otherwise modify the layout, simply copy
  the relevant layout CSS to your page.css file in your subtheme and modify it there.
  
		
		
  SUBTHEME PREPROCESS FUNCTIONS
				
  If you need to use a preprocess funtion open the template.php file
  in your new subtheme (one is included by default) and rename the function
  using your theme name e.g. mytheme_preprocess_page. This follows the standard
  Drupal convention of themeName_preprocess_hook.

   
   
   
   
   
   

   