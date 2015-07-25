# Add Background-Size to Customizer WP Plugin
This plugin for Wordpress adds a background-size controller to the Background Image section in the Wordpress Customizer. 

You can access the new controller by going to **Appearance > Customize** from the Dashboard, and clicking on the **Background Image** section.

Once you've added your custom background image, you can set your background-image size to: 
 - "Cover": As large as possible; fills entire view, with cropping.
 - "Contain": As large as possible, without cropping; fits inside of view.
 - "100% width": Width fits view perfectly, height may be smaller or larger than view (equivalent to css '100% auto').
 - "100% height": Height fits view perfectly, width may be smaller or larger than view (equivalent to css 'auto 100%').
 - "Inherit": Sets background size to whatever parent element is set to (html, in this case).
 - "Custom": Allows you to put in your own css to be applied in the section called "CSS for background-size (if 'custom' selected)." 

To learn more about the CSS background-size property, go to: 

https://developer.mozilla.org/en-US/docs/Web/CSS/background-size
or
http://www.w3schools.com/cssref/css3_pr_background-size.asp 

**Notes:**
 - *This plugin was created on WP 4.2.3, but it should work with WP 3.4 and greater.*
 - *The plugin works by adding styles to the body.custom-background class. If the default custom-background support has been disrupted, then this plugin will not work.*
 - *I gladly accept critiques and contributions to this plugin, but I want to keep it as simple and lightweight as possible!*
 

--CB
