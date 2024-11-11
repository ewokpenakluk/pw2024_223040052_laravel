<?php

namespace App\Models;

use Illuminate\Support\Arr;

class post
    {
        public static function all()
        {
            return  [
                [
                    'id' => 1,
                    'slug' => 'judul-artikel-1',
                    'title' => 'Judul Artikel 1',
                    'author' => 'Angga Nugraha Sofyan',
                    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat placeat modi eos facere. Quam excepturi tempore mollitia velit, iste impedit aperiam quibusdam consequatur. Eveniet, molestiae?' 
                ],
                [
                    'id' => 2,
                    'slug' => 'judul-artikel-2',
                    'title' => 'Judul Artikel 2',
                    'author' => 'Angga Nugraha Sofyan',
                    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat placeat modi eos facere. Quam excepturi tempore mollitia velit, iste impedit aperiam quibusdam consequatur. Eveniet, molestiae?' 
                ]

                ];
        }


        public static function find($slug): array
        {

           $post =  Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);
           
           if(! $post){
                abort(404);
           }

           return $post;


            }
        }
    ?>
