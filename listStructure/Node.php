<?php
/**
 * Created by PhpStorm.
 * User: zhangpf01
 * Date: 2018/3/8
 * Time: 10:25
 */

namespace listStructure;


class Node
{
    /**
     * @var $data mixed 节点数据
     */
    private $data;

    /**
     * @var $next Node 下一节点指针
     */
    private $next;

    /**
     * Node constructor.
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return Node
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param Node $next
     */
    public function setNext($next)
    {
        $this->next = $next;
    }

}