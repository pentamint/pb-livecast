#!/bin/bash

touch cnsh-hongegj.log

ffmpeg -rtsp_transport tcp -i rtsp://admin:1q2w3e4r.@2788243to7.wicp.vip:554/trackID=1 -c:v libx264 -c:a aac -ac 1 -strict -2 -crf 18 -profile:v baseline -maxrate 400k -bufsize 1835k -pix_fmt yuv420p -flags -global_header -hls_time 10 -hls_list_size 6 -hls_wrap 10 -start_number 1 -vf fps=fps=10 -progress cnsh-hongegj.log /mnt/c/xampp/htdocs/mpeg-dash/cnsh-hongegj.m3u8 -filter:v "select=not(mod(n\,3000)),setpts=N/((25)*TB)" -qscale:v 2 -f image2 -update 1 -y /mnt/c/xampp/htdocs/mpeg-dash/ss_cnsh-hongegj.jpg
#  > /dev/null 2>&1 < /dev/null

# Notes - frame%03d.jpg 3 digits increment code

pid=$!

while true
    do
        # you'll might have to change "invalid" 
        # for whatever is being put into the progress log
        # just look at /tmp/cnsh-hongegj.log to figure out what
        # grep should try to find 
        error=$(grep -n "end" cnsh-hongegj.log)

        # is the length of the error more than 0 / did grep find it???
        if (( ${#error} > 0 ))
            then
                kill -9 $pid
                ffmpeg -rtsp_transport tcp -i rtsp://admin:1q2w3e4r.@2788243to7.wicp.vip:554/trackID=1 -c:v libx264 -c:a aac -ac 1 -strict -2 -crf 18 -profile:v baseline -maxrate 400k -bufsize 1835k -pix_fmt yuv420p -flags -global_header -hls_time 10 -hls_list_size 6 -hls_wrap 10 -start_number 1 -vf fps=fps=10 -progress cnsh-hongegj.log /mnt/c/xampp/htdocs/mpeg-dash/cnsh-hongegj.m3u8 -filter:v "select=not(mod(n\,3000)),setpts=N/((25)*TB)" -qscale:v 2 -f image2 -update 1 -y /mnt/c/xampp/htdocs/mpeg-dash/ss_cnsh-hongegj.jpg
                #  > /dev/null 2>&1 < /dev/null
            pid=$!
        else
            sleep 100
        fi
    done
exit 0
