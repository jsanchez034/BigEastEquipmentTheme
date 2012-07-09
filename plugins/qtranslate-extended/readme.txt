=== Plugin Name ===
Contributors: fractalia - applications lab
Tags: qtranslate, multilanguage, wordpress
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: trunk

== Description ==

This plugin is based on qtranslate and make other plugins multilanguage. Also add a multilanguage widget for use in sidebars.

Compatible with wordpress 3.0+

== Installation ==

Copy the qtranslate-extended file in wp-content/plugins and activate it.

== How to use ==

Simply add the class "multilanguage-input" to all the elements which you want to get multilanguage (input, textarea). It will make the elements multilanguage, so the information will be saved using the qtranslate structure &lt;!--:en--&gt;Content EN&lt;!--:--&gt;&lt;!--:es--&gt;Contenido ES&lt;!--:--&gt;

Do not forget to [apply the filters](http://codex.wordpress.org/Function_Reference/apply_filters) [apply_filters(key, content)] before show the text. Also you can use the "__" function and the "_e" function for display the content correctly.

== Changelog ==

0.1 Initial version
