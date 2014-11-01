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
    DocumentRoot "/Users/You/Sites/Your-Project/git"
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

i.e. advanced-custom-fields,contact-form-7,really-simple-captcha,password-protected


## Whats next

* Open your browser and start the Wordpress install

* Activate the Theme and the Plugins

* Read the Awesome Theme Readme.md




