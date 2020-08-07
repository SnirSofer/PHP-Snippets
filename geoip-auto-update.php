<?php

$mmdb_resources = [
        'ASN' => 'GeoLite2-ASN',
        'CITY' => 'GeoLite2-City',
        'COUNTRY' => 'GeoLite2-Country'
];
$workingpath = '.';
$license_key = ''; //maxmind api key

foreach($mmdb_resources as $source => $edition) {
        $url = sprintf('https://download.maxmind.com/app/geoip_download?edition_id=%s&license_key=%s&suffix=tar.gz',$edition,$license_key);
        if(file_put_contents( $workingpath.'/'.strtolower($source).'.tar.gz',file_get_contents($url))) {
            echo $source. " File downloaded successfully";
            $p = new PharData($workingpath.'/'.strtolower($source).'.tar.gz');
            $p -> decompress();
            $phar = new PharData($workingpath.'/'.strtolower($source).'.tar');
            $phar -> extractTo($workingpath.'/'.$source);
            unlink($workingpath.'/'.strtolower($source).'.tar.gz');
            unlink($workingpath.'/'.strtolower($source).'.tar');

            $it = new RecursiveDirectoryIterator($workingpath.'/'.$source);
            $display = Array ( 'mmdb','mmdb2' );
            foreach(new RecursiveIteratorIterator($it) as $file)
            {
                $filename = basename($file);
                $fn = explode('.',$filename);
                $extention = end($fn);
                if ($extention == 'mmdb') {
                   rename($file,$workingpath.'/'.$filename);
                   deleteDir($workingpath.'/'.$source);
                }
            }
        } else {
            echo $source. " File downloading failed.";
        }
}

function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
