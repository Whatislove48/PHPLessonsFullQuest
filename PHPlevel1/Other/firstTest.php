<?php

require_once __DIR__ . '/classes/GuestBook.php';
require_once __DIR__ . '/classes/GuestBookRecord.php';
require_once __DIR__ . '/functions.php';

?>


<?php

$path = __DIR__ . '/GuestBookClasses.txt';

$guestBook = new GuestBook($path);

include __DIR__.'/../templates/templateOne.php';


?>
