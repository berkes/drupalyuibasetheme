
  /genesis/css
  
  base.css
    Base is the master reset for browsers and Drupal. Base contains an exact
    copy of the modular stylsheets in /genesis/css/modular:

    - typography.css
    - tables.css
    - messages.css
    - lists.css
    - forms.css
    - admin-styles.css

    By default Genesis uses base.css, mainly because Drupal can 
    load a ridiculus number of stylesheets depending on what modules
    you have enabled; base.css is an effort to reduce http requests and 
    mitigate triggering IE's max 30 linked stylesheets issue.

    To gain more control over the stylesheets you can unset this and load
    a subset of the modular stylesheets - see genesis.info.
    
    NOTE: You shoud NEVER modify base.css OR any of the modular stylesheets.
          The correct method is to override the styles in your subthemes
          style.css file.
  
  
  edit-links.css
    Style edit links for blocks and views.
    
 
  grid.css
    Enable this if you want to show the vertical grid for text flow.
    You will need to add the "grid" CSS class to the #container div
    in page.tpl.php.
    
    
  layout.css, layout-tidy.css
    Genesis layout methods - layout.css has full instructions and comments
    included. layout-tidy.css is a compressed verions of layout.css and is
    the one Genesis uses by default.
    
    
    
  /genesis/ie
  
  ie-example.css
    Support for the Conditional Styles module. 
 
    This module allows themes to specify conditional stylesheets in their .info file 
    and the conditional comments will be automatically included at the end of the 
    standard $styles variable. 
 
    http://drupal.org/project/conditional_styles
 
    Install the module and then uncomment or add the required stylesheets in your¨
    subthemes .info file.
 
    Core IE stylesheet. Add declarations here for ALL subthemes. To add IE styles
    to only one subtheme, see your subthemes css/ie/ie.example.css file for instructions.
  
  
  
  /genesis/modular
  
  admin.css
    Basic styles for admin sections.
 
  forms.css
    Basic styles for forms.
 
  lists.css
    Global list reset.
 
  messages.css
    Basic styles for messages.
 
  tables.css
    Set styles for tables.
 
  typography.css
    Reset styles for typographical elements.
 
 
 
 
 
 
 
 
 
