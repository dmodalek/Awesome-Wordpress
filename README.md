Wordpress Awesome Theme
=======================

![Awesome Theme](https://raw.github.com/dmodalek/wordpress-awesome-theme/master/screenshot.png)

A wordpress boilerplate theme which is based on:

- The Terrific Concept (https://github.com/brunschgi/terrificjs)
- The official Wordpress Starter Theme (https://github.com/Automattic/_s/)
- HTML5 Mobile Boilerplate (http://html5boilerplate.com/mobile)
- Grunt (https://github.com/gruntjs/grunt)


Quickstart
------

Download Wordpress from http://wordpress.org/download or via command line
```
$ curl -O http://wordpress.org/latest.tar.gz
$ tar -xvzf latest.tar.gz
```
Change directory to /themes dir
```
$ cd my-project/public/wp-content/themes
```
Clone Awesome Theme
```
$ git clone git@github.com:dmodalek/wordpress-awesome-theme.git my-theme-name
```
Rename wp-config-sample.php to wp-config.php
```
$ cp wp-config-sample.php wp-config.php
```
Start the famous Wordpress 5 Minute Install
```
$ open http://your-project.loc/wp-admin/install.php
```
In your IDE, search for "awesome-textdomain" and replace it with your own text domain

Build Frontend Files
------

Install dependencies
```
$ npm install
```
Start Grunt
```
$ grunt
```

Features
------

### Environment detection
APP_ENV is automatically set to __dev__ or __prod__ depending on your virtual host name. If your virtual host name contains __.loc__, APP_ENV is set to __dev__.
In the __dev__ environment, non-minified assets are referenced and Wordpress debugging is activated. See __debug.log__ for PHP Errors.

### Frontend Helper
Press __G__ to see the Grid Helper in the Frontend.

### Coding Style
__.editorconfig__ defines consistent coding styles for your IDE. You need to install a plugin for your IDE. For more info, see http://www.editorstyle.org.