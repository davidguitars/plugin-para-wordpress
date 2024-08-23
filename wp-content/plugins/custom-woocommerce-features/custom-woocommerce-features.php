<?php
/**
 * Plugin Name: Custom WooCommerce Features
 * Description: Muestra un mensaje personalizado en la página de checkout basado en el valor del carrito.
 * Version: 1.0
 * Author: David Urdaneta
 * Text Domain: custom-woocommerce-features
 */


if (!defined('ABSPATH')) {
    exit;
}

// Mostrar un mensaje personalizado basado en el valor del carrito
function cwof_custom_checkout_message() {
    // Asegurarse de que WooCommerce está activo y el carrito está disponible
    if (WC()->cart && !WC()->cart->is_empty()) {
        $cart_total = WC()->cart->get_cart_contents_total();
        $message = 'Gracias por tu compra.';

        if ($cart_total > 100) {
            $message .= ' ¡Obtén un descuento del 10% en tu próxima compra si gastas más de $100 hoy!';
        }

        // Mostrar el mensaje en la página de checkout
        echo '<div class="woocommerce-info cwof-custom-message">' . esc_html($message) . '</div>';

        // Para depuración, muestra el mensaje en el log de errores
        error_log('Custom Checkout Message: ' . $message);
    } else {
        // Para depuración, muestra en el log si el carrito está vacío o no disponible
        error_log('Custom Checkout Message: Carrito vacío o no disponible.');
    }
}

// Hook para añadir el mensaje en la página de checkout
add_action('woocommerce_checkout_before_order_review', 'cwof_custom_checkout_message', 10);











