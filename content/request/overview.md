
# What is a Request?

In the ONEPIECE Framework, you can easily retrieve data such as form inputs sent from the client using `OP()->Request()`.

A "Request" includes:
- Data of Form sent by GET or POST methods  
- Data of JSON  

Internally, `OP()->Request()` decodes values from PHP’s global variables (`$_GET`, `$_POST`, etc.), so it's safe to output the result directly into HTML.

## Security

`OP()->Request()` is returns decoded values, so it is safe to output them directly as HTML.

---

## Retrieve all request values (GET, POST, JSON)

```php
$all_form_values = OP()->Request();
```

## Retrieve a specific value by key name

```php
$input_value = OP()->Request('key_name');
```
