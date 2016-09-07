<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->truncate();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Винницкая область',
                'country_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Волынская область',
                'country_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Днепропетровская область',
                'country_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Донецкая область',
                'country_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Житомирская область',
                'country_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Закарпатская область',
                'country_id' => 2,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Запорожская область',
                'country_id' => 2,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ивано-Франковская область',
                'country_id' => 2,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Киевская область',
                'country_id' => 2,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Кировоградская область',
                'country_id' => 2,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Крым',
                'country_id' => 2,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Луганская область',
                'country_id' => 2,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Львовская область',
                'country_id' => 2,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Николаевская область',
                'country_id' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Одесская область',
                'country_id' => 2,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Полтавская область',
                'country_id' => 2,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Ровненская область',
                'country_id' => 2,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Сумская область',
                'country_id' => 2,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Тернопольская область',
                'country_id' => 2,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Харьковская область',
                'country_id' => 2,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Херсонская область',
                'country_id' => 2,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Хмельницкая область',
                'country_id' => 2,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Черкасская область',
                'country_id' => 2,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Черниговская область',
                'country_id' => 2,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Черновицкая область',
                'country_id' => 2,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Адыгея',
                'country_id' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Алтай',
                'country_id' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Алтайский край',
                'country_id' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Амурская область',
                'country_id' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Архангельская область',
                'country_id' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Астраханская область',
                'country_id' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Башкортостан',
                'country_id' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Белгородская область',
                'country_id' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Брянская область',
                'country_id' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Бурятия',
                'country_id' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Владимирская область',
                'country_id' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Волгоградская область',
                'country_id' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Вологодская область',
                'country_id' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Воронежская область',
                'country_id' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Дагестан',
                'country_id' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Еврейская АОбл',
                'country_id' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Забайкальский край',
                'country_id' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Ивановская область',
                'country_id' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Ингушетия',
                'country_id' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Иркутская область',
                'country_id' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Кабардино-Балкарская',
                'country_id' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Калининградская область',
                'country_id' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Калмыкия',
                'country_id' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Калужская область',
                'country_id' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Камчатский край',
                'country_id' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Карачаево-Черкесская',
                'country_id' => 1,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Карелия',
                'country_id' => 1,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Кемеровская область',
                'country_id' => 1,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Кировская область',
                'country_id' => 1,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Коми',
                'country_id' => 1,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Корякский АО',
                'country_id' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Костромская область',
                'country_id' => 1,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Краснодарский край',
                'country_id' => 1,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Красноярский край',
                'country_id' => 1,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Курганская область',
                'country_id' => 1,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Курская область',
                'country_id' => 1,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Ленинградская область',
                'country_id' => 1,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Липецкая область',
                'country_id' => 1,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Магаданская область',
                'country_id' => 1,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Марий Эл',
                'country_id' => 1,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Мордовия',
                'country_id' => 1,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Московская область',
                'country_id' => 1,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Мурманская область',
                'country_id' => 1,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Ненецкий АО',
                'country_id' => 1,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Нижегородская область',
                'country_id' => 1,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Новгородская область',
                'country_id' => 1,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Новосибирская область',
                'country_id' => 1,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Омская область',
                'country_id' => 1,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Оренбургская область',
                'country_id' => 1,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Орловская область',
                'country_id' => 1,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Пензенская область',
                'country_id' => 1,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Пермский край',
                'country_id' => 1,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Приморский край',
                'country_id' => 1,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Псковская область',
                'country_id' => 1,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Ростовская область',
                'country_id' => 1,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Рязанская область',
                'country_id' => 1,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Самарская область',
                'country_id' => 1,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Саратовская область',
                'country_id' => 1,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Саха /Якутия/',
                'country_id' => 1,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Сахалинская область',
                'country_id' => 1,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Свердловская область',
                'country_id' => 1,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Северная Осетия - Алания',
                'country_id' => 1,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Смоленская область',
                'country_id' => 1,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Ставропольский край',
                'country_id' => 1,
            ),
            89 => 
            array (
                'id' => 90,
            'name' => 'Таймырский (Долгано-Ненецкий) АО',
                'country_id' => 1,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Тамбовская область',
                'country_id' => 1,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Татарстан',
                'country_id' => 1,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Тверская область',
                'country_id' => 1,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Томская область',
                'country_id' => 1,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Тульская область',
                'country_id' => 1,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Тыва',
                'country_id' => 1,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Тюменская область',
                'country_id' => 1,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Удмуртская',
                'country_id' => 1,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Ульяновская область',
                'country_id' => 1,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Хабаровский край',
                'country_id' => 1,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Хакасия',
                'country_id' => 1,
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'Ханты-Мансийский Автономный округ - Югра АО',
                'country_id' => 1,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Челябинская область',
                'country_id' => 1,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Чеченская',
                'country_id' => 1,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Чувашская',
                'country_id' => 1,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Чукотский АО',
                'country_id' => 1,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Ямало-Ненецкий АО',
                'country_id' => 1,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Ярославская область',
                'country_id' => 1,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Брестская область',
                'country_id' => 3,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Витебская область',
                'country_id' => 3,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Гомельская область',
                'country_id' => 3,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Гродненская область',
                'country_id' => 3,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Минская область',
                'country_id' => 3,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Могилевская область',
                'country_id' => 3,
            ),
        ));
        
        
    }
}
