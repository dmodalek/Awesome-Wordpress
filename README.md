# Awesome Wordpress

Install Wordpress, Plugins and the Awesome Theme using Yo Wordpress, a Yeoman Generator for Wordpress.

## Setup local machine

Create a new database

```
create database awesome_wordpress DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
```

Point your vHost to the project public folder

```
# Your Project
<VirtualHost *:80>
    ServerName your-project.loc
    DocumentRoot "/Users/You/Sites/Your-Project/public"
</VirtualHost>
```

Add this vHost to your hosts file

```
127.0.0.1 your-project.loc wwww.your-project.loc
```


## Install Wordpress, Theme and Plugins

Go to your project folder
 
```
$ cd ~/Sites/My-Project/public
```

Start Yo Wordpress install and answer all the questions

```
$ yo wordpress
```

Save the generated .yeopress file from the project to your user directory for future projects. Strip out project specific lines like the salt keys.

```
$ cp .yeopress ~/
```

Install your Wordpress plugins with Yo Wordpress

```
$ yo wordpress:plugin
```

i.e. advanced-custom-fields,contact-form-7,really-simple-captcha,password-protected,force-regenerate-thumbnails,wp-super-cache,simple-page-ordering,responsify-wp,wp-editor-widget,duplicate-post,wpremote

Add your paid plugins i.e. Migrate DB Pro manually to the /plugins folder.

Add the following to your .htaccess file:

```
## Leverage Browser Caching
## - https://developers.google.com/speed/docs/insights/LeverageBrowserCaching

<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg “access 1 year”
    ExpiresByType image/jpeg “access 1 year”
    ExpiresByType image/gif “access 1 year”
    ExpiresByType image/png “access 1 year”
    ExpiresByType text/css “access 1 month”
    ExpiresByType application/pdf “access 1 month”
    ExpiresByType text/x-javascript “access 1 month”
    ExpiresByType application/x-shockwave-flash “access 1 month”
    ExpiresByType image/x-icon “access 1 year”
    ExpiresDefault “access 2 days”
</IfModule>
```

## Details

Add wp-config.php to the .gitignore file and untrack it from GIT.

```
wp-config.php
```

Remove all the official Wordpress themes from the /themes folder i.e. twentyfourteen


## Whats next

* Open your browser and start the Wordpress install

* Activate the Theme and the Plugins

* **Read the Awesome Theme Readme.md**




