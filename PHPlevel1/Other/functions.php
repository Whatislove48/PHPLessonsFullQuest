<?php


function sendMessage(User $name ,string $message)
{

    echo $name->email . ' сооб отправлено -->'. $message;
}

function getGuestBookRecords()
{
    return file(__DIR__.'/GuestBookClasses.txt',
        FILE_IGNORE_NEW_LINES);

}