<h2 align="center" style="color:0000ff">微信公众注册平台</h2>

	<form action="{{url('index/regist_do')}}" method="post" enctype="multipart/form-data">
		 @csrf
		公司名：<input type="test" name="c_name"><br>
		法人：<input type="test" name="c_people"><br>
		公司地址：<input type="text" name="c_place"><br>
		营业执照照片：<input type="file" name="c_photo"><br>
		联系人电话：<input type="text" name="phone"><br>
		Email：<input type="text" name="email"><br>
		密码：<input type="password" name="pwd"><br>
		<input type="submit" value="注册">
	</form>