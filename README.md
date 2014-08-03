TeamStyle16 Web Dev.
====================
## Installation
----
最新的版本在dev分支中。优化了一下代码风格，添加了必要的注释。

1. 首先要给apache2安装一下mod_rewrite，可以参考这篇[教程](http://www.dev-metal.com/enable-mod_rewrite-ubuntu-12-04-lts/)。

    >需要注意一点：在最后一步```sudo nano /etc/apache2/sites-available/default```中，可能找不到文件。这应该是apache版本问题的原因，
    我的是在`/etc/apache2/apache2.conf`中找到并修改的。大家也可以自己找一找。

2. 在本地进行调试之前，请先按照application/_install里的MySQL初始化语句执行一遍
3. 修改`application/config/config.php`里的`define('DB_USER', 'root'); define('DB_PASS', 'wangjianyu');`，将用户名密码改为自己的即可。

## 有关文件目录的说明
----
- application/libs 里是一些基本类的声明和定义，大部分是模板，已经写好的。我们不需要做太多修改。But目前有一个bug就是在不同文件里声明的类，在其他文件中无法使用，每次都需要require才可以。
按照模板的说明，应该是自动载入才对。
- vendor这个文件夹没有什么用处，目前还没有发现它会影响功能。可以考虑删去。

## Log
#### 7-26
正式开始动工。
没有自己搭建mvc框架，在github上找到了一个还不错的模板[php-mvc](https://github.com/panique/php-mvc)。
在它的基础上做了一些小改动，只保留了最主要的部分。
clone之前建议先看一下原地址中的[README](https://github.com/panique/php-mvc/blob/master/README.md)，里面有使用说明(需要开启apache的mod_rewrite)，还有对mvc概念很清晰的介绍。

目前基本还没有开始编写工作，简单了写了一点登陆和注册的内容。

#### 7-30
继续编写model,可能是编辑器的原因代码缩进有些混乱。基本完成login/register的model。