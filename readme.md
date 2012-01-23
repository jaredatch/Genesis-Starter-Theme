#Starter Genesis Child Theme

**Author**: [Jared Atchison](http://www.jaredatchison.com) ([@jaredatch](http://www.twitter.com/jaredatch))   
**Version**: 1.2  
**Requires at least:** [WordPress 3.3](http://wordpress.org) and [Genesis 1.8](http://www.jaredatchison.com/go/genesis/)  
**License**: GPLv2

###Description

This is my personal "starter" theme (base theme) I use when working with a project running the Genesis Framework. It is based off of the default [Genesis 1.8 stylesheet](http://demo.studiopress.com/?wptheme=genesis) by StudioPress with some minor modifications. Feel free to use it as you see fit. Obviously, it requires the [Genesis Framework](http:www.jaredatchison.com/go/genesis/). Suggestions and forks encouraged.

You may also want to check out Bill Erickson's starter Genesis [child theme](https://github.com/billerickson/BE-Genesis-Child) which is very similar.

###Features and Tweaks
#####General
- Added `genesis-structural-wraps` support
- Added `add_editor_style()` support
- Added filter to prevent theme updates
- Added default `home.php`
- Added Footer Navigation menu
- Added filter to remove post edit links
- Removed Seconday Navigation Menu via `add_theme_support('genesis-menus')`
- Optionally register global javascript
- Optionally remove extra layouts and sidebars
- Optionally register additional sidebars
- Optionally add aditional image sizes

#####CSS
- Removed Oswald font (I never use it)
- Removed Table of Contents
- Set body `font-size` to 14px (was 16px)
- Combined post meta and post info sections
- Added `#footernav` CSS
- Added `table` styles from [Twitter Bootstrap](http://twitter.github.com/bootstrap/)
- Added `pre` and `code` styles from Twitter Bootstrap
- Added optional `img.frame` class, adapted from Twitter Bootstrap
- Added `editor-style.css` with body styling and column class support


###CHANGE LOG

####v1.2
- Rereleased on new repo, total rebuild from previous versions.

####v1.0
- Initial commit.

