<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        //create an array by using Collect Helper method
        $collection= collect([1,2,3,4,5,6,7,8,9]);
        // dd($collection);

        // $data =$collection->all(); // it return underline array represented by the Collection
        // dd($data);

        // $data =$collection->average(); // it return average
        // dd($data);

        // $data =$collection->chunk(2); // it return average
        // dd($data);

        // $data =$collection->reverse(); // it reverse output
        // dd($data);

        // $data =$collection->map(function($item, $key){
        //     return $item + 2;
        // }); // map method
        // dd($data);

        // $data =$collection->map(function($item, $key){
        //     return $item + 2;
        // })->all(); // array reprosent 
        // dd($data);

        //Contain method
        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
            ['product' => 'System', 'price' => 1000],

        ]);
         
        $collection->contains('product', 'Bookcase');

        dd($collection);
    }
}
