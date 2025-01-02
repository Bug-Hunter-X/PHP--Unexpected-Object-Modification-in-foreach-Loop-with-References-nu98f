In PHP, a common yet subtle error arises when dealing with references and objects, especially within loops or recursive functions.  Consider this example:

```php
function modifyObjects(array &$objects) {
    foreach ($objects as &$object) {
        $object->value++;
    }
}

$objects = [
    (object)['value' => 1],
    (object)['value' => 2],
];

modifyObjects($objects);
print_r($objects); // Output: Unexpected behavior, values might be incremented more than once.
```

The issue is with the `&$object` in the foreach loop.  The `&` creates a reference, not a copy.  Therefore, subsequent iterations of the loop will continue to modify the same object reference. This usually leads to unexpected results, where object values are incremented more often than expected or even into an infinite loop depending on the function's logic. 