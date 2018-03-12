<?php
/**
 * Created by PhpStorm.
 * User: zhangpf01
 * Date: 2018/3/7
 * Time: 14:15
 */
use listStructure\LinearTable;
use listStructure\LinkTable;

/*require_once ("LinearTable.php");

$linearTable = new LinearTable();
$linearTable->rightInsert("aaaa");
$linearTable->rightInsert("bbbb");
$linearTable->rightInsert("cccc");
$linearTable->insert("dddd",4);
$index = $linearTable->existElem("dddd");
if ($index){
    echo $linearTable->getElem($index) . "\n";
}
$linearTable->delete(4);

$linearTable->listTraverse();*/

require_once ("Node.php");
require_once ("LinkTable.php");

$linkTable = new LinkTable();

$linkTable->insertOfTail("a");
$linkTable->insertOfTail("b");
$linkTable->insertOfTail("c");
$linkTable->insertOfHead("d");
$linkTable->insertByIndex("e", 2);

$index = $linkTable->existElem("e");
if ($index) {
    $linkTable->delete($index);
}
//$linkTable->clear();
$linkTable->listTraverse();
