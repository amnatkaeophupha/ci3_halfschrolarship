<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Output extends CI_Output {

    public function clear_all_cache()
    {
        $CI =& get_instance();
        $path = $CI->config->item('cache_path');
        $cache_path = ($path == '') ? APPPATH.'cache/' : $path;

        $files = glob($cache_path.'*');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file); // ลบ cache ทีละไฟล์
            }
        }
    }
}
