# 什么是线性表

多个数据元素组成的有限序列。如下图，每一个 $a_n$ 即是一个元素，所有元素组合起来即是一个线性表。

线性表具体代码有2种表示方式：顺序表和链表。

# 顺序表

顺序表通过 ** 数组** 来实现，一个顺序表包括

* 存储表中元素的数组 data[]
* 指示数组个数的 length
*  顺序表的索引从1开始

## 静态结构结构体

**不能进行扩展，表一旦装满了不能扩充**

```c
/*SqList: sequence list 顺序表*/
#define MAXSIZE 100

typedef int ElementType;  /* 顺序表的存储的数据类型，可以为其他类型 */

typedef struct {
    int length;
    ElementType data[MAXSIZE];
} SqList;
```

* `#define MAXSIZE 100` 定义顺序表的最大长度
* `int length` 顺序表的长度

### 初始化

```c
bool InitSqList(SqList* L) {
	/*数组重新在data[0]处开始存储*/
	L->length = 0;
	return true;
}
```

1. 此处需要 `include <stdbool.h>` 引入布尔标准库

## 动态结构体

**可以扩展**

```c
typedef struct {
	int length;
	int maxLength;
	ElementType* element;
} DynamicSqList;
```

* `ElementType* element;` 指针进行初始化，开辟一段连续的内存。但内存不够时再指向一段大的内存空间。
* 需要用 `malloc`分配动态顺序表
* `remalloc`再次分配内存
* `element`即是指针，又是数组名

### 初始化

```c
bool InitSqList(SqList *L) {
	//分配基本类型的MAXSIZE位
	L->element = (ElementType*)malloc(sizeof(ElementType) * MAXSIZE);
	if (!L->element) {
		return false;
	}
	else {
		L->length = 0;
		return true;
	}
}
```

## 插入元素

* 