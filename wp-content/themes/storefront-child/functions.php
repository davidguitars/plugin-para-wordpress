<?php
// Cargar la hoja de estilos del tema principal
function storefront_child_enqueue_styles() {
    wp_enqueue_style('storefront-parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('storefront-child-style', get_stylesheet_uri(), array('storefront-parent-style'));
}
add_action('wp_enqueue_scripts', 'storefront_child_enqueue_styles');


// Añadir la página de administración personalizada
function storefront_chield_add_admin_page() {
    add_menu_page(
        __('Pedidos Completados', 'storefront-chield'), // Título de la página
        __('Pedidos Completados', 'storefront-chield'), // Título del menú
        'manage_options',                               // Capacidad
        'completed-orders',                             // Slug del menú
        'storefront_chield_display_completed_orders',   // Función que muestra el contenido
        'dashicons-list-view',                          // Icono del menú
        26                                              // Posición del menú
    );
}
add_action('admin_menu', 'storefront_chield_add_admin_page');

// Función para mostrar los pedidos completados en la última página de administración personalizada
function storefront_chield_display_completed_orders() {
    global $wpdb;

    // Definir el rango de fechas 
    $start_date = date_format(date_sub(date_create(), date_interval_create_from_date_string("1 month")), "Y-m-d");
    $end_date = date_format(date_create(), "Y-m-d");

    // Obtener los pedidos completados en el rango de fechas especificado
    $orders = $wpdb->get_results("
        SELECT ID, date_created_gmt, total_amount
        FROM wp_wc_orders
        WHERE type = 'shop_order'
        AND status = 'wc-completed'
        AND date_created_gmt BETWEEN '$start_date' AND '$end_date'
    ");

    if (!empty($orders)) {
        echo '<h2>' . __('Pedidos Completados ', 'storefront-child') . '</h2>';
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>ID Pedido</th><th>Nombre del Cliente</th><th>Fecha del Pedido</th><th>Total</th></tr></thead>';
        echo '<tbody>';

        foreach ($orders as $order) {
            // Obtener todos los metadatos para el pedido
            $order_addresses = $wpdb->get_results("
                SELECT first_name, last_name
                FROM wp_wc_order_addresses
                WHERE order_id = '$order->ID'
            ");

        
            $first_name = ucfirst($order_addresses[0]->first_name);
            $last_name = ucfirst($order_addresses[0]->last_name);
            $order_date = date('Y-m-d', strtotime($order->date_created_gmt));

            echo <<<HTML
                <tr>
                    <td>$order->ID</td>
                    <td>$first_name $last_name</td>
                    <td>$order_date</td>
                    <td>$order->total_amount</td>
                </tr>
            HTML;
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>' . __('No hay pedidos completados .', 'storefront-child') . '</p>';
    }
}