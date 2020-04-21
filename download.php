
<?php

class DOWNLOAD
{
    public static function copyfile($url = '', $path = '', $option = [])
    {
        if (!empty($option)) {
            $user_pass = implode(':', $option);
            $headers = array('Authorization: Basic ' . base64_encode($user_pass), 'Content-Type: application/json');
        }

        $fp = fopen($path, 'w');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FILE, $fp);

        if (!empty($option)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        curl_exec($ch);

        curl_close($ch);
        fclose($fp);
    }
}
