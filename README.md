# :pushpin: Iterator Pattern Sample in PHP

This sample shows how the iterator pattern can be used to iterate an array of vegetables objects :pencil:.

<a href="https://travis-ci.com/awesome-php-code/iterator-pattern-in-depth"><img src="https://travis-ci.com/awesome-php-code/iterator-pattern-in-depth.svg?branch=main" alt="Build Status"></a>

# What is the Iterator Pattern :question:

Iterator is a behavioral design pattern that lets you traverse elements of a collection without exposing its underlying representation (list, stack, tree, etc.).

# When to use Iterator Pattern :question:

:heavy_check_mark: Use this pattern when the logic of iteration is not usual. You could split responsibilities creating one or more classes for traverse a collection.

:heavy_check_mark: Use this pattern to reduce duplicated code. When no iterator is defined the code for traverse a collection is usually created in the client side generating duplications!.

:heavy_check_mark: Use this pattern when you want your code to be able to traverse different data structures or when types of these structures are unknown beforehand.

# What do you expect of iterators :question:

:white_check_mark: The primary responsibility for collections is to store objects!, not traverse it!. So iterators must contain all logic for traverse collections.

:white_check_mark: All iterators must implement the same interface. This makes the client code compatible with any collection type or any traversal algorithm as long as there’s a proper iterator.

:white_check_mark: The pattern provides a couple of generic interfaces for both collections and iterators.
Given that your code now uses these interfaces, it’ll still work if you pass it various kinds of collections and iterators that implement these interfaces.

For more information about this pattern you can check [this page](https://refactoring.guru/design-patterns/iterator).
The following is the implementation of this pattern to solve a basic problem about iterating an array of vegetables objects.

# :round_pushpin: The Problem

Imagine you need to traverse vegetable objects inside a collection. The following are the two traversing criteria we need to meet.

1) Traverse only purple vegetables
2) Traverse vegetables ordered by size (from the least size to the greatest).

Consider vegetables as objects with the following properties

- Color (the vegetable color)
- Size (the vegetable size in cm)
- Expiration (the vegetable expiration in days)

Take in account the following list of vegetables to generate unit tests.

<p align="center"><img src="https://blog.pleets.org/img/articles/iterator_in_depth_collection.png" width="100%"></p>

| Name   | Color | Size | Expiration |
|----------|--------|----|----|
| Onion    | White  | 10 | 10 |
| Carrot   | Orange | 25 | 5  |
| Beetroot | Purple | 15 | 2  |
| Eggplant | Purple | 20 | 3  |
| Spinach  | Green  | 30 | 4  |

# :bulb: The Solution

:satellite: To solve this problem and meet all criteria we must use the iterator pattern. As all patterns, we need to declare
some contracts to implement this pattern. The main idea of the iterator pattern is separation of concerns, the primary responsibility for collections
is to store objects!, not traverse it!.

:large_blue_diamond: Step 1: We need to declare the **Iterator interface**. This interface is intended to define some
behaviour to all iterators. In PHP most of the problems can be solved through the built-in `\Iterator` interface.
This contract defines the following operations to traverse collections.

```php
interface Iterator extends Traversable {
    public function current();
    public function next();
    public function key();
    public function valid();
    public function rewind();
}
```

| Method   | Description |
|---------------|-------------|
| `current()` | Returns the current element |
| `next()` | Moves forward to next element |
| `key()` | Returns the key of the current element. |
| `valid()` | Checks if current position is valid |
| `rewind()` | Rewinds the Iterator to the first element |

Is a good practice to extend this interface to force the current object type. In our case we need to return the `Vegetable` type.

```php
interface RuleIterator extends \Iterator
{
    public function current(): Vegetable;
}
```

:large_blue_diamond: Step 2: We need to declare the **Iterable Collection interface**. This interface must be implemented
by the collection component. Again, In PHP most of the problems can be solved through the built-in `\IteratorAggregate` interface.

...