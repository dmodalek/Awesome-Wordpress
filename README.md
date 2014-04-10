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
