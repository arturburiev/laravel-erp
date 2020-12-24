<?php

return [

    'get_all_films' => [
                            'name' => 'Фильмы',
                            'settings' => [],
                            'params' => [
                                            'model' => 'App\Models\Film',
                                            'method' => [
                                                'name' => 'getAll',
                                                'method_params' => [],
                                            ],
                                        ],
                        ],


    'get_all_genres' => [
                            'name' => 'Жанры',
                            'settings' => [],
                            'params' => [
                                            'model' => 'App\Models\Genre',
                                            'method' => [
                                                'name' => 'getAll',
                                                'method_params' => [],
                                            ],
                                        ],
                        ],

];
