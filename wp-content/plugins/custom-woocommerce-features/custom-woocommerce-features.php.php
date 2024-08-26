<?php
/**
 * Plugin Name: Custom WooCommerce Features
 * Description: Muestra un mensaje personalizado en la página de checkout basado en el valor del carrito.
 * Version: 1.0
 * Author: David Urdaneta
 * Text Domain: custom-woocommerce-features
 */


defined('ABSPATH') || exit;

class CustomWoocommerceFeature {
    public function __construct()
    {
        add_shortcode('custom-cart-message', array($this, 'load_shortcode'));
    }

    public function load_shortcode()
    {
        $cart_total = (WC()->cart->get_cart_contents_total());
        $message = '';

        if ($cart_total < 100) {
            $message = '¡Obtén un descuento del 10% en tu próxima compra si gastas más de $100 hoy!';
        } else if ($cart_total >= 100 && $cart_total < 200) {
            $message = '¡Obtén un descuento del 15% en tu próxima compra si gastas más de $200 hoy!';
        }

        return <<<HTML
            <h3>Gracias por tu compra. $message</h3>
        HTML;
    }
}

new CustomWoocommerceFeature();












