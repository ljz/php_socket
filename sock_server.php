<?
//设置一些基本变量分别保存服务器的ip和sort
$address = "172.31.159.21";
$port = "65533";
//设置超时时间,确保在连接时客户端不会超时
set_time_limit(0);
//创建一个socket ，返回一个socket句柄
$socket = socket_create(AF_INET,SOCKET_STREAM,0) or die("socket_create() 失败的原因是: ".socket_strerror(socke_last_error())."\n");
//阻塞模式
socket_set_block($socket)or die("socket_set_block()失败的原因是:".socket_last_error(socket_last_error())."\n");
//绑定socket到指定的地址和端口
$result = socket_bind($socket,$address,$port)or die("Could not blind to socket \n");
//开始监听外部链接
$result = socket_listen($socket,3)or die("Could not set up socket listener \n");

do{
//接受请求链接
//调用socket_accept处理信息
$msgsock = socket_accept($socket)or die("Could not accept incoming connection\n");
echo "Read client data \n";
//获得客户端的输入,该函数会一直读取客户端数据，直到遇见 \n,\t或\0字符
$input = socket_read($msgsock,1024)or die("Could not read input\n");
echo "Received msg:$input \n";

$output = strrev("Welcome".$input)."\n";
socket_write($msgsock,$output,strlen($output)) or die("Could not write output\n");
socket_close($spawn);
}while(true)
socket_close($socket);
?>
