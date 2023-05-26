<?php

function license_manager_menu_item() {
    add_submenu_page(
        "options-general.php",
        __('Licence manager options', 'the-license-manager'),
        __('Licence manager', 'the-license-manager'),
        "manage_options",
        "licence-manager-options",
        "license_manager_options_page"
	);
}
add_action("admin_menu", "license_manager_menu_item");

function license_manager_options_page_init() {
    
    register_setting(
        'section',
        'autocomplete_fields'
    );

    // add settings fields
    add_settings_field(
        'archive-text',                            //@param (string) (required) Slug-name to identify the field. Used in the 'id' attribute of tags.
        __('License overview', 'the-license-manager'),    //@param (string) (Required) Formatted title of the field. Shown as the label for the field during output.
        'license_manager_options_content',
        'demo',    // Pagename
        'section' //Sectionname, which is declared below
    );
    
    // add settings section
    add_settings_section(
        "section",
        __('Current licences', 'the-license-manager'),
        null,
        "demo"
    );
}
add_action("admin_init", "license_manager_options_page_init");

function license_manager_options_page() {
    ?>
    <div class="wrap">
        <h1 class="optionspage-title"><?php _e('Licence manager options', 'the-license-manager'); ?></h1>
        <form method="post" action="options.php">
            <?php
                settings_fields("section");
                do_settings_sections("demo");
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

function license_manager_options_content() {

    LM_PLUGIN_ROOT . plugins_url('/the-licence-manager');
    $test = get_option('licence_manager_1');
    // Query args
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC',
        'post_type' => 'license',
        'posts_per_page' => -1
    );
    // New Query Obj
    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        
        $html = '<table class="table table-bordered table-striped table-hover" id="table-licence-manager-overview">';
            $html .= '<thead>';
                $html.= '<tr>';
                    $html .= '<th>'.__('ID', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('License name', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Purchase type', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('License type', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Purchase date', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Expiry date', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Euro &euro;', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('&dollar; U.S.', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('&pound; GPB', 'the-license-manager').'</th>';
                    // $html .= '<th>'.__('Currently active', 'the-license-manager').'</th>';
                $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            
            while ($loop->have_posts() ) : $loop->the_post();
            
            $purchase_type = get_post_meta(get_the_ID(), 'purchase_type', false);
            $licence_type = get_post_meta(get_the_ID(), 'licence_type', false);
            $purchase_date = get_post_meta(get_the_ID(), 'purchase_date', false);
            $expiry_date = get_post_meta(get_the_ID(), 'expiry_date', false);
            $price_euro = get_post_meta(get_the_ID(), 'price_euro', false);
            $price_dollar = get_post_meta(get_the_ID(), 'price_dollar', false);
            $price_pound = get_post_meta(get_the_ID(), 'price_pound', false);

            $purchase_type_string = '';
            $licence_type_string = '';

            $html .= '<tr>';
                $html .= '<td>'.get_the_ID().'</td>';
                $html .= '<td><a href="'.get_home_url().'/wp-admin/post.php?post='.get_the_ID().'&action=edit" class="link-post" target="_self" title="'.__('Edit this licence', 'the-license-manager').'">'.get_the_title().'</a></td>';
                switch ($purchase_type[0]) {
                    case 'single_purchase':
                        $purchase_type_string = __('Single purchase', 'the-license-manager');
                        break;
                    case 'monthly_subscribtion':
                        $purchase_type_string = __('Monthly subscribtion', 'the-license-manager');
                        break;
                    case 'yearly_subscribtion':
                        $purchase_type_string = __('Yearly subscribtion', 'the-license-manager');
                        break;
                    case 'yearly_renewal_required':
                        $purchase_type_string = __('Yearly renewal required', 'the-license-manager');
                        break;
                }
                $html .= '<td>'.$purchase_type_string.'</td>';
                switch ($licence_type[0]) {
                    case 'single_licence':
                        $licence_type_string = __('Single licence', 'the-license-manager');
                        break;
                    case 'multisite_capable':
                        $licence_type_string = __('Multisite-capable', 'the-license-manager');
                        break;
                    case 'volume_licence':
                        $licence_type_string = __('Volume licence', 'the-license-manager');
                        break;
                }
                $html .= '<td>'.$licence_type_string.'</td>';
                $html .= '<td>'.$purchase_date[0].'</td>';
                $html .= '<td>'.$expiry_date[0].'</td>';
                if(!empty($price_euro[0])){
                    $html .= '<td>'.$price_euro[0].'&nbsp;&euro;</td>';
                } else {
                    $html .= '<td>&hyphen;</td>';
                }
                if(!empty($price_dollar[0])){
                    $html .= '<td>&dollar;&nbsp;'.$price_dollar[0].'</td>';
                } else {
                    $html .= '<td>&hyphen;</td>';
                }
                if(!empty($price_pound[0])){
                    $html .= '<td>&pound;&nbsp;'.$price_pound[0].'</td>';
                } else {
                    $html .= '<td>&hyphen;</td>';
                }
                // $html .= '<td>LOCK</td>';
            $html .= '</tr>';

            endwhile;

                $html .= '</tbody>';
                $html .= '<tfooter>';
                $html.= '<tr>';
                    $html .= '<th>'.__('ID', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Licence name', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Purchase type', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Licence type', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Purchase date', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Expiry date', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('Euro &euro;', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('&dollar; U.S.', 'the-license-manager').'</th>';
                    $html .= '<th>'.__('&pound; GPB', 'the-license-manager').'</th>';
                    // $html .= '<th>'.__('Lock licence', 'the-license-manager').'</th>';
                $html .= '</tr>';
            $html .= '</tfooter>';
        $html .= '</table>';

    } else {
        $html = '<div class="alert alert-warning" role="alert"><p><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" style="margin-top: -3px; margin-right: 10px" fill="currentColor" class="bi bi-emoji-expressionless" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm5 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/></svg>'.__('Currently no licences available','the-license-manager').'.</p></div>';
    }  
    echo $html;
    wp_reset_postdata();
}