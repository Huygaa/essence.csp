# Crowdsourcing Platform on Omegawiki and Wordnet synset alignments

This platform asks users whether WordNet synset and Omegawiki synset are matched in the given task.

In below example, an user is asked to choose one of two WordNet synsets that most likely matches with OmegaWiki Concept Definition.

<div align="center">
  <img src="https://1.bp.blogspot.com/-o6SEkJenA20/WK8PMfS7kCI/AAAAAAAABDc/2LNhUJ86s-UNk-ZWGhqeIwBSre_Oxi7zACLcB/s1600/map.png"><br><br>
</div>

As can be seen from here, an user can select one of the three answers, placed in the right side. 

# Installation:
Follow the below steps in order to run this platform.

1. Download [MAMP server](https://www.mamp.info/en/downloads/)
2. Run the MAMP server manually on your localhost using the port 8888.
3. Open the terminal in MAC OSX (open cmd in Windows).
4. MAC OSX run: cd /Applications/MAMP/htdocs 
   WINDOWNS run: cd C:\MAMP\htdocs\ 

   Create the folder "essence" or run this command: mkdir essence
   
   
   Copy all the project files into the following folder:
   /Applications/MAMP/htdocs/essence/ (MAC OSX)
   cd C:\MAMP\htdocs\essence\ (Windows)

5. Access to phpMyAdmin. http://localhost:8888/phpMyAdmin/
6. Create a mysql database titled "omega2wn".
7. Import the omega2wn.sql file into the database "omega2wn".   
8. Access http://localhost/essence/public/

Thanks for the attention.
