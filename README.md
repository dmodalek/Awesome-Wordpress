# Awesome Wordpress

An opinionated Boilerplate for your next Wordpress Project.

<img src="https://raw.github.com/dmodalek/awesome-wordpress/master/public/wp-content/themes/awesome-theme/screenshot.png" width="440">

## Quickstart

* Clone this repo in your project folder
```bash
  $ git clone git@github.com:dmodalek/Awesome-Wordpress.git .
```
* Install dependencies
```bash
  $ npm install
```
* Build with Grunt
```bash
  $ grunt
```
* Point your vHost to the project public folder
```bash
# Your project
<VirtualHost *:80>
    ServerName your-project.loc
    DocumentRoot "/Users/You/Sites/Your-Project/git"
</VirtualHost>
```
* Rename wp-config-sample.php to wp-config.php
```bash
$ cp wp-config-sample.php wp-config.php
```
* Open your browser and start the Wordpress install

* Rename the "awesome-theme" Folder and search / replace all occurences of "awesome-textdomain"

## Features

* Livereloading the browser and file injection upon changes in CSS, JS or HTML
* Sourcemaps for CSS and JS
* Automatic CSS Vendor prefixes
* Debug Helper for your Grid System
* Baseline HTML5 template and features, DNS prefetching, responsive meta
* Encourages one-file CSS/JS in the view (HTML) for performance
* Includes jQuery CDN and relative fallback
* Includes Modernizr and HTML5 Shiv
* Google Universal Analytics snippet
* Open source workflow with Grunt.js running on Node.js
* Includes .editorconfig for consistent coding styles in IDEs
* Standard .gitignore to ignore standard ignorables such as .DS_Store
* JSHint .jshintrc file for configuring JavaScript linting


## Technology
* Grunt [http://gruntjs.com](http://gruntjs.com)
* Terrific [https://github.com/brunschgi/terrificjs](https://github.com/brunschgi/terrificjs)
* Fireshell [github.com/toddmotto/fireshell](https://github.com/toddmotto/fireshell)
