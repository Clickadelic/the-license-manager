<?php

function license_manager_post_title_name( $title, $post ){ 
   if  ( 'licences' == $post->post_type ) {
      $title = __('Enter licence name','the-license-manager');
   }

   return $title;
}
add_filter( 'enter_title_here', 'license_manager_post_title_name', 10, 2 );