#! /bin/bash

for((i=1;i<=$1;i++));
do
    #/usr/local/php/bin/php /data/wwwroot/sign_project/v1_php/sign_check.php &
    /usr/local/php/bin/php /root/sign_check/v1_php/sign_check.php &
    echo $! >> process.pid
done