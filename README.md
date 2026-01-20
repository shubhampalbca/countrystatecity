## Country–State–City Dropdown (Laravel)

Simple Laravel app that shows a dependent Country → State → City dropdown and saves the selection.

### Requirements
- PHP 8+, Composer
- MySQL/MariaDB
- WAMP/XAMPP or PHP CLI

### Setup
1. Install dependencies:
   ```bash
   composer install
   ```
2. Create your environment file:
   - Windows (PowerShell): `copy .env.example .env`
   - Or do it manually in your editor.
3. Configure database in `.env`:
   - `DB_DATABASE=countrystatecity`
   - `DB_USERNAME=root` (WAMP default)
   - `DB_PASSWORD=` (empty on WAMP by default)
4. Generate app key:
   ```bash
   php artisan key:generate
   ```

### Run the app
```bash
php artisan serve
```
Open `http://127.0.0.1:8000/dropdown` to use the form.

### What it does
- Loads Countries, then States, then Cities via AJAX.
- Endpoints:
  - `POST api/fetch-states`
  - `POST api/fetch-cities`
- Submit saves your selection.

### Import the database (last step)
You already have a dump file in the project root: `countrystatecity.sql`.

- Using phpMyAdmin (WAMP):
  1. Create a database named `countrystatecity`.
  2. Go to Import → Choose file → select `countrystatecity.sql`.
  3. Click Import.

- Using MySQL command line:
  ```bash
  mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS countrystatecity CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
  mysql -u root -p countrystatecity < countrystatecity.sql
  ```

After importing, reload `http://127.0.0.1:8000/dropdown`.
