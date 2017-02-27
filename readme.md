# Crowdsourcing Platform on Omegawiki and Wordnet synset alignments

This platform asks users whether WordNet synset and Omegawiki synset are matched in the given task.

In below example, an user is asked to choose one of two WordNet synsets that most likely matches with OmegaWiki Concept Definition.

<div align="center">
  <img src="https://1.bp.blogspot.com/-o6SEkJenA20/WK8PMfS7kCI/AAAAAAAABDc/2LNhUJ86s-UNk-ZWGhqeIwBSre_Oxi7zACLcB/s1600/map.png"><br><br>
</div>

As can be seen from here, an user can select one of the three answers, placed in the right side. 

## Web Frameworks:
* [Zend Framework v.1.2](https://framework.zend.com/manual/1.12/en/manual.html)
* [Webix v.3.0.6](http://webix.com/)
* [Angularjs v1.1.5](https://angularjs.org/)

## Installation:
Follow the below steps in order to run this platform.

* Download [MAMP server](https://www.mamp.info/en/downloads/)
* Run the MAMP server manually on your localhost using the port 8888.
* Open the terminal in MAC OSX (open cmd in Windows).
```
MAC OSX 
run in the terminal: 
cd /Applications/MAMP/htdocs 
mkdir essence

Windows 
run in the cmd: 
cd C:\MAMP\htdocs\ 
mkdir essence

Copy all the project files into the following folder:
(MAC OSX): /Applications/MAMP/htdocs/essence/ 
(Windows): C:\MAMP\htdocs\essence\ 

```
* Access to phpMyAdmin. http://localhost:8888/phpMyAdmin/
* Create a mysql database titled "omega2wn".
* Import the omega2wn.sql file into the database "omega2wn".
* Configure the database connection, and Open the file application/configs/application.ini
```
Fill the following configurations according to the settings in your machine.

resources.db.params.host = localhost
resources.db.params.username = root
resources.db.params.password = 
resources.db.params.dbname = omega2wn

```

* Now it is ready on http://localhost/essence/public/



### Thanks for the attention.

## LICENSE
[CC-BY-SA 3.0](https://creativecommons.org/licenses/by-sa/3.0/)
