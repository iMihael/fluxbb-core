<?php

namespace FluxBB\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Base extends Model
{
    public $timestamps = false;

    protected $rules = array();

    protected $errors = array();

    protected $messages = [];

    public function __construct(array $attributes = array())
    {
        $this->table =  'fluxbb_' . $this->table;
        parent::__construct($attributes);
    }

    public function valid()
    {
        if (empty($this->rules)) {
            return true;
        }

        $v = Validator::make($this->attributes, $this->rules, $this->messages);
        $ret = $v->passes();
        if(!$ret)
            $this->errors = $v->errors();

        return $ret;
    }

    public function invalid()
    {
        return ! $this->valid();
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
