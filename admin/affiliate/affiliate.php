<?php
/**
 * 
 * @package Crea Tu Frase
 * @subpackage M. Sufyan Shaikh
 * 
 */

function affiliate_adminpanel() {
    // Get all users with the role 'affiliate_chocoletra'
    $args = [
        'role'    => 'affiliate_chocoletra',
        'orderby' => 'user_nicename',
        'order'   => 'ASC'
    ];

    $affiliate_users = get_users($args);
    ?>
    <div class="wrap">
        <h2>Affiliate Users</h2>
        <br>
        <br>
        <?php if (!empty($affiliate_users)): ?>
            <table class="widefat">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number of Orders</th>
                        <th>Total Sale</th>
                        <th>Join Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($affiliate_users as $user): ?>
                        <?php
                        // $number_of_orders = count(get_orders_by_user_id($user->ID));
                        // $total_sale = get_total_sale_by_user_id($user->ID);
                        
                        // Replace the following lines with actual logic to fetch user-specific data
                        $number_of_orders = 0; // Retrieve the number of orders for this user
                        $total_sale = 0.0; // Retrieve the total sale amount for this user
                        $join_date = date('Y-m-d', strtotime($user->user_registered)); // Format the join date
                        ?>
                        <tr>
                            <td><?php echo esc_html($user->user_login); ?></td>
                            <td><?php echo esc_html($user->display_name); ?></td>
                            <td><?php echo esc_html($user->user_email); ?></td>
                            <td><?php echo esc_html($number_of_orders); ?></td>
                            <td><?php echo esc_html(number_format($total_sale, 2)); ?></td>
                            <td><?php echo esc_html($join_date); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No affiliate users found.</p>
        <?php endif; ?>
    </div>
    <?php
}