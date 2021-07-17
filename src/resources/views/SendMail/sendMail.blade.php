<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h1 class="card-title">Time Tracking</h1>
          <hr>
          <p class="card-text">Xin chào {{$name}}</p>
          <p class="card-text">Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu Time Tracking của bạn. 
          <br>
          Nhập mã đặt lại mật khẩu sau đây:</p>
          <table>
              <tbody>
                  <tr>
                      <td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;padding:14px 32px 14px 32px;background-color:#f2f2f2;border-left:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:center;border-radius:7px;display:block;border:1px solid #1877f2;background:#e7f3ff">
                        <span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">
                            <span style="font-size:17px;font-family:Roboto;font-weight:700;margin-left:0px;margin-right:0px">{{$code}}</span>
                        </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
</body>
</html>