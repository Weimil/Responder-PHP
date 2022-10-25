while [ true ] 
do
    php -S localhost:9000 Responder.php
    clear
    echo "Restarting in 3 seconds"
    sleep 1
    echo "Restarting in 2 seconds"
    sleep 1
    echo "Restarting in 1 seconds"
    sleep 1
    clear
    echo "Starting"
done;