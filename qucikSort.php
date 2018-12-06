<?php
/**
 * Created by PhpStorm.
 * User: zhujunlong
 * Date: 2018/12/4
 * Time: 14:07
 * 使用php写一个快速排序算法
 */

function quick($arr){
    if(!is_array($arr))
        return $arr;
    if(count($arr)>1){
        $key=$arr[0];
        $left=array();
        $right=array();
        $size=count($arr);
        for($i=1;$i<$size;$i++) {
            if($arr[$i]<=$key)
                $left[]=$arr[$i];
            else
                $right[]=$arr[$i];
        }
        $left=quick($left);
        $right=quick($right);
        return array_merge($left,array($key),$right);
    }
    else
        return $arr;
}
$arr1=array(10,41,32,45,33,56,2);
print_r(quick($arr1));