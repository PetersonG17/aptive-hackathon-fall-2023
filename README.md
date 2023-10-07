### Project Setup ###
1. Copy the contents of the .env.example file into a new .env file in the root of the project directory and make any changes to ENV variables that are needed (It should work with the default values)
2. Run "docker-compose build" to build the docker images
3. Run "docker-compose up" to spin up the docker containers
4. Execute any artisan, composer, or other commands inside the docker container by opening the container terminal with this command: "docker-compose exec customer-notes-ai-web bash"

### Notes ###
- Artisan, Composer, and NPM commands should be executed from within the container

    "docker-compose exec customer-notes-ai-web bash"

- The node_modules and vendor directories are cached inside docker volumes for performance. Installation or updates of any new packages must be done from within the container. The subsequent changes to the vendor or node_modules folders will NOT show on the host system (But everything will still work)

- You will have to run the "php artisan migrate" command for any database changes. (This should be executed from inside the customer-notes-ai-web container)

- Access the Laravel Web UI from http://localhost:8080

- Access the MySQL database from http://localhost:3306
