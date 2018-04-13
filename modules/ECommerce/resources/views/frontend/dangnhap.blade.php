@extends('frontend.outline')
@section('content')
	<div id ="all">
		<form >
			<table cellspacing="0" cellpadding="5" height="5%" width="50%" >
				<tr><td bgcolor="blue">
				<marquee border="2" width="480" height="30" align="right" > <font face="UVN Mang Tre" color="white" ><b> Website giới thiệu điện thoại di động </b></font> </marquee></td></tr>
			</table>
			<table cellspacing="0" cellpadding="5" height="" width="50%"  >
				<center>
				<tr><th colspan="2"><css1>  Đăng Nhập  </css1></th></tr>
				<tr>
					<td ><center><css2>Tên đăng nhập :</css2></center></td>
					<td><input type="text" placeholder ="Tên đăng nhập"></td>
				</tr>
				<tr>
					<td><center><css2>Mật khẩu :</css2></center></td>
					<td><input type="password" value="123456"></td>
				</tr>

				<tr>
					<td></td>
					<td>
						<input type="button" value="Đăng nhập">
						<input type="reset" value="Nhập lại">
					</td>

				</tr>
				<tr>
					<td > <a href="">Quên mật khẩu? </a></td>
				</tr>
				</center>
			</table>
			<p>
			<table cellspacing="0" cellpadding="5" height="5%" width="50%" >
				<td bgcolor="blue"><font face="UVN Mang Tre"  color="white" > ✪ Phát triển bởi admin và user </font></td></tr>
			</table>
		</form>
	</div>
@endsection
