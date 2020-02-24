<?php
namespace Fuel\Tasks;

class Example
{

    public function csvtodb()
    {
        
    $file = DOCROOT.'/assets/docs/csv/farmers.csv';
    $row = 1;


    if (($handle = fopen($file, "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 2000, ",")) !== FALSE)

    {

                 $num = count($data);

        $row++;

        for ($c=0; $c < $num; $c++)

        {
        
        //echo $c
             echo $data[$c];


        }

        //echo '<br/>';


    }

    echo 'End '.+$row;

    fclose($handle);

}

    }
}