<?php


namespace App\Entity;


interface EntityInterface
{
    public function create();

    public function read();

    public function update();

    public function delete();
}