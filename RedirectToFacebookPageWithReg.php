<!DOCTYPE html>

<html>

    <body>

    <?php

    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    function getOS() { 

        global $user_agent;

        $os_platform  = "Unknown OS Platform";

        $os_array     = array(
                              '/windows nt 11/i'      =>  'Windows 11',
                              '/windows nt 10/i'      =>  'Windows 10',
                              '/windows nt 6.3/i'     =>  'Windows 8.1',
                              '/windows nt 6.2/i'     =>  'Windows 8',
                              '/windows nt 6.1/i'     =>  'Windows 7',
                              '/windows nt 6.0/i'     =>  'Windows Vista',
                              '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                              '/windows nt 5.1/i'     =>  'Windows XP',
                              '/windows xp/i'         =>  'Windows XP',
                              '/windows nt 5.0/i'     =>  'Windows 2000',
                              '/windows me/i'         =>  'Windows ME',
                              '/win98/i'              =>  'Windows 98',
                              '/win95/i'              =>  'Windows 95',
                              '/win16/i'              =>  'Windows 3.11',
                              '/macintosh|mac os x/i' =>  'Mac OS X',
                              '/mac_powerpc/i'        =>  'Mac OS 9',
                              '/linux/i'              =>  'Linux',
                              '/ubuntu/i'             =>  'Ubuntu',
                              '/iphone/i'             =>  'iPhone',
                              '/ipod/i'               =>  'iPod',
                              '/ipad/i'               =>  'iPad',
                              '/android/i'            =>  'Android',
                              '/blackberry/i'         =>  'BlackBerry',
                              '/webos/i'              =>  'Mobile'
                        );

        foreach ($os_array as $regex => $value)
            if (preg_match($regex, $user_agent))
                $os_platform = $value;

        return $os_platform;
    }

    function getBrowser() {

      global $user_agent;
  
      $browser        = "Unknown Browser";
  
      $browser_array = array(
                              '/msie/i'      => 'Internet Explorer',
                              '/firefox/i'   => 'Firefox',
                              '/safari/i'    => 'Safari',
                              '/chrome/i'    => 'Chrome',
                              '/edge/i'      => 'Edge',
                              '/opera/i'     => 'Opera',
                              '/netscape/i'  => 'Netscape',
                              '/maxthon/i'   => 'Maxthon',
                              '/konqueror/i' => 'Konqueror',
                              '/mobile/i'    => 'Handheld Browser'
                       );
  
      foreach ($browser_array as $regex => $value)
          if (preg_match($regex, $user_agent))
              $browser = $value;
  
      return $browser;
    }
  
  
    $file = fopen("reg.txt","a");
    $dt = new DateTime("now", new DateTimeZone('America/Guatemala'));
  
    $ip  = $_SERVER['REMOTE_ADDR']. " | ";
    $dateTime = $dt->format('d/m/Y - H:i:s')." | ";
    $os        = getOS()." | ";
    $browser   = getBrowser()." | ";
  
  
    fwrite($file,$dateTime);
    fwrite($file,$ip);
    fwrite($file,$os);
    fwrite($file,$browser);
    fwrite($file,"\n");
  
    fclose($file);
  

    /**
     * fbid: ID DE LA PÁGINA DE FACEBOOK
     */
    $fbid     = "108577794287443"; 

    if(getOS() == "Android" || getOS() =="Mobile") {
      echo '<meta http-equiv="refresh" content="0; url=fb://page/'.$fbid.'" />';
    } elseif (getOS() =="iPhone" || getOS() =="iPod" || getOS() =="iPad") {
      echo '<meta http-equiv="refresh" content="0; url=fb://page/?id='.$fbid.'" />';
    } else {
      echo '<meta http-equiv="refresh" content="0; url=https://fb.com/'.$fbid.'" />';
    }

    ?> 

    </body>

</html>
