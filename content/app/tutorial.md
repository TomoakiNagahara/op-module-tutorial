# Setting Up `index.php`

## Preparation - Start the ONEPIECE App

 1. To start the ONEPIECE application, run the following command in the terminal (inside the directory where `app.php` is located):
    ```sh
    php -S localhost:81 ./app.php
    ```
 1. Visit http://localhost:81 in your browser. If the skeleton screen appears, you're ready to go.
    This directory becomes the App Root (referred to as app:/ in the framework).

## Create a index.php

 1. Access http://localhost:81/test/ in your browser. You should see a 404 Page Not Found error (because index.php does not exist yet).
 1. Create a folder named `test` under the App Root and inside it, create a file named index.php.
 1. Reload http://localhost:81/test/ — this time, a blank page should appear (since index.php exists but contains no output).
 1. Write the following in test/index.php: `<?php echo '<p>Hello, new World!</p>'`
 1. Reload the page at http://localhost:81/test/ . You should now see: “Hello, new World!”

## Add a Template File - Separate the View

Following the MVC concept, we separate the view into a template file.
This approach makes the code easier to maintain.

In the ONEPIECE Framework, the file that acts as the controller is index.php, and the file that corresponds to the view is loaded as a template with the .phtml extension. 
Now, let's begin the tutorial.

 1. Create a new file at `app:/test/view.phtml` and add the following:
    ```php:app:/test/view.phtml
    <h1>Hello, new world?</h1>
    ```
 1. Next, modify `app:/test/index.php` as follows to load the `view.phtml` file as a template.
    ```php:app:/test/index.php
    <?php // echo '<p>Hello, new World!</p>';
    //  Load the template file and display.
    OP()->Template('view.phtml');
    ```
 1. Visit `http://localhost:81/test/` again and check if the template content is displayed.

If the timid phrase `Hello, new world?` is displayed, it means success.

## Pass Arguments to the Template

You can pass arguments to the template method. The arguments must always be an associative array.

 1. Add the following to index.php:
    ```php:app:/test/index.php
    <?php // echo '<p>Hello, new World!</p>';
    
    //  Add the argument definition.
    $args = [
      'p' => 'The NEWWORLD is a new world!'
    ];
    
    //  Pass the above $args as the second argument.
    OP()->Template('view.phtml', $args);
    ```
 1. In the template file, you can retrieve the arguments using $_ARGS. The variable name $_ARGS is fixed and cannot be changed.
    ```php:app:/test/view.phtml
    <h1>Hello, new world?</h1>
    <p><?php echo $_ARGS['p'] ?></p>
    ```

If the string 'The NEWWORLD is a new world!' is displayed, it means success.

## Routing

In ONEPIECE Framework, `index.php` serves as the root file for its directory.  
From this `index.php`, you can delegate processing to other files based on certain conditions.  
For example, if the login process has not been completed, you can route the request to the login page.

In this section, we will learn how `index.php` can route processing to another file based on the URL argument.  
To obtain URL arguments, you can get the Router unit.  
Let's add the following code to your `index.php`:

```php:index.php
// Get URL arguments
$url_args = OP()->Unit()->Router()->Args();

// Route to a file based on the first URL argument
if( count($url_args) ){
    $route = array_unshift($url_args);
    OP()->Template("{$route}.php");
}
```

Once the code is added, try accessing the admin page at:
http://localhost:81/test/admin

Oops! Naturally, an error will be displayed.
That’s because the file admin.php does not exist yet.

Now, create a file named admin.php inside the test directory, and add the following code:

```php:app:/test/admin.php
<?php
echo OP()->isAdmin() ? 'Yes, You are admin!':'No, Your not admin.';
```

After creating the admin.php file, reload the page in your browser.
This time, it should work correctly.
