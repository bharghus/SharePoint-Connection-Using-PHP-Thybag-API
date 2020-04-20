
<?php


// 0: include api in your php script.
require_once('./lib/src/Thybag/SharePointAPI.php');

use Thybag\SharePointAPI;
// 1: connect to SharePoint
$sp = new SharePointAPI('YourEmail', 'YourPassword', './Lists.asmx','SPONLINE');
if(isset($_POST['submit'])){
	
	$title      = $_POST['title']; 
	$from      = $_POST['from']; 
	$body      = $_POST['body']; 
	
	
$sp->write('Wordpress', array('Title'=> $title, 'from'=> $from,'Body'=> $body ));
echo'Sucess!';
}else{
	
	echo'Failed!';
}


?>

