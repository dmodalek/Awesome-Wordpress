# Awesome Wordpress

![Awesome Wordpress](https://raw.github.com/dmodalek/awesome-wordpress/master/public/wp-content/themes/awesome-theme/screenshot.png)

A Kickstart for your next Wordpress Project using Terrific, LESS and Grunt.

- Based on [github.com/dmodalek/awesome-kickstart](http://github.com/dmodalek/awesome-kickstart)


Quickstart
------

## Getting started

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


Fronend Architecture
------

1-normalize.less - cross browser default styles (http://necolas.github.io/normalize.css)
2-vars.less - define variables like colors or font-sizes
3-grid.less - grid  classes and mixins
4-helper.less - classes and mixins to use in every project like clearfix or vertical align
5-typo.less - typography and font families
6-elements.less - default styles for html elements like link color or paragraph margins
7-objects.less - reusable code snippets for UI objects like navigations or flyouts
8-wordpress.less - wordpress specific classes for the rich text editor
