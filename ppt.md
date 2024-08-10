---
marp: true
---

# **1. Intro 🙌**

Hi, I'm Dishant Pal, a full-stack developer at Enacton Technologies. We specialize in developing tools and services for the affiliate industry and enterprise businesses.

🔹 **Company:** Enacton Technologies  
🔹 **Role:** Full-Stack Developer Team Lead
🔹 **Expertise:** PHP, Laravel, Node.js, React, Devops and more

---

# **2. Agenda 🎯**

1. **Introduction**
2. **Package 1: Laravel Migrations Generator**
3. **Package 2: iSeed**
4. **Package 3: Page Cache**
5. **Package 4: Totem**
6. **Live Demo**
7. **Q&A**
8. **Thank You**

---

# **3. Package 1: Laravel Migrations Generator 🏵️**

## **3.1 Description and Why**

- **Description:** Generates migration files from existing database tables.
- **Why:** Facilitates database management and version control without manually writing migrations.

**Features:**
- Auto-generates migrations
- Supports existing databases

---

## **3.2 Installation**

```bash
composer require --dev "kitloong/laravel-migrations-generator"
```

## **3.3 How to Use**

- Generate migrations for the entire database:

  ```bash
  php artisan migrate:generate
  ```

- Generate migrations for specific tables:

  ```bash
  php artisan migrate:generate tables="table1,table2,..."
  ```

---

## **3.4 Additional Notes**

- Customize output using `--path` option.
- Ensure database credentials are configured.

---

# **4. Package 2: iSeed 🫐**

## **4.1 Description and Why**

- **Description:** Creates seed files from existing data in the database.
- **Why:** Allows quick seeding of database with existing data, useful for development and testing.

**Features:**
- Auto-generates seed data
- Supports multiple tables

---

## **4.2 Installation**

```bash
composer require --dev "kitloong/laravel-seeder"
```

## **4.3 How to Use**

- Generate seed files:

  ```bash
  php artisan iseed tablename
  ```
---


## **4.4 Additional Notes**

![https://img.enacton.com/ShareX/2024/08/QAb8JC8Vs6.png](https://img.enacton.com/ShareX/2024/08/QAb8JC8Vs6.png)

---

# **5. Package 3: Page Cache ✈️**

## **5.1 Description and Why**

- **Description:** Caches entire page responses as static files for faster loading.
- **Why:** Reduces server load and speeds up page delivery by serving static files.

**Features:**
- Caches full pages
- Ability to clear all cache or specific page or based on tag
- Provides middleware to cache specific page
- Configurable caching behavior

---

## **5.2 Installation**

```bash
composer require silber/page-cache
```

## **5.3 How to Use**

- Add middleware to `Kernel.php`:

  ```php
  protected $middlewareGroups = [
      'web' => [
          \Silber\PageCache\Middleware\CacheResponse::class,
          /* ... keep existing middleware */
      ],
  ];
  ```

- Use middleware on routes:

  ```php
  Route::middleware('page-cache')->get('posts/{slug}', 'PostController@show');
  ```

---

## **5.4 Additional Notes**

- Configure web server to serve cached files:
  - **nginx:**

    ```nginx
    location = / {
        try_files /page-cache/pc__index__pc.html /index.php?$query_string;
    }

    location / {
        try_files $uri $uri/ /page-cache/$uri.html /page-cache/$uri.json /page-cache/$uri.xml /index.php?$query_string;
    }
    ```

- Clear cache with:

  ```bash
  php artisan page-cache:clear
  ```

---

# **6. Package 4: Totem ⚙️**

## **6.1 Description and Why**

- **Description:** Manages Laravel schedules and console commands with a user-friendly dashboard.
- **Why:** Provides an intuitive interface to schedule, manage, and monitor tasks without modifying code directly.

**Features:**
- GUI for managing schedules and commands
- Enable/disable tasks on the fly
- Schedule commands easily

--- 

## **6.2 Installation**

```bash
composer require studio/laravel-totem
```

- Add `TotemServiceProvider` to `providers` in `config/app.php`:

  ```php
  Studio\Totem\Providers\TotemServiceProvider::class,
  ```

- Run migrations and publish assets:

  ```bash
  php artisan migrate
  php artisan totem:assets
  ```


- Make sure to have the laravel task scheduler cron setup:

  ```bash
  * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
  ```



---

## **6.3 How to Use**

- Access dashboard at `/totem` in your application.
- Configure authentication in `AppServiceProvider`:

  ```php
  use Studio\Totem\Totem;

  Totem::auth(function($request) {
      return Auth::check(); // true or false
  });
  ```

- Schedule tasks via the dashboard or command line:

  ```bash
  php artisan schedule:list
  ```

---

## **6.4 Additional Notes**

- Filter Commands Dropdown:
  ```php
    'artisan' => [
        'command_filter' => [
            'stats:*',
            'email:daily-reports'
        ],
    ],
  ```

- Console Command:
  ```Bash
    php artisan schedule:list
  ```

---

# **7. Demo Time**

🚀 **Live Demonstration of Packages**

- **Laravel Migrations Generator:** Generating migrations live.
- **iSeed:** Creating and applying seed files.
- **Page Cache:** Implementing and clearing page cache.
- **Totem:** Managing schedules and commands via the GUI.

---

# **8. Q&A**

❓ **Questions and Answers**

Feel free to ask about any of the packages or demos!

---

# **9. Thank You**

🙏 **Thank you for attending!**

- **Contact:** dishantpal37@gmail.com, dspal@enacton.com
- **Code:** https://github.com/DishantPal/coffee-hub
- **Slides:** https://github.com/DishantPal/coffee-hub/ppt.html
