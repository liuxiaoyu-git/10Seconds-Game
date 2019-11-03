<!DOCTYPE html>
<html>
<head>
<style type="text/css">
#timetext  {
    border: 3px solid #006;
    width: 300px;
    font-size: 40px;
    text-align: center;
}
</style>
  <script>
    var second=0;//初始化
    var millisecond=0;//毫秒
    var int;
    function Reset()//重置
    {
      window.clearInterval(int);
      second=0;
      document.getElementById('timetext').value='-----';
    }
  
    function start()//开始
    {
      int=setInterval(timer,13);
    }
  
    function timer()//计时
    {
      millisecond=millisecond+13;
      if(millisecond>=1000)
      {
        millisecond=millisecond-1000;
        second=second+1;
      }
      
      document.getElementById('timetext').value=second+':'+(Array(3).join('0') + millisecond).slice(-3);
    }
  
    function stop()//暂停
    {
      window.clearInterval(int);
    }

  </script>
</head>
<body>
<form method=post action=10seconds_result.php>
  姓和名：<input name=username type="text"/><br>
  抽奖码：<input name=code type="text"/><br>
  <input type="text" id="timetext" name="result" value="-----" readonly/><br>
  <button type="button" onclick="start()">开始</button> 
  <button type="button" onclick="stop()">停止</button> 
  <button type="button" onclick="Reset()">重置</button>
  <button type="submit">提交</button> 
</form>
</body>
</html>
