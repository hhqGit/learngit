<?php
/**
 * Created by PhpStorm.
 * User: zhujunlong
 * Date: 2018/12/4
 * Time: 14:26
 * 使用php基于类的方式实现mysql的增删改查
 */
class sqlClass{
    private $host;      //服务器地址
    private $username;      //用户名
    private $password;  //密码
    private $database;//数据库名
    private $conn;     //连接标识符

    function __construct($host,$user,$password,$database)
    {
        $this->host = $host;
        $this->username = $user;
        $this->password = $password;
        $this->database= $database;
        $this->connect();
    }
    //关闭数据库连接
    function close(){
        mysqli_close($this->conn);
    }

    //数据库连接
    function connect()
    {
        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->database);
    }
    //query语句重写
    function query($sql)
    {
        return mysqli_query($this->conn,$sql);
    }

    //mysqli_fetch_array重写;
    function sql_array($result)
    {
        return mysqli_fetch_array($result);
    }

    //mysqli_num_rows重写
    function rows($result){
        return mysqli_num_rows($result);
    }

    /*增加
     * $table_name 表名
     *$cols 列名
     *$value 值
     *insert('table','(user,pass)','("user1","123")')
     */
    function  insert($table_name,$fields,$value){
        $this->query("INSERT INTO $table_name $fields VALUES $value");
    }

    /*
     * 删除
     * $where 条件
     * delete('table','user="123"')
     * */
    function delete($table_name,$where){
        $this->query("delete from $table_name where $where");
    }

    /*更新
    *$change 修改值
    *$where 条件
     * updata('table','pass="321"','user="user1"')
    */
    function updata($table_name,$change,$where){
        $this->query("update $table_name set $change where $where");
    }

    /*
     * 查询
     * $close 查询列
     * $where 条件 可为空
     * select('table','user','where user="user1"') 有条件查询则必须添加where关键字
     */
    function select($table_name,$cols,$where=""){
        return $this->query("select $cols from $table_name $where");
    }
}


class shengwu{
    public $life;
    public function test(){

    }
}

class dongwu extends shengwu{

}

$db=new sqlClass('127.0.0.1','root','123','database');

修改值   再次修改
版本1.0
版本2.0