# Welcome to the First Tutorial

In this chapter, you will learn how to set up a basic controller and load template files in the ONEPIECE Framework.

## Execution Flow

1. The execution starts from `app.php`.
2. `app.php` calls `asset:/bootstrap/index.php` to initialize the ONEPIECE Framework.
3. After initialization, it locates and executes the appropriate `index.php` based on the URL.
4. The `index.php` file acts as a "controller" in a traditional MVC framework.

---

## Directory Structure and URL Mapping

|                     |                                       |
|---------------------|-------------------------------------------|
| Document Root       | `/var/www/public_html/`                   |
| Application Directory | `/var/www/public_html/community/`       |
| Entry Point         | `/var/www/public_html/community/app.php` |

| Access URL                                     | Executed File                                                  | Notes                                   |
|------------------------------------------------|-----------------------------------------------------------------|-----------------------------------------|
| `https://example.com/community/`              | `/var/www/public_html/community/index.php`                     | Top page                                |
| `https://example.com/community/login/`        | `/var/www/public_html/community/login/index.php`               | Login page                              |
| `https://example.com/community/login/confirm/`| `/var/www/public_html/community/login/index.php`               | `confirm` is passed as a URL argument   |

---

If the corresponding `index.php` does not exist, the `index.php` of the upper directory will be executed, and the remaining path components will be passed as arguments.
