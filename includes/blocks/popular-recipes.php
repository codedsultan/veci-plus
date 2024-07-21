<?php 

function vp_popular_recipes_cb($atts) {
    $title = esc_html($atts['title']);
    $cuisineIDs = array_map(function($term){
        return $term['id'];
    },$atts['cuisines']);

    $args = [
        'post_type' => 'recipe',
        'post_per_page' => $atts['count'],
        'orderby' => 'meta_value_num',
        'meta_key' => 'recipe_rating',
        'order' => 'desc'
    ];

    if(!empty($cuisineIDs)){
        $args['tax_query'] = [
            [
                'taxonomy' => 'cuisine',
                'field' => 'term_id',
                'terms' => $cuisineIDs
            ]
        ];
    }
    $query = new WP_Query($args); // query wp

    ob_start();
    ?>
    <div class="wp-block-veci-plus-popular-recipes">
        <h6><?php echo $title ?></h6>
        <?php 
            if($query->have_posts()){
                while($query->have_posts()) {
                    $query->the_post(); //important to check if the query is running for the first time to avoid inconsistent results

                    //post details gotten using template tags
                    ?>
                    <div class="single-post">
                        <a class="single-post-image" href="<?php the_permalink();?>"> 
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                        <div class="single-post-detail">
                            <a href="<?php the_permalink();?>">
                                <?php the_title() ?>
                            </a>
                            <span>
                                By <a href="<?php the_permalink() ?>">
                                    <?php the_author() ?>
                                </a>
                            </span>
                        </div>
                    </div>
                    <?php

                }
            }
        ?>
    </div>
    <?php

    wp_reset_postdata();  // important to avoid complications/interference for other plugins from our secondary query

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}