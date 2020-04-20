# SharePoint-Connection-Using-PHP-Thybag-API
Connect SharePoint with PHP using Thybad API


Download the folder and Put that inside XAMPP server HTDOCS folder and then Start the server.
Go to the http://localhost/SharePoint/. 

Before submittting the form Please make sure to change the SPO.php file 

Update your email and Password with SharePoint List WSDL file (If you are using SharePoint Online then leave the SPONLINE)

$sp = new SharePointAPI('Your email', 'Your password', './Lists.asmx','SPONLINE');

Now Replace the List Name with your SharePoint List( Wordpress) Name and their columns from below line

$sp->write('Wordpress', array('Title'=> $title, 'from'=> $from,'Body'=> $body ));


Now you are all ready to submit the form and then it will update the SharePoint List 


Reading from a List.

To return all items from a list use either

    $sp->read('');
or
    $sp->query('')->get();
To return only the first 10 items from a list use:

    $sp->read('', 10);
or

    $sp->query('')->limit(10)->get();
To return all the items from a list where surname is smith use:

    $sp->read('', NULL, array('surname'=>'smith'));
or

    $sp->query('')->where('surname', '=', 'smith')->get();
Querying a list

The query method can be used when you need to specify a query that is to complex to be easily defined using the read methods. Queries are constructed using a number of (hopefully expressive) pseudo SQL methods.

If you, for example, wanted to query a list of pets and return all dogs below the age of 5 (sorted by age) you could use.


    $sp->query('list of pets')->where('type','=','dog')->and_where('age','sort('age','ASC')->get();
If you wanted to get the first 10 pets that were either cats or hamsters you could use:

    $sp->query('list of pets')->where('type','=','cat')->or_where('type','=','hamster')->limit(10)->get();
If you need to return 5 items, but including all fields contained in a list, you can use. (pass false to all_fields to include hidden fields).

    $sp->query('list of pets')->all_fields()->get();
If you have a set of CAML for a specific advanced query you would like to run, you can pass it to the query object using:

    $sp->query('list of pets')->raw_where('Hello World')->limit(10)->get();
Adding to a list

To add a new item to a list you can use either the method "write", "add" or "insert" (all function identically). Creating a new record in a List with the columns forename, surname, age and phone may look like:

    $sp->write('', array('forename'=>'Bob','surname' =>'Smith', 'age'=>40, 'phone'=>'(00000) 000000' ));
You can also run multiple write operations together by using:

    $sp->writeMultiple('', array(array('forename' => 'James'),array('forename' => 'Steve')));
Editing Rows

To edit a row you need to have its ID. Assuming the above row had the ID 5, we could change Bob's name to James with:

    $sp->update('','5', array('forename'=>'James'));/code>


As with the write method you can also run multiple update operations together by using:



    $sp->updateMultiple('', array(    array('ID'=>5,'job'=>'Intern'),array('ID'=>6,'job'=>'Intern')));


When using updateMultiple every item MUST have an ID.



Deleting Rows



In order to delete a row, an ID, as well as list name, is required. To remove the record for James with the ID 5 you would use:



    $sp->delete('', '5');


If you wished to delete a number of records at once, an array of ID's can also be passed to the delete multiple methods



    $sp->deleteMultiple('', array('6','7','8'));
