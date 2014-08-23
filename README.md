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
----
#### 8-23 by neil
完成了论坛的model，正在写controller，计划之后看一看信息推送的实现方法。

#### 8-21 by neil
-增加了简单的权限管理分为三个组”admin","dev","guest",用户属性存储在user表的user_type列中，已经修改了相应的login_model,登陆会将相关信息写入session中（同名位置），@loveisbasa修改register views时加入这个选项吧，不过admin不要加入注册页面中，搭站时直接写一个用户到数据库中。

#### 8-23 by ricky
- 增加了头像功能，目前可以使用。注册时使用默认头像，登陆后可以自行更改。
- 由于涉及到dashboard的controller和view，所以也顺带把这两个文件简单改了一下。dashboard界面进行了简单的分块，可还是非常的难看= =
- 用户昵称可以输入中文。
- dashboard页面需要进一步改进，认为应该增加一个setting的页面
- 对框架做了一点修改，目前libs中的类都可以直接使用，写起来会方便那么一丢丢。

#### 8-18 by ricky
- 下午尝试写了一下前端，bootstrap相关文件已加入目录；现在还比较粗糙但是起码看起来像点网站的样子了,一会再优化一下

>虽然没有系统看过css和bootstrap的教程，个人理解css就像是一个头文件，里面有各种类声明，我们在编写html代码时只要在标签后面适当引用这些类名，并知道不同类的显示效果即可。而bootstrap简单的理解即是一套类声明系统。
>亲身实践证明：看教程都是浪费时间的，直接看[实例](http://v3.bootcss.com/getting-started/#examples)记住各个class怎么用就好了，要不断的Ctrl+U/C/V

- 加入队伍功能目前可用，点击join后弹出一个对话框输入密码，还需要大家多多测试
- 找到一个不错的[jquery教程](http://www.gbtags.com/technology/jquerytutorial/)，供大家参考
- 传递函数参数的方式和教科书中有所不同，例如team/join-team/team-id，其中team为controller类名，join-team为函数名，team-id为该函数的第一个参数，依次类推如果team-id还有之后‘/’的话则为该函数第二个参数，第三个参数...

#### 8-17 by neil
- 修改了sql的创建语句，使得其更为合理
- 基本完成了message model,controller和views也写了一部分

#### 8-13 by ricky
- 显示队伍列表功能可用，如果谁有时间把显示用户列表写了吧
- 加入队伍难点在于密码验证...有两种实现方法：1. jquery模式对话框输入密码完成验证 2. 进入一个崭新的页面；两个都有难度，一会儿再来写

#### 8-12 by ricky
- 创建队伍功能目前可用，but创建同时修改users的信息还有bug，时间有限明天再说
- 每个php文件头都要输入‘<?php’，BUT文件尾不要输入‘?>’
- 调试的过程中发现自己写的代码中还是有很多错误的，比如array('user_id'=>$user_id)少打一个‘>’，大括号不完整等等...
- 很多bug其实都是由于数据库没有做及时更新

#### 8-10 by ricky
- 写完了组队的基本model，目前共4个函数，具体的功能参考注释；有一些函数是有参数的，需要注意一下。
- 登陆后的用户界面为dashboard，向该页面中新增了两个按钮：创建队伍，显示所有队伍；
- 修改了一下controller/home/index的内容，给它增加了一个参数

#### 8-5 by  ricky
- 注册功能：需要输入的信息有 __ 姓名、昵称、密码、邮箱、真实姓名、电话 __ 和 __ 班级__ 。
密码需要重复两次输入，用password_hash（）函数处理后存在数据库中。
- 登陆功能：输入昵称或者邮箱完成登陆，支持记住密码（cookie保存两周），暂时没有写找回密码功能。重复输错密码3次会有提示30秒后再输。
有一个bug，就是如果不关浏览器的话就算不点记住我，每次打开页面也会自动登陆...应该是SESSION没有及时清理的缘故。

组队功能正在写，刚刚简单写了一下创建队伍的model。这周争取把大部分model搞定。

#### 7-30  by ricky
继续编写model,可能是编辑器的原因代码缩进有些混乱。基本完成login/register的model。

#### 7-26  by ricky
正式开始动工。
没有自己搭建mvc框架，在github上找到了一个还不错的模板[php-mvc](https://github.com/panique/php-mvc)。
在它的基础上做了一些小改动，只保留了最主要的部分。
clone之前建议先看一下原地址中的[README](https://github.com/panique/php-mvc/blob/master/README.md)，里面有使用说明(需要开启apache的mod_rewrite)，还有对mvc概念很清晰的介绍。

目前基本还没有开始编写工作，简单了写了一点登陆和注册的内容。














