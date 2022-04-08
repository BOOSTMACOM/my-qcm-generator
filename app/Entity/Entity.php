<?php

abstract class Entity
{
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $key = explode('_',$key);
            $method = count($key) == 1 ? "set" . ucfirst($key[0]) : "set";
            if(count($key) > 1)
            {
                foreach($key as $k => $v)
                {
                    $method .= ucfirst($v);
                }
            }
        
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }

        return $this;
    }
}