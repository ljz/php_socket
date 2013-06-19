<?
//时间限制设置
set_time_limit(0);
$host = "172.0.0.1";
$port = "65533";
$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCO) or die("Could not create socket \n");
//建立一个Socket

$connection = socket_connetc($socket,$host,$port) or die ("Could not connet server \n");
//连接
socket_write($socket,"hello ,you are my world!") or die ("Write fialed \n");//数据传送，向服务器发送消息
while($buff = socket_read($socket,1024,PHP_NORMAL_READ)){
echo ("Response was :".$buff."\n");
}
socket_close($socket);
?>





