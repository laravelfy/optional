# Laravelfy Optional

一个由 laravel optional 启发的扩展
---
[![travis-ci.svg](https://img.shields.io/travis/laravelfy/optional/master.svg?style=flat-square)](https://travis-ci.org/laravelfy/optional)

## 使用

```
composer require laravelfy/optional
```

```php
<?php

optional2($obj)->function();
optional2($obj)->property->next_property;
```

## 原理

 - 当尝试获取 optional2 返回对象的属性时，不论取得与否，均返回一个新的 optional2 对象，保证链式操作不报错。
 - 当尝试调用 optional2 返回的对象的方法时，不论执行成功与否，均返回新的 optional2 对象（成功的话对象的 storage 为执行结果）。

## 已知问题

 - [ ] 不要在将 optional2 应用于 `if` 等条件判断。因为 optional2 返回的是个递归对象，无法替代 bool。
 - [ ] 不要讲 optional2 直接使用于数字运算。

## License

MIT