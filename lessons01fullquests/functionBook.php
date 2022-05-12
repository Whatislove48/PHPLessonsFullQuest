<?php

function getGuestBook(string $path): array
{

    //$res = [];
    //$fh = fopen($root, 'r');
    // return file($path);
    //fclose($fh);
    return file($path);

}

function addRecordGuestBook(string $path, array $record): void
{
    $rec = fopen($path, 'w+');
    if ($rec != false) {
        foreach ($record as $lineRec) {
            fwrite($rec, $lineRec);
        }
    }
    fclose($rec);
}

