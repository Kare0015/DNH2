<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [       'id' => '1',
                    'name' => '1. Contributie en liggeld leden'
            ],
            [       'id' => '2',
                    'name' => '2. Passanten'
            ],
            [       'id' => '3',
                    'name' => '3. Water en Electra, inkomsten'
            ],
            [       'id' => '4',
                    'name' => '5. Water en Electra, uitgaven'
            ],
            [       'id' => '5',
                    'name' => '7. Huur perceel & Waterschap'
            ],
            [       'id' => '6',
                    'name' => '8. Gemeentebelasting (Kliko)',
            ],
            [       'id' => '7',
                    'name' => '9. Kosten juridisch advies'
            ],
            [       'id' => '8',
                    'name' => '10. Verzekeringen'
            ],
            [       'id' => '9',
                    'name' => '11. Bankkosten'
            ],
            [       'id' => '10',
                    'name' => '12. KvK'
            ],
            [       'id' => '11',
                    'name' => '13. Onderhoud'
            ],
            [       'id' => '12',
                    'name' => '14. Ledenbijeenkomsten'
            ],
            [       'id' => '13',
                    'name' => '15. Transport'
            ],
            [       'id' => '14',
                    'name' => '16. Administratiekosten'
            ],
        ]);
    }
}
