<?php 
$args = array(
    'post_type' => 'message',
    'posts_per_page' => -1,
);
$result = new WP_Query($args);

?>
<div class="flex flex-col w-full p-16">
    <h1 class="text-3xl font-bold mb-6">Alle Beskeder</h1>
    <?php 
        if ($result->have_posts()) : 
        $i = 0;
        ?>
        <table class="border border-black rounded bg-white">
            <thead class="bg-black text-white">
                <tr>
                    <th class="px-4 py-2">Dato:</th>
                    <th class="px-4 py-2">Navn:</th>
                    <th class="px-4 py-2">Email:</th>
                    <th class="px-4 py-2">Telefon:</th>
                    <th class="px-4 py-2">Besked:</th>
                    <th class="px-4 py-2">Status:</th>
                    <th class="px-4 py-2">Action:</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                while ($result->have_posts()) : $result->the_post(); 
                    $i++;
                ?>
                    <tr class="<?php echo $i%2 == 0 ? 'bg-gray-200' : ''; ?> text-center border border-black hover:bg-gray-800 hover:text-white cursor-pointer">
                        <td class="px-4 py-2"><?php echo get_the_date('d/m-Y H:i'); ?></td>
                        <td class="px-4 py-2"><?php the_field('name'); ?></td>
                        <td class="px-4 py-2"><?php the_field('email'); ?></td>
                        <td class="px-4 py-2"><?php the_field('phone'); ?></td>
                        <td class="px-4 py-2"><?php echo substr(get_field('msg'), 0, 50); ?> ...</td>
                        <td class="px-4 py-2"><?php echo get_post_status(); ?></td>
                        <td class="px-4 py-2"><a href="/wp-admin/post.php?post=<?php echo get_the_ID(); ?>&action=edit" class="bg-blue-500 font-bold py-2 px-4 rounded-lg hover:bg-blue-700 hover:text-white">Rediger</a></td>
                    </tr>
                    
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php

?>