<?php
extract(['Target' => isset($_GET['URL']) ? $_GET['URL'] : readline('Enter URL => ') , 'Return' => '']);
foreach ([
    21 => 'FTP Control' ,
    22 => 'SSH' ,
    25 => 'SMTP' ,
    80 => 'HTTP' ,
    81 => 'TorPark' ,
    110 => 'POP3' ,
    143 => 'IMAP' ,
    443 => 'HTTPS' ,
    445 => 'SMB'
] as $Port => $Value) :
    $Connection = @fsockopen($Target , $Port , $er , $err , 0.5);
    if (is_resource($Connection)) :
        $Return = $Return . $Target.':'.$Port.' ('.$Value.')'.' Is Open !'.PHP_EOL;
        fclose($Connection);
    else :
        $Return = $Return . $Target.':'.$Port.' ('.$Value.')'.' Is Close !'.PHP_EOL;
    endif;
endforeach;
echo $Return;
?>