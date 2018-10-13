<?php
if ( ! function_exists('js')) {
    function js($js) {
        $js_base_path = '';
        if(is_array($js)) {
            foreach($js as $script_src) {
                if(strpos($script_src, 'http://') === false && strpos($script_src, 'https://') === false) {
                    $js_base_path = base_url();
                }
                echo "<script src=\"{$js_base_path}{$script_src}\"></script>";
            }
        } else {
            if(strpos($js, 'http://') === false && strpos($js, 'https://') === false) {
                $js_base_path = base_url();
            }
            echo "<script src=\"{$js_base_path}{$js}\"></script>";
        }
    }
}
?>