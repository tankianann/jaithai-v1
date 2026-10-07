<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function dishlabel($label)
{
    if (strpos(strtolower($label), "bento") !== false) {
        return false;
    }

    $find_replace = [
        'Fried Squid' => 'Squid',
        'Fried Prawn' => 'Prawn',
        'Stir Fried Chicken' => 'Chicken',
        'Fried Lemon Leaf Chicken' => 'Lemon Leaf Chicken',
        'Deep Fried Pandan Chicken' => 'Pandan Chicken',
        'Stir Fried Beef' => 'Beef',
        'Deep Fried Fish Fillet with' => 'Fish with',
        'Steamed Fish (Seabass Fillet)' => 'Steamed Seabass',

        'Clear Soup (Aromatic with Herbal and Spices Taste)' => 'Soup',
        'Soup (Clear Soup)' => 'Soup',
        'Soup (with Chilli Paste)' => 'Soup',
        'Soup (Chilli Paste)' => 'Soup',
        'Fried Kai Lan' => 'Kai Lan',
        'Fried Bean Sprout' => 'Bean Sprout',
        'Fried Cabbage' => 'Cabbage',
        'Fried Mixed Vegetables' => 'Mixed Vegetables',
        'Fried Broccoli with Chinese Mushroom' => 'Broccoli with Chinese Mushroom',
        'Fried Broccoli' => 'Broccoli Oyster Sauce',

        'Fried Hor Fan (Dry)' => 'Fried Hor Fan',
        '[FREE] 12 pcs of ' => '',

        '(Thai Fish Cake, Prawn Cake, Spring Rolls, DF. Bean Curd)' => '',
        '(Fried Thai Small Kway Teow)' => '',
        '(Aromatic with Herbal and Spices Taste)' => '',
        '(Vegan)' => '',
        '(Deshelled)' => '',
        '(+ $1.00 Per Pax)' => '',
        '(+ $2.00 Per Pax)' => '',
    ];

    foreach ($find_replace as $key => $value) {
        $label = trim(str_replace($key, $value, $label));
    }

    return $label;
}