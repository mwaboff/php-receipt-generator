<?php

$TAX_PERCENT = 7; // 7%
$GRATUITY_PERCENT = 20; // 20%.
$WINTER_DISCOUNT_PERCENT = 15;

$SEPARATOR_DIV = '<div class="separator"></div>';


function generateAndInsertTotalHTML() {
    $totals_html = generateTotalsHTML();
    echo $totals_html;
}

function generateTotalsHTML() {
    global $TAX_PERCENT, $GRATUITY_PERCENT, $WINTER_DISCOUNT_PERCENT, $SEPARATOR_DIV;

    $subtotals_html = '<div class="subtotal-container">';

    $running_total = calculateSubtotal();
    $subtotals_html .= generateSubtotalLineHTML("Subtotal", $running_total);

    $subtotals_html .= generateDiscountOpeningHTML();

    if (isWinter()) {
        $winter_discount = calculatePercentageAmount($WINTER_DISCOUNT_PERCENT, $running_total);
        $winter_discount = 0 - $winter_discount;
        $subtotals_html .= generateSubtotalLineHTML(
            'Winter Discount ('.$WINTER_DISCOUNT_PERCENT.'%)', 
            $winter_discount
        );
        $running_total += $winter_discount;
    }

    $subtotals_html .= generateDiscountClosingHTML();

    $tax = calculatePercentageAmount($TAX_PERCENT, $running_total);
    $subtotals_html .= generateSubtotalLineHTML('Tax ('.$TAX_PERCENT.'%)', $tax);
    $running_total += $tax;

    $gratuity = calculatePercentageAmount($GRATUITY_PERCENT, $running_total);
    $subtotals_html .= generateSubtotalLineHTML('Gratuity ('.$GRATUITY_PERCENT.'%)', $gratuity);
    $running_total += $gratuity;

    $subtotals_html .= $SEPARATOR_DIV;

    $subtotals_html .= generateSubtotalLineHTML('<b>Total</b>', $running_total);

    return $subtotals_html;
}


function calculateSubtotal() {
    global $PURCHASED_ITEMS;
    $subtotal = 0;
    foreach ($PURCHASED_ITEMS as $price) {
        $subtotal += floatval($price);
    }
    return $subtotal;
}

function generateSubtotalLineHTML($name, $amount) {
    $line_html = '<div class="total-subcontainer">';
    $line_html .= '<span class="total-section-text">'.$name.'</span>';
    $line_html .= '<span class="total-section-value">'.number_format($amount, 2).'</span>';
    $line_html .= '</div>';

    return $line_html;
}

function generateDiscountOpeningHTML() {
    $html_string = '<div id="discount-container">';
    $html_string .= '<span class="discount-section-text">Discounts:</span>';
    $html_string .= '<div  id="discount-items">';
    $html_string .= '<div class="discount-list">';
    return $html_string;
}

function generateDiscountClosingHTML() {
    return '</div></div></div>';
}

function isWinter() {
    $curr_month = intval(date("m"));
    if ($curr_month < 3 || $curr_month > 9) {
        return TRUE;
    }
    return FALSE;
}


function calculatePercentageAmount($percentage, $subtotal) {
    $tax_multiplier = ($percentage / 100);
    $curr_total = $subtotal * $tax_multiplier;
    return round($curr_total, 2);
}



generateAndInsertTotalHTML();
?>