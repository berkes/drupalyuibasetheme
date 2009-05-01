// $Id: script.js,v 1.1.2.3 2009/05/01 18:04:45 jmburnz Exp $

/**
 * Animates submit buttons, prevents clicking twice.
 */
var Genesis={};Genesis.go=function(e){var destination=e.options[e.selectedIndex].value;if(destination&&destination!=0)location.href=destination;};Genesis.formCheck=function(){var forms=$("#node-form>div>div>#edit-submit,#comment-form>div>#edit-submit,#user-register>div>#edit-submit");$('<div id="saving"><p class="saving">Saving…</p></div>').insertAfter(forms);forms.click(function(){$(this).siblings("input[@type=submit]").hide();$(this).hide();$("#saving").show();var notice=function(){$('<p id="saving-notice">Not saving? Wait a few seconds, reload this page, and try again.</p>').appendTo("#saving").fadeIn();};setTimeout(notice,24000);});};if(Drupal.jsEnabled){$(document).ready(Genesis.formCheck);}