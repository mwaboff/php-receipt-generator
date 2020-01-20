<?php

$PURCHASED_ITEMS = [
    "Cheeseburger" => "5.50",
    "Salad" => "4.50",
    "Fries" => "3.99",
    "Soda" => "3.33",
    "Milkshake" => "4.50",
];

function generateAndInsertPurchasedItems() {
    $purchased_items_html = generatePurchasedItemsHTML();
    echo $purchased_items_html;
}

function generatePurchasedItemsHTML () {
    global $PURCHASED_ITEMS;
    $section_html = '<div class="line-items">';
    foreach ($PURCHASED_ITEMS as $name => $price) {
        $section_html .= generatePurchasedLineItemHTML($name, $price);
    }
    $section_html .= '</div>';
    return $section_html;
}

function generatePurchasedLineItemHTML($name, $price) {
    $line_html = '<div class="line">';
    $line_html .= '<span class="item">'.$name.'</span>';
    $line_html .= '<span class="item-price">'.$price.'</span>';
    $line_html .= '</div>';

    return $line_html;
}

generateAndInsertPurchasedItems();
?>