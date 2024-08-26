<?php
// Obtener los productos relacionados
$related_products = wc_get_related_products(get_the_ID(), 3);

if (!empty($related_products)) {
    echo '<section class="related-products">';
    echo '<h2>' . __('Related Products', 'storefront-child') . '</h2>';
    echo '<ul class="products columns-3">';

    foreach ($related_products as $related_product_id) {
        $post_object = get_post($related_product_id);
        setup_postdata($GLOBALS['post'] =& $post_object);

        wc_get_template_part('content', 'product');
    }

    echo '</ul>';
    echo '</section>';

    wp_reset_postdata();
}
?>
