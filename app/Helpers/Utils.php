<?php

namespace App\Helpers;


class Utils
{
    function base64_to_jpeg($base64_string, $output_file)
    {
        $ifp = fopen($output_file, "wb");
        // $data = explode(',', $base64_string);
        $data = $base64_string;
        fwrite($ifp, base64_decode($data));
        fclose($ifp);

        return $output_file;
    }

}