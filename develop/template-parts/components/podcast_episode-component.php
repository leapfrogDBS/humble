<?php 
    $podcast_type = get_sub_field('podcast_type');
    $include_share_button = get_sub_field('include_share_button');
    
    echo '<div class="custom-shadow mt-6 rounded-[5px] bg-white">';
    switch ($podcast_type) {
        case 'multiplayer':
            echo "<div id='buzzsprout-large-player'></div><script type='text/javascript' charset='utf-8' src='https://www.buzzsprout.com/2289992.js?container_id=buzzsprout-large-player&player=large'></script>";
            break;
        case 'singleplayer':
            $which_episodes = get_sub_field('which_episodes');
            $player_tags = "";
            switch ($which_episodes) {
                case '5':
                    $player_tags = "-limit-5";
                    break;
                case '10':
                    $player_tags = "-limit-10";
                    break;
                case '20':
                    $player_tags = "-limit-20";
                    break;
                case 'tags':
                    $player_tags = "-tags-";
                    $episode_tags = get_sub_field('episode_tags');
                    $episode_tags = str_replace(' ', '', $episode_tags);
                    $episode_tags = str_replace(',', '-', $episode_tags);
                    $player_tags .= $episode_tags;
                    break;
            }
            echo "<div id='buzzsprout-small-player singleplayer" . $player_tags . "'><script type='text/javascript' charset='utf-8' src='https://www.buzzsprout.com/2289992.js?artist=&container_id=buzzsprout-small-player&player=small'></script></div>";
            break;

        case 'singleepisode':
            $single_episode_embed_code = get_sub_field('single_episode_embed_code');
            echo $single_episode_embed_code;
            break;
    }
    echo '</div>';

    if ($include_share_button) :
    
        $btn_colour = get_sub_field('share_button_colour');
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
           default:
                $colour_classes = 'bg-electric-pink  border-electric-pink  hover:text-electric-pink';
                break;
        }
    ?>
        <div class ="btn-container w-full text-center my-6 block">
            <a href="https://leadingwithagility.buzzsprout.com/share" target="_blank"  class="register-button group <?php echo $colour_classes; ?>">
                <span id="event-button">Subscribe</span>
                <i class="fa-solid fa-chevron-right ml-4 group-hover:rotate-90 transition-transform duration-200"></i>
            </a>              
        </div> 
    <?php endif;
 ?>

    


    
