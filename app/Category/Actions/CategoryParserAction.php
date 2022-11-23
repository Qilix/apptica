<?php

namespace App\Category\Actions;

use GuzzleHttp\Client;

class CategoryParserAction{

    static function getData(){

        $client = new Client();
            $res = $client->request('GET',
                'https://api.apptica.com/package/top_history/1421444/1?date_from=2022-10-24&date_to=2022-11-23&B4NKGg=fVN5Q9KVOlOHDx9mOsKPAQsFBlEhBOwguLkNEDTZvKzJzT3l');
            $body = $res->getBody()->getContents();
            $obj = json_decode($body, true);
            $data = $obj['data'];
        return $data;
    }

    public function getMaxPositionArray(){
        $maxPos = array();
        $data = CategoryParserAction::getData();
        foreach($data as $category => $sub_category){
            foreach($sub_category as $value) {
                foreach($value as $date => $position){
                    if(array_key_exists($date, $maxPos)){
                        if($maxPos[$date] > $position && $position !== null) {
                            $maxPos[$date] = $position;
                        }
                    }
                    else{
                        $maxPos[$date] = $position;
                    }
                }
            }
            $arr[$category]= $maxPos;
            $maxPos = [];
        }
        return $arr;
    }

}
