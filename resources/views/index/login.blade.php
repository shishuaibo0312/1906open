<h2 align="center" style="color:0000ff">微信公众登录平台</h2>

	<form action="{{url('index/login_do')}}" method="post">
		 @csrf
		账号登录：<input type="test" name="account" placeholder="手机号&邮箱"><br>
		密码：<input type="test" name="pwd"><br>
		
		<input type="submit" value="登录">
	</form>