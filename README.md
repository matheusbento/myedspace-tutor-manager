## Project Access

URL: https://ecfglebwkqjkwvwmzw47xmgb4q0yexby.lambda-url.us-east-1.on.aws

## Demonstration Video

https://youtu.be/QBEPzIlhfug

## Project Setup

1. **Clone the Repository:**
   ```bash
    git clone https://github.com/matheusbento/myedspace-tutor-manager
    ```
2. **Go to repository:**
   ```bash
    cd myedspace-tutor-manager
    ```
3. **Install laravel dependencies:**
   ```bash
    composer install
    ```
4. **Create a copy of the `.env` from `.env.example` file:**
5. **Start Laravel Sail using Docker**
   ```bash
    ./vendor/bin/sail up
    ```
6. **Run the migrations + seeder:** 
   ```bash
     ./vendor/bin/sail migrate --seed
     ```
7. **Run tests:** 
   ```bash
     ./vendor/bin/sail test
     ```
8. **Npm Install:** 
   ```bash
     npm install
     ```
9. **Npm Run Dev:** 
   ```bash
     npm run dev
     ```

## Assumptions Made During Development
- I use Laravel Sail to help on local development
- Facades to help on the service access.
 
## Explanation of design decisions and architectural choices
- Service Layer: Created a service layer to manage the Tutor, called TutorService
- Facades: Used facades to call the Service Layer statically.
- Database: Used mysql database
- Testing: Used the PHPUnit for testing, Created Features and Unit tests, also tests for Filament with 95% of coverage.
- Livewire: Implement the tutor search using the Livewire
- Laravel Pint: For better php style and pattern.
- Frontend: Used tailwind css.
- Vapor: To deploy the application.

## Ideas for future improvements and scalability considerations
- Implement Auth0, I had issue when implementing it as a bonus task, the issue was related too many requests.
- Would be good have a pagination if the amount of tutors increase and also Implement some tools that helps on search like Postgresql or Elasticsearch.

## Instructions for running tests and checking code coverage
- Existent Coverage HTML:
Folder:  ```myedspace-tutor-manager/coverage/index.html```
- Run Tests:

  ```bash
    ./vendor/bin/sail test
   ```
- Check Code Coverage:

  ```bash
  ./vendor/bin/phpunit --coverage-html coverage
  ```
