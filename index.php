<?php
/*
  * Template name: Homepage
  */
get_header(); ?>

    <body>
<section id="wellcome" class="wellcome <?php if (get_field('corner_check')) { ?>corner<?php } ?>">

    <div class="container">
        <div class="wellcome__body">
            <?php if (get_field('photo_chek')) : ?>
                <div class="wellcome__body-bloc">
                    <?php if (get_field('background_image_welcome')) { ?>
                        <div class="bloc__img left">
                            <img src="<?php echo get_field('background_image_welcome'); ?>" alt="welcome">
                        </div>
                    <?php } ?>
                    <div class="bloc__text">
                        <div class="bloc__row">
                            <div class="bloc__title">
                                <?php echo get_field('bloc__title'); ?>
                            </div>
                            <div class="bloc__suptitle">
                                <?php echo get_field('bloc__suptitle'); ?>
                            </div>
                            <div class="bloc__description">
                                <?php echo get_field('bloc__description'); ?>
                            </div>
                        </div>
                        <div class="bloc__link">
                            <?php if (have_rows('bloc__link')) : ?>
                                <?php while (have_rows('bloc__link')) : the_row(); ?>
                                    <a href="<?php echo get_sub_field('link_to'); ?>"><?php echo get_sub_field('title__link'); ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php else : // photo_chek returned false
                ?>
                <div class="wellcome__body-bloc slider-wellcome">
                    <?php if (have_rows('slider-wellcome')) : ?>
                        <?php while (have_rows('slider-wellcome')) : the_row(); ?>
                            <div class="slider-wellcome__cards">
                                <div class="bloc__img">
                                    <img src="<?php echo get_sub_field('img_wellcome-slider')['url']; ?>" alt="img_wellcome">
                                    <img class="img_bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/Group33.png" alt="img_bg">
                                </div>
                                <div class="bloc__text">
                                    <div class="bloc__row">
                                        <div class="bloc__title">
                                            <?php echo get_sub_field('bloc__title-slider'); ?>
                                        </div>
                                        <div class="bloc__suptitle">
                                            <?php echo get_sub_field('bloc__suptitle-slider'); ?>
                                        </div>
                                        <div class="bloc__description">
                                            <?php echo get_sub_field('bloc__description-slider'); ?>
                                        </div>
                                    </div>
                                    <div class="bloc__link">
                                        <?php if (have_rows('bloc__link-slider')) : ?>
                                            <?php while (have_rows('bloc__link-slider')) : the_row(); ?>
                                                <a href="<?php get_sub_field('link_to-slider'); ?>"><?php echo get_sub_field('title__link-slider'); ?></a>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php endif; // end of if photo_chek logic
            ?>
        </div>
    </div>
</section>

<section id="video" class="video">
    <div class="container">
        <?php if (get_field('video_block_youtube')) { ?>
            <div class="video-block">
                <iframe src="https://www.youtube.com/embed/<?php echo get_field('video_block_youtube'); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        <?php } ?>
    </div>
</section>
<section class="instagram">
    <div class="container">
        <div class="instagram-header">
            <h2 class="instagram-header__title title"><?php echo get_field('google_reviews_title','option'); ?></h2>
        </div>
        <div class="instagram__content">
            <?php echo do_shortcode(get_field('google_reviews_shortcode','option')); ?>
        </div>
    </div>
</section>

<section id="object" class="object">
    <div class="container">
        <div class="object-header">
            <h2 class="object-header__title title"><?php echo get_field('title_object'); ?></h2>
        </div>
        <div class="object__content">
            <div class="object__content-slider" dir="rtl">
                <?php if (have_rows('object__blocs')) : ?>
                    <?php while (have_rows('object__blocs')) : the_row(); ?>
                        <div class="object__content-bloc">
                            <div class="slide__img">
                                <img src="<?php echo get_sub_field('img_blog')['url']; ?>" alt="img_blog">
                                <span><?php echo get_sub_field('price'); ?></span>
                            </div>
                            <div class="item__bloc">
                                <div class="object__title">
                                    <?php echo get_sub_field('object-blog__title'); ?>
                                </div>
                                <div class="object__description">
                                    <?php echo get_sub_field('object-blog__description'); ?>
                                </div>
                                <div class="stats__bloc_row">
                                    <div class="text_blog">
                                        <?php if (have_rows('stats__item')) : ?>
                                            <?php while (have_rows('stats__item')) : the_row(); ?>
                                                <div class="stats__item">
                                                    <div class="stats__title">
                                                        <?php echo get_sub_field('stats__title'); ?>
                                                    </div>
                                                    <div class="stats__suptitle">
                                                        <?php echo get_sub_field('stats__suptitle'); ?>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <a href="https://www.facebook.com/yossilupu.remax" target="_blank" class="social">
                                        <svg width="10" height="20" viewBox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.4509 19.375V10.8221H9.32171L9.75155 7.48914H6.45097V5.36125C6.45097 4.39617 6.71912 3.73846 8.1026 3.73846L9.8677 3.73794V0.756622C9.56256 0.715662 8.51503 0.625 7.29579 0.625C4.75104 0.625 3.00907 2.17871 3.00907 5.03116V7.48915H0.130859V10.8221H3.009V19.375H6.4509V19.375Z" fill="white" />
                                        </svg>
                                        <p><?php echo get_sub_field('text-link_social'); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="cmp-slider-nav" dir="rtl">
                <div class="nav-dots"></div>
            </div>
        </div>
    </div>
</section>

<section id="team" class="team">
    <div class="container">
        <div class="team__content">
            <div class="team__baner">
                <div class="team__img">
                    <img src="<?php echo get_field('img_team')['url']; ?>" alt="img_team">
                </div>
                <div class="team__baner-text">
                    <div class="team__baner__title">
                        <?php echo get_field('team__baner__title'); ?>
                    </div>
                    <div class="team__baner__description">
                        <?php echo get_field('team__baner__description'); ?>
                    </div>
                    <a href="#" class="remax">
                        <img src="<?php echo get_field('img_remax')['url']; ?>" alt="img_remax">
                    </a>
                </div>
                <div class="corner-image"></div>
            </div>

            <div class="team-header">
                <h2 class="team-header__title title"><?php echo get_field('title_team'); ?></h2>
            </div>
            <div id="team_all" class="team_all">
                <?php if (have_rows('all__item')) : ?>
                    <?php while (have_rows('all__item')) : the_row(); ?>
                        <div class="all__item">
                            <img src="<?php echo get_sub_field('photo')['url']; ?>" alt="photo">
                            <div class="name">
                                <?php echo get_sub_field('name'); ?>
                            </div>
                            <div class="position">
                                <?php echo get_sub_field('position'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



<section id="diplom" class="diplom">
    <div class="container">
        <div class="diplom-header">
            <h2 class="diplom-header__title title"><?php echo get_field('title_diplom'); ?></h2>
            <div class="diplom-header__suptitle suptitle"><?php echo get_field('suptitle_diplom'); ?></div>
        </div>
        <div class="diplom__content" dir="rtl">
            <div class="cmp-slider">
                <?php if (have_rows('diplom__items')) : ?>
                    <?php while (have_rows('diplom__items')) : the_row(); ?>
                        <div class="diplom__items">
                            <?php if (get_sub_field('diplom')) { ?>
                                <a href="#img1">
                                    <img src="<?php echo get_sub_field('diplom')['url']; ?>" alt="<?php echo get_sub_field('diplom')['alt']; ?>">
                                </a>
                            <?php } ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="cmp-slider-nav">
                <div class="nav-dots"></div>
            </div>
        </div>
        <?php if (have_rows('diplom__items')) : ?>
            <?php while (have_rows('diplom__items')) : the_row(); ?>
                <!-- lightbox container hidden with CSS -->
                <a href="javascript:history.back()" class="lightbox" id="img1">
                    <span style="background-image: url('<?php echo get_sub_field('diplom')['url']; ?>')"></span>
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<section class="instagram">
    <div class="container">
        <div class="instagram-header">
            <h2 class="instagram-header__title title"><?php echo get_field('title_instagram'); ?></h2>
        </div>
        <div class="instagram__content">
            <?php echo do_shortcode('[instagram-feed feed=2]'); ?>
        </div>
    </div>
</section>





<section id="contact" class="contact" style="background-image: url('<?php echo get_field('contact__form', 'option')['url']; ?>')">
    <div class="container">
        <div class="contact__form-header">
            <h2 class="contact__form-header__title title"><?php echo get_field('title_contact__form', 'option'); ?></h2>
        </div>
        <div class="contact__form__content">
            <div class="form__body">
                <?php echo do_shortcode('[contact-form-7 id="5" title="form"]'); ?>
            </div>
            <div class="form__link">
                <a href="tel:<?php echo get_field('number', 'option'); ?>" class="link__tel">
                    <img src="<?php echo get_field('number-link__logo', 'option')['url']; ?>" alt="link__logo">
                    <div class="link__text">
                        <div class="form__title">
                            <?php echo get_field('number__title', 'option'); ?>
                        </div>
                        <div class="form__suptitle">
                            <?php echo get_field('number', 'option'); ?>
                        </div>
                    </div>
                </a>
                <a href="mailto:<?php echo get_field('email', 'option'); ?>" class="link__email">
                    <img src="<?php echo get_field('email-link__logo', 'option')['url']; ?>" alt="link__logo">
                    <div class="link__text">
                        <div class="form__title">
                            <?php echo get_field('email__title', 'option'); ?>
                        </div>
                        <div class="form__suptitle">
                            <?php echo get_field('email', 'option'); ?>
                        </div>
                    </div>
                </a>
                <a target="_blank" href="<?php echo get_field('location-link', 'option'); ?>" class="link__location">
                    <img src="<?php echo get_field('location-link__logo', 'option')['url']; ?>" alt="link__logo">
                    <div class="link__text">
                        <div class="form__title">
                            <?php echo get_field('location__title', 'option'); ?>
                        </div>
                        <div class="form__suptitle">
                            <?php echo get_field('location', 'option'); ?>
                        </div>
                    </div>
                </a>
                <div class="social__logo-link">
                    <?php if (have_rows('social__logo', 'option')) : ?>
                        <?php while (have_rows('social__logo', 'option')) : the_row(); ?>
                            <a href="<?php echo get_sub_field('social__logo-link', 'option'); ?>" target="_blank">
                                <img src="<?php echo get_sub_field('social__logo', 'option')['url']; ?>" alt="social__logo">
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="whatsapp">
    <a class="whatsapp" href="<?php echo get_field('link_whatsapp', 'option') ?>" target="_blank">
        <svg width="76" height="76" viewBox="0 0 76 76" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M38 0.980469C17.5555 0.980469 0.980469 17.5555 0.980469 38C0.980469 45.4801 3.20469 52.4574 7.02852 58.2769L2.26016 74.4254L19.0332 69.7789C24.5785 73.1 31.0684 75.0043 38 75.0043C58.4445 75.0043 75.0195 58.4293 75.0195 37.9848C75.0195 17.5555 58.4445 0.980469 38 0.980469Z" fill="#25D366" />
            <path d="M58.3383 48.1612C58.2926 47.6737 58.0031 47.2471 57.5613 47.0491C54.5754 45.678 51.5742 44.3069 48.5883 42.9358C48.2531 42.7835 47.8418 42.8596 47.5981 43.1491L43.5457 47.7194C43.2258 48.085 42.7231 48.2069 42.2813 48.0241C40.1789 47.1557 37.3453 45.6932 34.4813 43.2253C31.0535 40.285 29.0426 37.1315 27.9153 35.0749C28.4789 34.694 30.0176 33.5514 30.7031 31.4339C30.7031 31.4186 30.7184 31.4034 30.7184 31.4034C31.1449 30.0932 31.0535 28.6764 30.5813 27.3815C29.7739 25.2335 28.159 21.0745 27.5344 20.4346C27.4278 20.328 27.3059 20.2214 27.3059 20.2214C26.8489 19.81 26.2547 19.5815 25.6301 19.551C25.4168 19.5358 25.1883 19.5358 24.9446 19.5358C24.2438 19.5206 23.6192 19.5206 23.1621 19.5815C21.8672 19.7643 20.9227 20.6327 20.3285 21.3639C19.6125 22.2323 18.7594 23.5272 18.1957 25.2335C18.15 25.3858 18.1043 25.5229 18.0586 25.6753C17.434 27.8385 17.5559 30.1542 18.3024 32.287C19.0031 34.2827 20.0239 36.6593 21.5625 39.1729C24.1676 43.4538 27.0012 46.1046 28.9207 47.8565C31.084 49.8522 33.7653 52.305 38.0156 54.3464C41.9461 56.2354 45.511 56.9362 47.9028 57.2257C48.8778 57.3171 50.6754 57.3323 52.7321 56.5553C53.6766 56.1897 54.4688 55.7479 55.1086 55.2757C56.7996 54.0721 57.9879 52.2593 58.2926 50.2178C58.2926 50.2026 58.2926 50.1874 58.2926 50.1721C58.3992 49.3952 58.384 48.7249 58.3383 48.1612Z" fill="white" />
        </svg>
    </a>
</section>
<?php
get_footer();