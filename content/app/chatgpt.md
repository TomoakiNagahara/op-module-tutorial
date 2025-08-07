# 🎉 Welcome to the First Tutorial

## Overview

In this tutorial, you'll learn the basics of how the ONEPIECE Framework works — starting from how it initializes, to how it handles routing, and how to render views using templates.

----

## 🔧 Step 1: Start the Application

1. Open your terminal and navigate to the cloned `op-skeleton-2030` directory.
2. Run the following command to start the built-in PHP web server:

        php -S localhost:81 ./app.php

3. Visit the following URL in your browser:

        http://localhost:81

   If the skeleton screen appears, the application is up and running!

> ✅ `app.php` is the entry point of your application and represents `app:/`.

----

## 📁 Step 2: Create a Controller (index.php)

1. Access the following URL:

        http://localhost:81/test/

   You should see a **404 Page Not Found** error.
2. In the App Root directory, create a folder named `test/`.
3. Inside it, create a file named `index.php` with the following content:

        <?php echo '<p>Hello, new World!</p>';

4. Reload the page. You should now see:

        Hello, new World!

----

## 🎨 Step 3: Create a Template View

1. Create a file at:

        app:/test/view.phtml

   With the following content:

        <h1>Hello, new world?</h1>

2. Modify `index.php` like this:

        <?php // echo '<p>Hello, new World!</p>';
        OP()->Template('view.phtml');

3. Access the URL again:

        http://localhost:81/test/

   You should now see the contents of `view.phtml`.

----

## 🧾 Step 4: Pass Arguments to the Template

1. Modify `index.php` to pass arguments:

        <?php
        $args = [
            'p' => 'The NEWWORLD is a new world!'
        ];
        OP()->Template('view.phtml', $args);

2. Modify `view.phtml` to receive and display the argument:

        <h1>Hello, new world?</h1>
        <p><?php echo $_ARGS['p']; ?></p>

3. Reload the page — you should see:

        The NEWWORLD is a new world!

----

## 🔀 Step 5: Simple Routing with URL Arguments

1. Add the following to `index.php`:

        $url_args = OP()->Unit()->Router()->Args();
        D($url_args);

        if( count($url_args) ){
            $route = array_unshift($url_args);
            OP()->Template("{$route}.php");
        }

2. Try accessing:

        http://localhost:81/test/admin

   You should see an error (since `admin.php` does not exist yet).

3. Create a new file:

        app:/test/admin.php

   With the following content:

        <?php
        echo OP()->isAdmin() ? 'Yes, You are admin!' : 'No, You are not admin.';

4. Reload the page. You should now see either message depending on your admin status.

----

## ✅ Summary

You’ve learned:

- How ONEPIECE initializes from `app.php`
- How `index.php` acts as a controller
- How to use templates (`.phtml`)
- How to pass arguments to templates
- How to implement simple routing

----

➡️ Let's move on to the next chapter: **CI/CD**

[🚀 Start CI/CD Tutorial](./cicd.md)
