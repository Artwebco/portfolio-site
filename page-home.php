<?php

/**
 * Template Name: Home Page
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    if (class_exists('SCF')):
        $bg_image_id = SCF::get('background_image');
        $bg_image_url = wp_get_attachment_url($bg_image_id);
        $hero_title = SCF::get('hero_title');
        $hero_subtitle = SCF::get('hero_subtitle');
        $hero_description = SCF::get('hero_description');
        $hero_button_text = SCF::get('hero_button_text');
        $hero_button_link = SCF::get('hero_button_link');
        $availability = SCF::get('hero_availability');
        $profile_image = SCF::get('profile_image');
        $experience_years = SCF::get('hero_stats_1');
        $projects_count = SCF::get('hero_stats_2');
        $profile_image = SCF::get('hero_image');

    ?>
        <section class="hero">
            <div class="hero-image-wrapper">
                <img
                    src="<?php echo esc_url($bg_image_url); ?>" ;
                    alt="Nikola Nikovski"
                    class="hero-image" />
            </div>
            <div class="container hero-content-wrapper">
                <div class="hero-left">
                    <?php if ($availability == 1): ?>
                        <span class="badge availability">Available for new opportunities</span>
                    <?php else: ?>
                        <span class="badge not-available">Not available</span>
                    <?php endif; ?>

                    <?php
                    $words = explode(' ', $hero_title);
                    $last_word = array_pop($words);
                    $first_part = implode(' ', $words);
                    ?>
                    <h1>
                        <?php echo esc_html($first_part); ?>
                        <span class="name"><?php echo esc_html($last_word); ?></span>
                    </h1>

                    <?php
                    $words = explode(' ', $hero_subtitle);
                    $last_two_words = array_splice($words, -2); // get last 2 words
                    $first_part = implode(' ', $words);
                    $last_part = implode(' ', $last_two_words);
                    ?>
                    <h2 class="subtitle">
                        <?php echo esc_html($first_part); ?>
                        <span class="title"><?php echo esc_html($last_part); ?></span>
                    </h2>

                    <p class="hero_description"><?php echo esc_html($hero_description); ?></p>

                    <div class="hero-buttons">
                        <?php
                        // CV Button
                        $cv_rows = SCF::get('CVButton');
                        if ($cv_rows) :
                            foreach ($cv_rows as $cv) :
                                $cv_file = is_numeric($cv['cv_pdf']) ? wp_get_attachment_url($cv['cv_pdf']) : $cv['cv_pdf'];
                                if ($cv['download_cv'] && $cv_file) :
                        ?>
                                    <a href="<?php echo esc_url($cv_file); ?>" class="btn btn--primary" download>
                                        <i class="fa-regular fa-download"></i>
                                        <?php echo esc_html($cv['download_cv']); ?>
                                    </a>
                        <?php endif;
                            endforeach;
                        endif; ?>

                        <?php
                        // Portfolio Button
                        $portfolio_rows = SCF::get('Portfolio');
                        if ($portfolio_rows) :
                            foreach ($portfolio_rows as $p) :
                                if ($p['view_portfolio'] && $p['portfolio_link']) :
                        ?>
                                    <a href="<?php echo esc_url($p['portfolio_link']); ?>" class="btn btn--secondary">
                                        <?php echo esc_html($p['view_portfolio']); ?>
                                        <i class="fa-regular fa-arrow-down-to-line"></i>
                                    </a>
                        <?php endif;
                            endforeach;
                        endif; ?>
                    </div>
                    <div class="hero-social-icons">
                        <?php
                        // LinkedIn
                        $linkedin_rows = SCF::get('Linkedin');
                        if ($linkedin_rows) :
                            foreach ($linkedin_rows as $li) :
                                if (!empty($li['linkedin_url'])) :
                        ?>
                                    <a href="<?php echo esc_url($li['linkedin_url']); ?>" target="_blank" rel="noopener noreferrer" class="social-icon linkedin">
                                        <i class="fab fa-linkedin fa-2x"></i>
                                    </a>
                                <?php
                                endif;
                            endforeach;
                        endif;

                        // GitHub
                        $github_rows = SCF::get('Github');
                        if ($github_rows) :
                            foreach ($github_rows as $gh) :
                                if (!empty($gh['github_url'])) :
                                ?>
                                    <a href="<?php echo esc_url($gh['github_url']); ?>" target="_blank" rel="noopener noreferrer" class="social-icon github">
                                        <i class="fab fa-github fa-2x"></i>
                                    </a>
                        <?php
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </div>

                    <?php if ($hero_button_link && $hero_button_text): ?>
                        <div class="hero-buttons">
                            <a href="<?php echo esc_url($hero_button_link); ?>" class="btn primary-btn">
                                <?php echo esc_html($hero_button_text); ?>
                            </a>
                            <!-- Add second button if needed -->
                        </div>
                    <?php endif; ?>
                </div>

                <div class="hero-right">
                    <div class="hero-right-wrapper">
                        <?php if ($experience_years): ?>
                            <div class="exp-years">
                                <span class="badge years"><?php echo esc_html($experience_years); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ($profile_image): ?>
                            <div class="profile-image">
                                <img src="<?php echo esc_url(wp_get_attachment_image_url($profile_image, 'medium')); ?>" alt="Profile" class="profile-image">
                            </div>
                        <?php endif; ?>

                        <?php if ($projects_count): ?>
                            <div class="no-projects">
                                <span class="badge projects"><?php echo esc_html($projects_count); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!-- Other sections like About, Skills, Contact -->
    <?php get_template_part('template-parts/section', 'about'); ?>
    <?php get_template_part('template-parts/section', 'skills'); ?>
    <?php get_template_part('template-parts/section', 'contact'); ?>

</main>

<?php get_footer(); ?>