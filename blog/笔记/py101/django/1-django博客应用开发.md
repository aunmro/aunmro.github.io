# Django 博客开发

## TODO 1. 安装 Django

> *如果已经安装了Django，可以直接跳至下一节。*

Django 2.0+ 需要 Python 的版本为3.4或更高。

### 1.1 安装虚拟环境

## 2. 使用 Django 创建项目

在命令行模式中输入：`django-admin startproject mysite`。这会创建一个项目，名称叫做 mysite 。

* django-admin 是安装 django 后附带的命令行工具，帮助我们生成各种文件、运行服务器等。

---

看一下项目目录的结构：

```shell
mysite/
  manage.py
  mysite/
    __init__.py
    settings.py
    urls.py
    wsgi.py
```

