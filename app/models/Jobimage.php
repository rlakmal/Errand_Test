<?php

namespace models;

class Jobimage
{
    use \Model;
    protected $table = "jobimage";

    protected $allowed_columns = [

        "job",
        "filepath"

    ];

    public function insertall($data){
        $images = $data["images"];
        foreach($images as $image){
            $this->insert($image);
        }
    }
}