<?php

namespace App\Entity;

class Entity implements EntityInterface
{

    private EntityInterface $entity;

    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
    }

    public function create()
    {
        $this->entity->create();
    }

    public function read()
    {
        $this->entity->read();
    }

    public function update()
    {
        $this->entity->update();
    }

    public function delete()
    {
        $this->entity->delete();
    }
}
