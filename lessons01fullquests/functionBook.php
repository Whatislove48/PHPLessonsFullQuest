<?php

function getGuestBook($path)
{

    //$res = [];
    //$fh = fopen($root, 'r');
   // return file($path);
    //fclose($fh);
     return file($path);

}

function addRecordGuestBook(string $path,array $record)
{
    $rec = fopen($path,'w+');
    foreach ($record as $lineRec){
        fwrite($rec,$lineRec );
    }
    fclose($rec);
}

