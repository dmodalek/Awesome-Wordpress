# Awesome Wordpress

A quickstart for your next Wordpress project. Installs Wordpress, Plugins and the Awesome Theme from the command line.


## Quickstart

Clone this repo in your project folder
 
```
$ git clone git@github.com:dmodalek/Awesome-Wordpress.git .
```

Install dependencies

```
$ bower install
$ npm install
$ gulp install
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

Create a new database

```
create database awesome_wordpress DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
```


## Whats next

* Open your browser and start the Wordpress install

* Activate the Theme and the Plugins

* Read the Awesome Theme Readme.md




