#Event Espresso - Custom Template Mover v0.1

##Introduction
Using Event Espresso on WP Engine, I quickly ran into a big issue... By default, Event Espresso only supports a single location for saving custom template modifications (/wp-content/uploads/espresso). While a little funky, this wasn't a problem until I started using WP Engine's Git deployment system which DOESN'T allow pushes for anythign within the uploads directory! Arg!

Simply put, this plugin overrides Event Espresso's folder declarations and forces the plugin to use a new location (within the theme's directory) to access template files. The result is that WP Engine users can now use Git to both track and deploy template files without resorting to modifying files in the _actual_ plugin! Yay!

##Usage
1. Make a new folder in your theme (or Child Theme) directory named **event-espresso** (e.g. /wp-content/twentyfourteen-child/**event-espresso**/
2. Creat two subfolders, **templates** and **gateways**, within the folder created in the previous step.
3. Copy **template** files from the Event Espresso plugin folder to: **{THEME-DIR}/event-espresso/templates/**
4. Copy **gateway** files from the Event Espresso plugin folder to: **{THEME-DIR}/event-espresso/gateways/**
5. Activate plugin
6. Confirm that Event Espresso acknowledges the new location by checking the "Developers Only" section of the "Template Settings" page in the dashboard...

##Support
This is a fairly hacky fix to a problem, if you have issues with this plugin there may not be much that I can do to help but feel free to open an issue if you have trouble.

##Contribution
Pull requests welcome :)