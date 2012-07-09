<?php
/*
  Plugin Name: qTranslate extension
  Plugin URI: http://fractalia.pe/
  Description: An extension of qtranslate for make other plugins multilanguage.
  Author: Fractalia - Applications lab
  Autor URI: http://fractalia.pe/
  Version: 0.1.1
 */

class Multilanguage_Widget extends WP_Widget {

    function Multilanguage_Widget() {
        $widget_ops = array('classname' => 'widget_multilanguage', 'description' => __('Arbitrary text, HTML, or PHP Code'));
        $control_ops = array('width' => 400, 'height' => 350);
        $this->WP_Widget('widget_multilanguage', __('Multilanguage Text'), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', apply_filters('the_title', empty($instance['title']) ? '' : $instance['title'], $instance));
        $text = $instance['text'];
        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }
        ob_start();
        eval('?>' . $text);
        $text = ob_get_contents();
        ob_end_clean();
?>
<?php $text = apply_filters('the_content', $text); ?>
        <div class="multilanguage-widget"><?php echo $instance['filter'] ? wpautop($text) : $text; ?></div>
<?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        if (current_user_can('unfiltered_html'))
            $instance['text'] = $new_instance['text'];
        else
            $instance['text'] = $new_instance['text'];
        $instance['filter'] = isset($new_instance['filter']);
        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'text' => ''));
        $title = $instance['title'];
        $text = format_to_edit($instance['text']);        
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat multilanguage-input" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <textarea class="widefat multilanguage-input" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

        <p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs.'); ?></label></p>
<?php
    }

}

add_action('widgets_init', create_function('', 'return register_widget("Multilanguage_Widget");'));

function qtranslate_extension() {
    global $q_config;
    if (isset($q_config)) {
        foreach ($q_config['enabled_languages'] as $iso_code) {
            $enabled_languages[] = '\'' . $iso_code . '\'';
            $flags[] = '\'' . $q_config['flag'][$iso_code] . '\'';
        }
?>
        <style type="text/css">
            .multilanguage-inputs{margin-bottom:5px; display:block;}
            .multilanguage-inputs *{display:none;}
            .multilanguage-inputs .current{display:block !important;}
            .multilanguage-flags{margin-bottom:8px;display:block;}
            .multilanguage-flags img{margin-right:5px; opacity:0.5;filter:alpha(opacity=50);cursor:pointer;}
            .multilanguage-flags img.current{opacity:1 !important;filter:alpha(opacity=100) !important;}
        </style>
        <script type="text/javascript">
            function uniqid (prefix, more_entropy) {
                // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
                // +    revised by: Kankrelune (http://www.webfaktory.info/)
                // %        note 1: Uses an internal counter (in php_js global) to avoid collision
                // *     example 1: uniqid();
                // *     returns 1: 'a30285b160c14'
                // *     example 2: uniqid('foo');
                // *     returns 2: 'fooa30285b1cd361'
                // *     example 3: uniqid('bar', true);
                // *     returns 3: 'bara20285b23dfd1.31879087'

                if (typeof prefix == 'undefined') {
                    prefix = "";
                }

                var retId;
                var formatSeed = function (seed, reqWidth) {
                    seed = parseInt(seed,10).toString(16); // to hex str
                    if (reqWidth < seed.length) { // so long we split
                        return seed.slice(seed.length - reqWidth);
                    }
                    if (reqWidth > seed.length) { // so short we pad
                        return Array(1 + (reqWidth - seed.length)).join('0')+seed;
                    }
                    return seed;
                };

                // BEGIN REDUNDANT
                if (!this.php_js) {
                    this.php_js = {};
                }
                // END REDUNDANT
                if (!this.php_js.uniqidSeed) { // init seed with big random int
                    this.php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
                }
                this.php_js.uniqidSeed++;

                retId  = prefix; // start with prefix, add current milliseconds hex string
                retId += formatSeed(parseInt(new Date().getTime()/1000,10),8);
                retId += formatSeed(this.php_js.uniqidSeed,5); // add seed hex string

                if (more_entropy) {
                    // for more entropy we add a float lower to 10
                    retId += (Math.random()*10).toFixed(8).toString();
                }

                return retId;
            }

            var languages = [<?php echo implode(',', $enabled_languages) ?>];
            var flags = [<?php echo implode(',', $flags) ?>];
            var content_lang;

            function generateMultilanguageElements(d){
                if(!d){
                    d = jQuery('body');
                }
                d.find('form').each(function(i,form){
                    f = jQuery(form);
                    if(f.find('.multilanguage-input').length > 0){
                        f.find('.multilanguage-input').each(function(j,element){
                            e = jQuery(element);
                            if(e.attr('id') == undefined){
                                e.attr('id',uniqid());
                            }
                            if(f.find('div.multilanguage-element[rel="'+e.attr('id')+'"]').length > 0){
                                return false;
                            }
                            f.addClass('multilanguage-form');
                            e.hide().after('<div class="multilanguage-element" rel="' + e.attr('id') + '"></div>');
                            m = jQuery('div[rel=' + e.attr('id') + ']');
                            m.html('<span class="multilanguage-inputs" style="width:'+e.width()+'"></span><span class="multilanguage-flags"></span>');
                            p = true;
                            for(i = 0; i < languages.length; i++){
                                if(e.val().match('<!--:([a-z]{2})-->')){
                                    value = ('' == e.val()) ? '' : e.val().match('<!--:'+languages[i]+'-->(.|\n)*?<!--:-->');
                                    value = (value == null) ? '' : value[0].replace('<!--:'+languages[i]+'-->','').replace('<!--:-->','');
                                } else {
                                    value = e.val();
                                }
                                switch(this.tagName.toLowerCase()){
                                    case 'input':
                                        html_input = '<input class="'+jQuery.trim(e.attr('class').replace('multilanguage-input',''))+'" value="'+value+'" type="text" lang="'+languages[i]+'" id="'+languages[i]+'_'+e.attr('id')+'" style="'+e.attr('style')+';" />';
                                    break;
                                    case 'textarea':
                                        html_input = '<textarea class="'+jQuery.trim(e.attr('class').replace('multilanguage-input',''))+'" ' + ((e.attr('cols') > 0) ? 'cols="'+e.attr('cols')+'"' : '') + 'rows="'+e.attr('rows')+'" lang="'+languages[i]+'" id="'+languages[i]+'_'+e.attr('id')+'" style="'+e.attr('style')+';">'+value+'</textarea>';
                                    break;
                                }
                                html_flag = '<img alt="'+languages[i]+'" src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/qtranslate/flags/'+flags[i]+'" />';
                                m.find('span.multilanguage-inputs').append(html_input);
                                m.find('span.multilanguage-flags').append(html_flag);
                                jQuery('#' + languages[i] + '_' + e.attr('id')).val((value == null) ? '' : value);
                            }
                            m.find('span.multilanguage-inputs').children(':first').addClass('current');
                            m.find('span.multilanguage-flags').children(':first').addClass('current');
                        });
                        if(languages.length == 1){
                            jQuery('.multilanguage-flags').css('display','none');
                        }
                    }
                });
            }

                function prepareMultilanguageData(form){
                    form.find('.multilanguage-input').each(function(i, e){
                        content = '';
                        for(i=0; i < languages.length; i++){
                            val = jQuery('div[rel='+jQuery(e).attr('id')+']').find('#'+languages[i]+'_'+jQuery(e).attr('id')).val();
                            if(jQuery.trim(val) != ''){
                                content += '<!--:'+languages[i]+'-->'+val+'<!--:-->';
                            }
                        }
                        jQuery(e).val(content);
                    });
                }

                jQuery(document).ready(function(){
                    jQuery('.multilanguage-form .widget-control-save').live('click', function(){
                        var form = jQuery(this).parents('form:first');
                        if(form.hasClass('multilanguage-form')){
                            prepareMultilanguageData(form);
                            setTimeout(function(){
                                generateMultilanguageElements(form.parent());
                            },2500);
                        }
                    });


                    jQuery('span.multilanguage-flags img').live('click',function(){
                        var img = jQuery(this);
                        img.parent().find('.current').removeClass('current');
                        img.addClass('current');
                        img.parent().prev('span').find('.current').removeClass('current');
                        img.parent().prev('span').find('[lang="'+img.attr('alt')+'"]').addClass('current').focus();
                    });

                    jQuery('form.multilanguage-form').live('submit',function(){
                        prepareMultilanguageData(jQuery(this));
                    });

                    generateMultilanguageElements();
                });
        </script>
<?php
    }
}

add_action('admin_footer', 'qtranslate_extension');

function qtranslate_edit_taxonomies() {
    $args = array(
        'public' => true,
        '_builtin' => false
    );
    $output = 'object'; // or objects
    $operator = 'and'; // 'and' or 'or'

    $taxonomies = get_taxonomies($args, $output, $operator);

    if ($taxonomies) {
        foreach ($taxonomies as $taxonomy) {
            add_action($taxonomy->name . '_add_form', 'qtrans_modifyTermFormFor');
            add_action($taxonomy->name . '_edit_form', 'qtrans_modifyTermFormFor');
        }
    }
}

add_action('admin_init', 'qtranslate_edit_taxonomies');

?>