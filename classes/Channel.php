<?php 

class Channel {

    public static function getSource() {
        $host = $_SERVER['HTTP_HOST'];
        
        $session = Session::instance();
        $source = $session->get('source', $host);
        
        if (!empty($_SERVER['HTTP_REFERER'])) {
            $referer = $_SERVER['HTTP_REFERER'];
            $url_info = parse_url($referer);
            if (isset($url_info['host']) && strpos($url_info['host'], $host) === false) {
                if ($url_info['host'] != $source) {
                    $source = $url_info['host'];
                    $session->set('source', $source);
                }
            }
        }
        
        return $source;
    }
}