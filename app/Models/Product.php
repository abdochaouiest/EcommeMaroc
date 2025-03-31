<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Hadchi kaykhali l'model yesta3mel factory bach ykhliq records f database b tariqa sahla
    use HasFactory;

    //laravel makaykhalich chi haja ttzad l'database illa ila nta katih lik 
    //Bach l9ayda dial database tkon mahmiya o chi hacker maydir modifications khatirine

    protected $fillable =[
        'name',
        'price',
        'Category',
        'product_code',
        'description',
        'photo',
        'quantity',
        'product_id',
    ];
}
