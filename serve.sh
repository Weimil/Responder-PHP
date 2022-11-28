while true; do
  composer dump-autoload
  docker-compose -f docker-compose.json up -d
  php -S localhost:9000 responder.php
  docker-compose -f docker-compose.json stop
  clear
  echo "Restarting in 3 seconds"
  sleep 1
  echo "Restarting in 2 seconds"
  sleep 1
  echo "Restarting in 1 seconds"
  sleep 1
  clear
  echo "Starting"
done
