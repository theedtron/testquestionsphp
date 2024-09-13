<?php

namespace App\Http\Controllers\Question1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Question1Controller extends Controller
{
    public function iterator(){
        //Generate the data
        $data = [];
        for($i=0; $i<20; $i++){
            array_push($data,$i);
        }

        //Chunk the data into batches
        $chunksOf = 4;
        $chunk = array_chunk($data,$chunksOf);

        // Iterate through the data
        foreach($chunk as $dat){
            foreach($dat as $key => $value){
                echo $key."---".$value.PHP_EOL;
            }
        }
    }
}
