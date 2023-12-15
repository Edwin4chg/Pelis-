<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Renta;

class RentaComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Renta::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['fecharegistro', 'fechadevolucion', 'fechaentrega', 'movie_id'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['fecharegistro', 'fechadevolucion', 'fechaentrega'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'fecharegistro' => 'date', 
            'fechadevolucion' => 'date', 
            'fechaentrega' => 'date', 
            'movie_id' => 'number'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'fecharegistro' => 'required', 
            'fechadevolucion' => 'required', 
            'fechaentrega' => 'required', 
            'movie_id' => 'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
