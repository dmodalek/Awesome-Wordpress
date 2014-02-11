Wordpress-Awesome-Theme
=======================

A starter theme for wordpress. Based on:

- twentyfourteen and _s Wordpress Theme
- Inuit CSS (https://github.com/csswizardry/inuit.css)
- Terrific Micro Wordpress Integration (https://github.com/Epicuri0us/terrific-micro-integration-wordpress)
- Terrific JS (https://github.com/brunschgi/terrificjs)
- Mobile Boilerplate


## Quickstart

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
In your IDE, search for "awesome-textdomain" and replace it with your own text domain

## Build Frontend Files

Install dependencies
```
$ npm install
```
Start Grunt
```
$ grunt
```

## Features

### Environment detection
APP_ENV is automatically set to *dev* or *prod* depending on your virtual host name. If your virtual host name contains *.loc*, APP_ENV is set to *dev*.
In the *dev" environment, non-minified assets are referenced and Wordpress debugging is activated. See *debug.log* for PHP Errors.

### Frontend Helper
Press *G* to see the Grid Helper in the Frontend.

### Coding Style
*.editorconfig* defines consistent coding styles for your IDE. You need to install a plugin for your IDE, see http://www.editorstyle.org.