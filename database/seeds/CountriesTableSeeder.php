<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Росiя',
                'icon' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Україна',
                'icon' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Бiлорусь',
                'icon' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Казахстан',
                'icon' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Азербайджан',
                'icon' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Вiрменiя',
                'icon' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Грузiя',
                'icon' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Iзраїль',
                'icon' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'США',
                'icon' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Канада',
                'icon' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Киргизстан',
                'icon' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Латвiя',
                'icon' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Литва',
                'icon' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Естонiя',
                'icon' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Молдова',
                'icon' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Таджикистан',
                'icon' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Туркменістан',
                'icon' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Узбекистан',
                'icon' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Австралiя',
                'icon' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Австрiя',
                'icon' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Албанiя',
                'icon' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Алжир',
                'icon' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Американське Самоа',
                'icon' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Ангілья',
                'icon' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Ангола',
                'icon' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Андорра',
                'icon' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Антiгуа i Барбуда',
                'icon' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Аргентина',
                'icon' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Аруба',
                'icon' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Афганiстан',
                'icon' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Багами',
                'icon' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Бангладеш',
                'icon' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Барбадос',
                'icon' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Бахрейн',
                'icon' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Белiз',
                'icon' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Бельгiя',
                'icon' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Бенiн',
                'icon' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Бермуди',
                'icon' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Болгарiя',
                'icon' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Болiвiя',
                'icon' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Боснiя i Герцеговина',
                'icon' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Ботсвана',
                'icon' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Бразилiя',
                'icon' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Бруней-Дарусалам',
                'icon' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Буркина-Фасо',
                'icon' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Бурундi',
                'icon' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Бутан',
                'icon' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Вануату',
                'icon' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Великобританiя',
                'icon' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Угорщина',
                'icon' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Венесуела',
                'icon' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Вiргiнськi острови, Британськi',
                'icon' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Вiргiнськi острови, США',
                'icon' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Схiдний Тимор',
                'icon' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'В\'єтнам',
                'icon' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Габон',
                'icon' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Гаїтi',
                'icon' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Гайана',
                'icon' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Гамбiя',
                'icon' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Гана',
                'icon' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Гваделупа',
                'icon' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Гватемала',
                'icon' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Гвiнея',
                'icon' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Гвiнея-Бiсау',
                'icon' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Нiмеччина',
                'icon' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Гiбралтар',
                'icon' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'Гондурас',
                'icon' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'Гонконг',
                'icon' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'Гренада',
                'icon' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'Гренландiя',
                'icon' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'Грецiя',
                'icon' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'Гуам',
                'icon' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'Данiя',
                'icon' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'Домiнiка',
                'icon' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'Домiнiканська Республiка',
                'icon' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'Єгипет',
                'icon' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'Замбiя',
                'icon' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'Захiдна Сахара',
                'icon' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'Зiмбабве',
                'icon' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'Iндiя',
                'icon' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'Iндонезiя',
                'icon' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'Йорданiя',
                'icon' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'Iрак',
                'icon' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'Iран',
                'icon' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'Iрландiя',
                'icon' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'Iсландiя',
                'icon' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'Iспанiя',
                'icon' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'Iталiя',
                'icon' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'Йемен',
                'icon' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'Кабо-Верде',
                'icon' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'Камбоджа',
                'icon' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'Камерун',
                'icon' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'Катар',
                'icon' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'Кенiя',
                'icon' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'Кiпр',
                'icon' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'Кiрiбатi',
                'icon' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'Китай',
                'icon' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'Колумбiя',
                'icon' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'Комори',
                'icon' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'Конго',
                'icon' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'Конго, демократична республiка',
                'icon' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'Коста-Рiка',
                'icon' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'Кот-д\'iвуар',
                'icon' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'Куба',
                'icon' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'Кувейт',
                'icon' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'Лаос',
                'icon' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'Лесото',
                'icon' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'Лiберiя',
                'icon' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'Лiван',
                'icon' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'Лiвiя',
                'icon' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'Лiхтенштейн',
                'icon' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'Люксембург',
                'icon' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'Маврикiй',
                'icon' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'Мавританiя',
                'icon' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'Мадагаскар',
                'icon' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'Макао',
                'icon' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'Македонiя',
                'icon' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'Малавi',
                'icon' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'Малайзiя',
                'icon' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'Малi',
                'icon' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'Мальдiви',
                'icon' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'Мальта',
                'icon' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'Марокко',
                'icon' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'Мартинiка',
                'icon' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'Маршаловi острови',
                'icon' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'Мексика',
                'icon' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'Мiкронезiя, федеративнi штати',
                'icon' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'Мозамбiк',
                'icon' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'Монако',
                'icon' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'Монголiя',
                'icon' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'Монтсеррат',
                'icon' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'М\'янма',
                'icon' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'Намiбiя',
                'icon' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'Науру',
                'icon' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'Непал',
                'icon' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'Нiгер',
                'icon' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'Нiгерiя',
                'icon' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'Кюрасао',
                'icon' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'Нiдерланди',
                'icon' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'Нiкарагуа',
                'icon' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'Нiуе',
                'icon' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'Нова Зеландiя',
                'icon' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'Нова Каледонiя',
                'icon' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'Норвегiя',
                'icon' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'Об\'єднанi Арабськi Емiрати',
                'icon' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'Оман',
                'icon' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'Острiв Мен',
                'icon' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'Острiв Норфолк',
                'icon' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'Острови Кайман',
                'icon' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'Острови Кука',
                'icon' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'Острови Теркс i Кайкос',
                'icon' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'Пакистан',
                'icon' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'Палау',
                'icon' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'Палестинська автономiя',
                'icon' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'Панама',
                'icon' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'Папуа - Нова Гвiнея',
                'icon' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'Парагвай',
                'icon' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'Перу',
                'icon' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'Пiткерн',
                'icon' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'Польща',
                'icon' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'Португалiя',
                'icon' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'Пуерто-Рiко',
                'icon' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'Реюньон',
                'icon' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'Руанда',
                'icon' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'Румунiя',
                'icon' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'Сальвадор',
                'icon' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'Самоа',
                'icon' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'Сан-Марiно',
                'icon' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'Сан-Томе i Прiнсiпi',
                'icon' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'Саудiвська Аравiя',
                'icon' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'Свазiленд',
                'icon' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'Святої Єлени',
                'icon' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'Пiвнiчна Корея',
                'icon' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'Пiвнiчнi Марiанськi острови',
                'icon' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Сейшели',
                'icon' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'name' => 'Сенегал',
                'icon' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'name' => 'Сент-Вiнсент',
                'icon' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'name' => 'Сент-Китс i Невiс',
                'icon' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'name' => 'Сент-Люсiя',
                'icon' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'name' => 'Сент-Пьєр i Мiкелон',
                'icon' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'name' => 'Сербiя',
                'icon' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'name' => 'Сiнгапур',
                'icon' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'name' => 'Сiрiйська Арабська Республiка',
                'icon' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'name' => 'Словаччина',
                'icon' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'name' => 'Словенiя',
                'icon' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'name' => 'Соломоновi Острови',
                'icon' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'name' => 'Сомалi',
                'icon' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'name' => 'Судан',
                'icon' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'name' => 'Сурiнам',
                'icon' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'name' => 'Сьєрра-Леоне',
                'icon' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'name' => 'Таїланд',
                'icon' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'name' => 'Тайвань',
                'icon' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'name' => 'Танзанiя',
                'icon' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'name' => 'Того',
                'icon' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'name' => 'Токелау',
                'icon' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'name' => 'Тонга',
                'icon' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'name' => 'Тринiдад i Тобаго',
                'icon' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'name' => 'Тувалу',
                'icon' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'name' => 'Тунiс',
                'icon' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'name' => 'Туреччина',
                'icon' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'name' => 'Уганда',
                'icon' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'name' => 'Уоллiс i Футуна',
                'icon' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'name' => 'Уругвай',
                'icon' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'name' => 'Фарерськi острови',
                'icon' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'name' => 'Фiджi',
                'icon' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'name' => 'Фiлiппiни',
                'icon' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'name' => 'Фiнляндiя',
                'icon' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'name' => 'Фолклендськi острови',
                'icon' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'name' => 'Францiя',
                'icon' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'name' => 'Французька Гвiана',
                'icon' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'name' => 'Французька Полiнезiя',
                'icon' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'name' => 'Хорватiя',
                'icon' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'name' => 'Центральноафриканська Республiка',
                'icon' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'name' => 'Чад',
                'icon' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'name' => 'Чехiя',
                'icon' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'name' => 'Чилi',
                'icon' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'name' => 'Швейцарiя',
                'icon' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'name' => 'Швецiя',
                'icon' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'name' => 'Шпiцберген i Ян Майен',
                'icon' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'name' => 'Шрi-Ланка',
                'icon' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'name' => 'Еквадор',
                'icon' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'name' => 'Екваторiальна Гвiнея',
                'icon' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'name' => 'Ерiтрея',
                'icon' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'name' => 'Ефiопiя',
                'icon' => NULL,
            ),
            224 => 
            array (
                'id' => 226,
                'name' => 'Пiвденна Корея',
                'icon' => NULL,
            ),
            225 => 
            array (
                'id' => 227,
                'name' => 'Пiвденно-Африканська Республiка',
                'icon' => NULL,
            ),
            226 => 
            array (
                'id' => 228,
                'name' => 'Ямайка',
                'icon' => NULL,
            ),
            227 => 
            array (
                'id' => 229,
                'name' => 'Японiя',
                'icon' => NULL,
            ),
            228 => 
            array (
                'id' => 230,
                'name' => 'Чорногорiя',
                'icon' => NULL,
            ),
            229 => 
            array (
                'id' => 231,
                'name' => 'Джiбутi',
                'icon' => NULL,
            ),
            230 => 
            array (
                'id' => 232,
                'name' => 'Південний Судан',
                'icon' => NULL,
            ),
            231 => 
            array (
                'id' => 233,
                'name' => 'Ватикан',
                'icon' => NULL,
            ),
            232 => 
            array (
                'id' => 234,
                'name' => 'Сінт-Мартен',
                'icon' => NULL,
            ),
            233 => 
            array (
                'id' => 235,
                'name' => 'Бонайре, Сінт-Естатіус і Саба',
                'icon' => NULL,
            ),
            234 => 
            array (
                'id' => 236,
                'name' => 'Гернсі',
                'icon' => NULL,
            ),
            235 => 
            array (
                'id' => 237,
                'name' => 'Джерсі',
                'icon' => NULL,
            ),
        ));
        
        
    }
}
