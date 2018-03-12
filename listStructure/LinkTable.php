<?php
/**
 * 链式结构的线性表（单链表）
 * Created by PhpStorm.
 * User: zhangpf01
 * Date: 2018/3/8
 * Time: 10:33
 */

namespace listStructure;


class LinkTable
{
    /**
     * 头节点数据为链表长度 默认长度为0
     * @var $head Node 头节点
     */
    private $head;

    /**
     * LinkTable constructor.
     */
    public function __construct()
    {
        // 构建头结点
        $this->head = new Node(0);
    }

    /**
     * 获取链表长度
     * @return int
     */
    public function getLength()
    {
        // 头结点数据是链表长度
        return $this->head->getData();
    }

    /**
     * 获取链表元素 O(n)
     * @param int $index
     * @return mixed
     */
    public function getElem($index)
    {
        $node = $this->getNodeByIndex($index);
        return ( $node instanceof Node ) ? $node->getData() : null;
    }

    /**
     * 通过下标 插入链表 O(n)
     * @param $data
     * @param $index
     * @return bool
     */
    public function insertByIndex($data,$index)
    {
        $insertNode = new Node($data);
        $node = $this->getNodeByIndex($index-1);
        if ( ! ( $node instanceof Node ) ) {
            return false;
        }
        $insertNode->setNext($node->getNext());
        $node->setNext($insertNode);
        $this->changeLength(true);
        return true;
    }

    /**
     * 链表头插 O(1)
     * @param $data
     * @return bool
     */
    public function insertOfHead($data)
    {
        $insertNode = new Node($data);
        $insertNode->setNext($this->head->getNext());
        $this->head->setNext($insertNode);
        $this->changeLength(true);
        return true;
    }

    /**
     * 链表尾插 O(n)
     * @param $data
     * @return bool
     */
    public function insertOfTail($data)
    {
        $insertNode = new Node($data);
        $node = $this->getNodeByIndex($this->getLength());
        if ( ! ( $node instanceof Node ) ) {
            return false;
        }
        $node->setNext($insertNode);
        $this->changeLength(true);
        return true;
    }

    /**
     * 删除元素 O(n)
     * @param $index
     * @return bool
     */
    public function delete($index)
    {
        $beforeDeleteNode = $this->getNodeByIndex($index-1);
        if ( ! ( $beforeDeleteNode instanceof Node ) ) {
            return false;
        }
        $deleteNode = $beforeDeleteNode->getNext();
        if ( ! ( $deleteNode instanceof Node ) ) {
            return false;
        }
        $beforeDeleteNode->setNext($deleteNode->getNext());
        unset($deleteNode);
        $this->changeLength(false);
        return true;
    }

    /**
     * 清除链表 O(1)
     * @return bool
     */
    public function clear()
    {
        $this->head->setNext(null);
        $this->head->setData(0);
        return true;
    }

    /**
     * 是否存在元素 O(n)
     * @param mixed $checkData
     * @return int $index
     */
    public function existElem($checkData)
    {
        $index = 0;
        $currentNode = $this->head;
        if ( !($this->getLength() === 0) ) {
            for ( $pos = 1; $pos <= $this->getLength(); $pos ++ ) {
                $currentNode = $currentNode->getNext();
                if ( ! ( $currentNode instanceof Node ) ) {
                    break;
                }
                if ( $currentNode->getData() === $checkData ) {
                    $index = $pos;
                    break;
                }
            }
        }
        return $index;
    }

    /**
     * 遍历单链表
     */
    public function listTraverse()
    {
        $currentNode = $this->head;
        for ( $pos = 1; $pos <= $this->getLength(); $pos ++){
            $currentNode = $currentNode->getNext();
            if (! ( $currentNode instanceof Node ) ) {
                break;
            }
            echo "node" . $pos . " : " . $currentNode->getData() ;
            echo "\n";
        }
    }

    /**
     * 通过下标获取指定节点 O(n)
     * @param $index
     * @return Node|null
     */
    private function getNodeByIndex($index)
    {
        if( $index < 0 || $index > $this->getLength() ) {
            return null;
        }
        $currentNode = $this->head;
        for ( $pos = 1; $pos <= $index; $pos ++ ) {
            $currentNode = $currentNode->getNext();
            if (null === $currentNode) {
                return null;
            }
        }
        return $currentNode;
    }

    /**
     * 改变链表长度 O(1)
     * @param bool $isAdd
     */
    private function changeLength( $isAdd = true )
    {
        $length = $this->getLength();
        if ($isAdd) {
            $length ++;
        } else {
            if ($length >= 1) {
                $length --;
            }
        }
        $this->head->setData($length);
    }

}