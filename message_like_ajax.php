 <?php
include_once ("inc/conexao.php");
if(isSet($_POST['msg_id']) && isSet($_POST['rel']))
{
$msg_id=mysqli_real_escape_string($db,$_POST['msg_id']);
$rel=mysqli_real_escape_string($db,$_POST['rel']);
$uid=$session_uid; // User login session id
if($rel=='Like')
{
//---Like----
$q=mysqli_query($db,"SELECT like_id FROM message_like WHERE uid_fk='$uid' and msg_id_fk='$msg_id' ");
if(mysqli_num_rows($q)==0)
{
$query=mysqli_query($db,"INSERT INTO message_like (msg_id_fk,uid_fk) VALUES('$msg_id','$uid')");
$q=mysqli_query($db,"UPDATE messages SET like_count=like_count+1 WHERE msg_id='$msg_id'") ;
$g=mysqli_query($db,"SELECT like_count FROM messages WHERE msg_id='$msg_id'");
$d=mysqli_fetch_array($g,MYSQLI_ASSOC);
echo $d['like_count'];
}
}
else
{
//---Unlike----
$q=mysqli_query($db,"SELECT like_id FROM message_like WHERE uid_fk='$uid' and msg_id_fk='$msg_id' ");
if(mysqli_num_rows($q)>0)
{
$query=mysqli_query($db,"DELETE FROM message_like WHERE msg_id_fk='$msg_id' and uid_fk='$uid'");
$q=mysqli_query($db,"UPDATE messages SET like_count=like_count-1 WHERE msg_id='$msg_id'");
$g=mysqli_query($db,"SELECT like_count FROM messages WHERE msg_id='$msg_id'");
$d=mysqli_fetch_array($g,MYSQLI_ASSOC);
echo $d['like_count'];
}
}
}
?>