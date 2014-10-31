# Awesome Wordpress

A quickstart for your next Wordpress project. Installs Wordpress, Plugins and the Awesome Theme from the command line.

<img src="https://raw.github.com/dmodalek/awesome-wordpress/master/public/wp-content/themes/awesome-theme/screenshot.png" width="440">

## Quickstart

Clone this repo in your project folder
 
```
$ git clone git@github.com:dmodalek/Awesome-Wordpress.git .
```

Install Wordpress dependencies

```
$ npm install
$ bower install
$ gulp install
```

Install Theme Dependencies

```
cd /public/wp-content/themes/awesome-theme

$ npm install
$ bower install
$ grunt
```

Point your vHost to the project public folder

```
# Your Project
<VirtualHost *:80>
    ServerName your-project.loc
    DocumentRoot "/Users/You/Sites/Your-Project/git"
</VirtualHost>
```

Add this vHost to your hosts file

```
127.0.0.1 your-project.loc wwww.your-project.loc
```


## Whats next

* Open your browser and start the Wordpress install
 — or use the MySQL Dump from the res folder (user: dmodalek / pw: local)

* Activate the Theme and the Plugins

* Search & replace all occurences of "awesome-textdomain" and "awesome-theme"

* Rename the Theme Folder 

```
$ mv awesome-theme my-theme
```


## Documentation

###Picturefill

**Responsive and high-res images for Wordpress**

- A modified version of Picturefill v1 is used. For more Infos see bower.json
- Version 1.x instead of 2.x is used. Version 2.x is still in Beta, 
and high-res images do not work across mayor browsers. For no-js degradation, Picturefill 2.x only shows ALT text, where 1.x shows an image fallback

Configure: Define image sizes and media queries in inc/wp-theme.php. The filter in inc/wp-hooks.php does the rest.


### Live Reloading

**Reload the Browser and inject changes from CSS, JS and Markup**

tbd

### Sourcemaps

**Debug your LESS and Javascript Files using Sourcemaps**

tbd

 
### Development

**Various Developer Tools for debugging and building your assets**

* Build your assets with Grunt or Gulp
* Automatic CSS Vendor prefixes
* Debug Helper for the Grid System
* .editorconfig for consistent coding styles in IDEs
* .gitignore to ignore standard ignorables such as .DS_Store
* .jshintrc file for configuring JavaScript linting




