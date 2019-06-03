<?php
//栈  FILO
$stack = new SplStack();
$stack->push("data1\n"); //入栈
$stack->push("data2\n");//入栈
echo $stack->pop(); //出栈
echo $stack->pop();//出栈

//队列 FIFO
$queue = new SplQueue();
$queue->enqueue("queue1\n");//入队
$queue->enqueue("queue2\n");//入队
echo $queue->dequeue();//出队
echo $queue->dequeue();//出队

//堆
$heap = new  SplMinHeap();//最小堆
$heap->insert("heap1\n");//入
$heap->insert("heap2\n");//入
echo $heap->extract();//出
echo $heap->extract();//出

//固定长度数组
$array = new SplFixedArray(10);
$array[0] = 123;
$array[9] = 321;
$array[10] = "test";//out of range
var_dump($array);