<?php 
    $live_image = get_sub_field('live_image') ?: '';
    $date_time = get_sub_field('live_date_&_time') ?: '';
    $link = get_sub_field('live_link_to_event') ?: '';

    $custom_icon = get_sub_field('linkedin_live_custom_icon') ?: '';
    $custom_title = get_sub_field('linkedin_live_custom_title') ?: '';

    $bg_colour = get_sub_field('live_link_section_background_colour') ?: 'White';
    $bg_colour_classes = '';
    switch ($bg_colour) {
        case 'Black':
            $bg_colour_classes = 'bg-black';
            break;
        case 'Purple':
            $bg_colour_classes = 'bg-vivid-purple';
            break;
        case 'Teal':
            $bg_colour_classes = 'bg-aqua-teal';
            break;
        case 'Light Blue':
            $bg_colour_classes = 'bg-deep-blue';
            break;
        case 'Navy':
            $bg_colour_classes = 'bg-midnight-blue';
            break; 
        case 'Pink':
            $bg_colour_classes = 'bg-electric-pink';
            break;
       default:
            $bg_colour_classes = 'bg-white';
            break;
    }

    $button_starting_text = get_sub_field('button_starting_text') ?: 'Register';
    $button_change_text = get_sub_field('button_change_text') ?: 'Join Now';

    
    $php_date_time = DateTime::createFromFormat('d/m/Y g:i a', $date_time);
    $js_date_time = $php_date_time->format('Y-m-d\TH:i:s');

    $change_text_time = get_sub_field('change_button_text_time') ?: 60; // Default to 60 minutes

    $unique_id = 'event-' . rand(1000, 9999);

    echo '<div class="event-date" data-date="' . $js_date_time . '" data-change-text-time="' . $change_text_time . '" data-button-text-change="' . $button_change_text . '" data-section-id="' . $unique_id . '"></div>';
?>

<section id="<?php echo $unique_id; ?>" class="hidden py-8 live-event-section <?php echo $bg_colour_classes; ?>">
    <div class="w-full p-0 mx-auto">
        <div class="row grid grid-cols-1 max-w-[1500px] mx-auto lg:grid-cols-2 custom-shadow">
            <div class="bg-image-col image-col col bg-no-repeat bg-cover h-auto">
                <img class ="h-full w-full object-contain max-h-[600px] lg:max-h-none" src="<?php echo $live_image['url']; ?>" alt="<?php echo $column_two_image['alt']; ?>">
            </div>
            <div class="col px-8 py-4 flex flex-col gap-y-6 justify-center bg-white">
                <div class="title flex items-center justify-center gap-x-4">
                    <?php if($custom_icon) : ?>
                        <img class="h-16 sm:h-20 w-auto" src="<?php echo $custom_icon['url']; ?>" alt="Live Event Icon">
                    <?php endif; 
                    if ($custom_title) : ?>
                        <h2 class="uppercase text-[38px] sm:text-[40px] leading-tight font-bold text-midnight-blue">Live Event</h2>
                    <?php endif; ?>
                </div>
                
                <div class="countdown flex items-center justify-center text-midnight-blue font-bold">
                    <div class="countdown-item flex flex-col items-center mx-2">
                        <span class="days value">00</span>
                        <div class="unit">D<span class="hidden sm:inline">ays</span></div>
                    </div>
                    <span class="divider">:</span>
                    <div class="countdown-item flex flex-col items-center mx-2">
                        <span class="hours value">00</span>
                        <div class="unit">H<span class="hidden sm:inline">ours</span></div>
                    </div>
                    <span class="divider">:</span>
                    <div class="countdown-item flex flex-col items-center mx-2">
                        <span class="minutes value">00</span>
                        <div class="unit">M<span class="hidden sm:inline">inutes</span></div>
                    </div>
                    <span class="divider">:</span>
                    <div class="countdown-item flex flex-col items-center mx-2">
                        <span class="seconds value">00</span>
                        <div class="unit">S<span class="hidden sm:inline">econds</span></div>
                    </div>
                </div>
                <?php if ($link) : 
                    $btn_colour = get_sub_field('live_link_button_colour');
                    $colour_classes = '';
                    switch ($btn_colour) {
                        case 'Black':
                            $colour_classes = 'bg-black border-black  hover:text-black';
                            break;
                        case 'Purple':
                            $colour_classes = 'bg-vivid-purple border-vivid-purple  hover:text-vivid-purple';
                            break;
                        case 'Teal':
                            $colour_classes = 'bg-aqua-teal border-aqua-teal  hover:text-aqua-teal';
                            break;
                        case 'Light Blue':
                            $colour_classes = 'bg-deep-blue border-deep-blue  hover:text-deep-blue';
                            break;
                        case 'Navy':
                            $colour_classes = 'bg-midnight-blue border-midnight-blue  hover:text-midnight-blue';
                            break; 
                       default:
                            $colour_classes = 'bg-electric-pink  border-electric-pink  hover:text-electric-pink';
                            break;
                    }
                ?>

                    <div class ="btn-container text-center">
                        <a href="<?php echo $link['url']; ?>" target="_blank"  class="register-button group <?php echo $colour_classes; ?>">
                            <span id="event-button"><?php echo $button_starting_text; ?></span>
                            <i class="fa-solid fa-chevron-right ml-4 group-hover:rotate-90 transition-transform duration-200"></i>
                        </a>              
                    </div> 
                <?php endif; ?>
            </div>
           
        </div>
    </div>
</section>



