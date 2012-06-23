##crocodoc-php : Crocodoc for Humans.##

a simple php wrapper over Crocodoc WEB API. It uses the recently released v2 of the API.

###What is supported?###
* upload (both url and server)
* Get Status of uploaded document
* Create a session if its ready to be rendered
* Delete a file

###How to use?###

sample code would go something like this :
~~~PHP
  require_once('index.php');
  $croco = new Crocodoc();
  /* for a publicly available file */
  $uuid = $croco->upload('http://web.crocodoc.com/files/test-simple.pdf');
  /* if uploading from file system as multi-part post */
  $uuid = $croco->upload('C:\samplefile.doc', false);
~~~
For further reference, refer test.php.
