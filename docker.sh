while true; do
  docker-compose -f docker-compose.json up
  clear
  docker-compose -f docker-compose.json stop
  echo "Restarting in 3 seconds"
  sleep 1
  echo "Restarting in 2 seconds"
  sleep 1
  echo "Restarting in 1 seconds"
  sleep 1
  clear
  echo "Starting"
done
