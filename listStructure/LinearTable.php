<?php
namespace listStructure;
/**
 * 顺序结构的线性表
 * Created by PhpStorm.
 * User: zhangpf01
 * Date: 2018/3/7
 * Time: 10:37
 */
class LinearTable
{
    /**
     * @var int $length 线性表的长度
     */
    private $length;

    /**
     * @var array $data 线性表数据
     */
    private $data = [];

    /**
     * @var int $maxSize 线性表最大存储空间
     */
    private $maxSize;

    /**
     * @return int
     */
    public function getMaxSize()
    {
        return $this->maxSize;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * LinearTable constructor.
     * @param int $maxSize
     */
    public function __construct($maxSize = 10)
    {
        $this->maxSize = $maxSize;
        $this->length = 0;
    }

    /**
     * 获取元素 O(1)
     * @param int $index
     * @return bool|mixed
     */
    public function getElem($index)
    {
        if(0 === $this->length || $index < 1 || $index > $this->length || !isset($this->data[$index-1])) {
            return false;
        }
        return $this->data[$index-1];
    }

    /**
     * 是否存在元素 O(n)
     * @param $checkData
     * @return int
     */
    public function existElem($checkData)
    {
        if ($this->length === 0){
            return 0;
        }
        for ( $t = $this->length; $t > 0; $t -- ) {
            if ($this->data[$t-1] === $checkData){
                return $t;
            }
        }
        return 0;
    }

    /**
     * 插入元素 O(n)
     * @param $data
     * @param $index
     * @return bool
     */
    public function insert($data, $index)
    {
        if ($this->length >= $this->maxSize || $index < 1 || $index >$this->length+1 || empty($data)){
            return false;
        }
        if ($index <= $this->length){
            for ( $t = $this->length; $t >= $index; $t -- ){
                $this->data[$t] = $this->data[$t-1];
            }
        }
        $this->data[$index-1] = $data;
        $this->length++;
        return true;
    }

    /**
     * 删除元素 O(n)
     * @param $index
     * @return bool|mixed
     */
    public function delete($index)
    {
        if ($this->length < 0 || $index < 1 || $index > $this->length){
            return false;
        }
        $value = $this->data[$index-1];
        if ($index < $this->length) {
            for ( $t = $index; $t < $this->length; $t ++ ){
                $this->data[$t-1] = $this->data[$t];
            }
        }
        unset($this->data[$this->length]);
        $this->length--;
        return $value;
    }

    /**
     * 最右边插入元素 O(1)
     * @param $data
     * @return bool
     */
    public function rightInsert($data)
    {
        $this->data[$this->length] = $data;
        $this->length++;
        return true;
    }

    /**
     * 清除线性表 O(1)
     * @return bool
     */
    public function clear()
    {
        $this->data = [];
        $this->length = 0;
        return true;
    }

    /**
     * 遍历线性表
     */
    public function listTraverse()
    {
        for ( $t = 0; $t < $this->length; $t ++){
            echo $t+1 . "=>" . $this->data[$t];
            echo "\n";
        }
    }
}