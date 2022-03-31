<?php

abstract class Entity
{
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $key = explode('_',$key);
            $method = count($key) == 1 ? "set" . ucfirst($key[0]) : "set" . ucfirst($key[0]) . ucfirst($key[1]);
            $this->$method($value);
        }

        return $this;
    }
}