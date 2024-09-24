<?php

if (have_rows('logos')) : ?>
    <div id="clients-splide" class="splide mx-auto mt-8" data-splide='{ 
        "type": "loop",
        "perPage": 6,
        "perMove": 1,
        "arrows" : false,
        "autoplay": false,
        "pagination" : false,
        "gap" : "30px",
        "autoScroll": {
            "speed": 0.7
        },
        "breakpoints" : {
            "640" : {
                "perPage" : 4,
                "gap" : "15px"
            },
            "480" : {
                "perPage" : 2
            }
            
        }
    
    }'>
        <div class="splide__track">
            <ul class="splide__list ">
                <?php while (have_rows('logos')) : the_row(); 
                    $logo = get_sub_field('logo');
                ?>
                    <li class ="splide__slide flex items-center justify-center">
                        <img src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>">
                    </li>
                <?php endwhile; ?>

            </ul>
        </div>
    </div>
<?php endif; ?>