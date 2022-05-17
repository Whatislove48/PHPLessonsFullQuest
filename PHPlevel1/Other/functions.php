<?php

require_once __DIR__. '/classes/GuestBookRecord.php';

function sendMessage(User $name, string $message)
{

    echo $name->email . ' сооб отправлено -->' . $message;
}

