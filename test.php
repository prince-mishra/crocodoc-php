<?php

require_once('index.php');

$croco = new Crocodoc();

// Upload a document

/*

# By providing a URL

$uuid = $croco->upload('http://web.crocodoc.com/files/test-simple.pdf');


# By providing a file on the server

$uuid = $croco->upload('C:\samplefile.doc', false);
echo "\n\nUploaded document. Returned uuid : ";
var_dump($uuid);

$uuid = json_decode($uuid, true);
echo "\n\nExtracted uuid" ;
var_dump($uuid);
$uuids = $uuid['uuid'];

*/
// a uuid is of the format {"uuid":"f80f96a3-272e-448b-a483-317e3bc9f701"}.
// need to parse to grab uuid string. true returns an associate array.


// Get Document status
// getStatus() expects a list comma separated uuids e.g. "f80f96a3-272e-448b-a483-317e3bc9f701,g99f96a3-272e-448b-a483-317e3bc9f701"
// TODO: handle strings, arrays, comma separated strings intelligently. for now its just single uuid string


$uuids = "f80f96a3-272e-448b-a483-317e3bc9f701";
echo "\n\nchecking status of : ", $uuids;
$status = $croco->getStatus($uuids);
echo "\n\nstatus is : ", $status;

// create a session

$uuid = "f80f96a3-272e-448b-a483-317e3bc9f701";
echo "\n\ncreating session for uuid = ", $uuid;
$session = $croco->createSession($uuid);
echo "\n\nsession created. session : ";
$sessionStr = json_decode($session)->{'session'};
var_dump($sessionStr);
?>
