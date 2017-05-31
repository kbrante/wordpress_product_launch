<?php get_header() ?>


<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <?php
                $args = array('cat'=> '2');
                $posts = get_posts($args);

                foreach ($posts as $post) {
                    setup_postdata(); ?>
                    <?php the_post_thumbnail() ?>
                    <h1><?php the_title() ?></h1>
                    <p><?php the_content() ?></p>
                    <div class=""> <?php echo get_post_meta('4', 'date', true); ?>

                    </div>
                    <?php

                }
                ?>

                <?php

    if (isset($_POST["mail"])) {

        $wpdb->insert(

        'wp-email',

        array(

            'email' =>  $_POST["mail"],
            'first_name' => $_POST["name"],
            'options' => $_POST["options"],



        )



    );
    echo get_post_meta('4', 'confirmation', true);

    } else {
        echo '<form class="" action="" method="post">';

        echo '<input type="text" name="name" value="" placeholder="veuillez entrer votre nom">';

        echo '<input type="email" name="mail" value="" placeholder="veuillez entrer votre mail">';

        echo '<select name="options">
        <option value="html">
        Html
        </option>
        <option value="text">
        Text
        </option>
        </select>';

        echo '<input type="submit" name="form" value="envoyer">';

        echo '</form>';
    }

     ?>








            </div>
        </div>
    </div>

<?php get_footer() ?>
