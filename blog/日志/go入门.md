# Go语言入门

Go 是一门编译型语言, 编译器将你写的代码编译为二进制格式, 输出为不同平台的程序。整个流程是：  

1. 使用文本编辑器创建 GO 代码
2. 编译 GO 代码
3. 得到可执行程序

## 安装 GO

### Windows

1. 从 https://golang.org/dl/ 下载 windows 版安装包
2. 安装好后运行以下命令

    ```shell
    mkdir %USERPROFILE%\go
    mkdir %USERPROFILE%\go\bin
    mkdir %USERPROFILE%\go\pkg
    mkdir %USERPROFILE%\go\src
    ```
3. 添加环境变量 GOPATH 值为 %USERPROFILE%\go
4. 完成后测试一下 `echo %GOPATH%`

### Linux

以 Ubuntu 为例

1. 通过包管理器安装

    ```shell
    sudo add-apt-repository ppa:longsleep/golang-backports
    sudo apt-get update
    sudo apt-get install golang-go
    ```

2. 创建相关目录

    ```shell
    mkdir $HOME/go
    mkdir $HOME/go/bin
    mkdir $HOME/go/pkg
    mkdir $HOME/go/src
    ```

3. 在 `.bashrc` 中添加 `export GOPATH=$HOME/go`
4. 如果你需要使用 github 还需要添加

    `makedir -p $GOPATH/src/github.com/{你的github用户名}`

### Hello World

1. `cd $GOPATH/src/github.com/{你的github用户名}`
2. `mkdir hello`
3. `cd hello`
4. 创建 `main.go` 文件

    ```go
    package main

    import (
	    "fmt"
    )

    func main() {
	    fmt.Println("hello World")
    }
    ```

5. 执行 `go build`
6. 生成执行文件 `hello` 或者 `hello.exe`

#### go run

开发时可以使用 `go run main.go`运行程序而不产生编译文件.

## 数据类型

GO 语言中每一个数据都有类型, 数字、字符串等等。