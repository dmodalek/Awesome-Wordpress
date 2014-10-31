# Awesome Wordpress

A quickstart for your next Wordpress project. Installs Wordpress, Plugins and the Awesome Theme from the command line.


## Quickstart

Clone this repo in your project folder
 
```
$ git clone git@github.com:dmodalek/Awesome-Wordpress.git .
```

Install Wordpress dependencies

```
$ bower install
$ npm install
$ gulp install
```

Install Theme Dependencies

```
cd /public/wp-content/themes/awesome-theme

$ bower install
$ npm install
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
 — or use the MySQL Dump from the awesome-theme/res folder (user: dmodalek / pw: local)

* Activate the Theme and the Plugins

* Search & replace all occurences of "awesome-textdomain" and "awesome-theme"

* Rename the Theme Folder 

```
$ mv awesome-theme my-theme
```



