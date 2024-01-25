<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'Libelle', 'Marque', 'Prix', 'Stock', 'Image',
    ];

    public static $rules = [
        'Libelle' => 'required|string',
        'Marque' => 'required',
        'Prix' => 'required|numeric',
        'Stock' => 'required|integer|min:1|max:9999',
        'Image' => 'nullable|file',
    ];

    public static $messages = [
        'required' => 'Le champ :attribute est obligatoire.',
        'string' => 'Le champ :attribute doit être une chaîne de caractères.',
        'numeric' => 'Le champ :attribute doit être un nombre.',
        'integer' => 'Le champ :attribute doit être un entier.',
        'min' => 'Le champ :attribute doit être supérieur ou égal à :min.',
        'max' => 'Le champ :attribute doit être inférieur ou égal à :max.',
        'file' => 'Le champ :attribute doit être un fichier.',
    ];

    public function validate($data)
    {
        return validator($data, static::$rules, static::$messages);
    }
}
