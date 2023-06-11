<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>



<!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
        background-image: url('https://img.freepik.com/free-photo/beautiful-shot-sea-with-mountain-distance-clear-sky_181624-2248.jpg?w=2000');
        height: 300px;
        "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong container" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
        <div class="card-body py-5 px-md-5 ">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">

                    <form method="post" id="form1" action="">
                        <h2>ĐĂNG KÝ</h2>
                        @csrf
                        <!-- Name input -->
                        <p>
                            <label>Họ và tên</label><br>
                            <input required type="text" id="hoten" class="txt" name="name">
                        </p>
                        <p>
                            <label>Tên đăng nhập</label><br>
                            <input required type="text" id="tdn" class="txt" name="username">
                        </p>
                        <p>
                            <label>Mật khẩu</label><br>
                            <input required type="password" id="mk" class="txt" name="password">
                        </p>
                        <p>
                            <label>Nhập lại mật khẩu</label><br>
                            <input required type="password" id="mknl" class="txt">
                        </p>
                        <p>
                            <label>Email</label><br>
                            <input required type="email" id="email" class="txt" name="email">
                        </p>

                        <fieldset id="fs1">
                            <legend>Giới tính</legend>
                            <input required type="radio" name="gioitinh" value="Nam">
                            <label>Nam </label>
                            <input required type="radio" name="gioitinh" value="Nu">
                            <label>Nữ </label>
                        </fieldset>
                        <fieldset id="fs2">
                            <legend>Sở thích</legend>
                            <input required type="radio" name="sothich" value="Chơi game"> <label>Chơi game</label>
                            <input required type="radio" name="sothich" value="Mua sắm"> <label>Mua sắm</label>
                            <input required type="radio" name="sothich" value="Du lịch"> <label>Du lịch</label>
                            <input required type="radio" name="sothich" value="Khác"> <label>Khác</label>
                        </fieldset>
                        <p>
                            <label>Ngày sinh</label><br>
                            <input required type="date" name="dob" id="ns" class="txt">
                        </p>
                        <p>
                            <label>Địa chỉ</label><br>
                            <textarea class="txt" id="dc" cols="30" rows="3" name="address" required></textarea>
                        </p>

                        <div id="baoloi"></div>
                        <button type="submit" onclick="checkform()" id="dky">Đăng ký</button>
                        <button type="reset" id="rs">Reset</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif
        }

        #form1 {
            width: 400px;
            margin: auto;
            padding: 10px 40px;
            border: 1px solid black;
            background-color: rgb(227, 224, 220);
        }

        #form1 h2 {
            text-align: center;
        }

        #form1 .txt {
            width: 385px;
            padding: 6px;

            border: 1px solid rgb(73, 134, 166);
        }

        #form1 fieldset {
            margin-top: 15px;
            padding: 5px;
            border: 1px solid rgb(73, 134, 166);
        }

        #form1 #ns {
            width: 150px;
            height: 27px;
            border: 1px solid rgb(73, 134, 166);
            font-family: 'Times New Roman', Times, serif;
        }

        #form1 #dky {
            width: 100px;
            height: 40px;
            background-color: rgb(90, 90, 199);
            color: white;
        }

        #form1 #rs {
            width: 100px;
            height: 40px;
            background-color: rgb(90, 90, 199);
            color: white;
        }

        #form1 #baoloi {
            color: red;
        }

        #form1 .loi {
            border: 1px solid red;

        }
    </style>
</section>
<script>

document.querySelector('form').addEventListener('submit', function(event) {
  var fullName = document.querySelector('input[name="name"]').value;
  var username = document.querySelector('input[name="username"]').value;
  var password = document.querySelector('input[name="password"]').value;
  var gender = document.querySelector('input[name="gioitinh"]:checked');
  var email = document.querySelector('input[name="email"]').value;
  var dob = document.querySelector('input[name="dob"]').value;
  var address = document.querySelector('input[name="address"]').value;
  var interests = document.querySelectorAll('input[name="sothich"]:checked');

  if (fullName.trim() === '' || username.trim() === '' || password.trim() === '' || !gender || email.trim() === '' || dob.trim() === '' || address.trim() === '' || interests.length === 0) {
    event.preventDefault(); // Ngăn chặn việc submit form
    return false;

  }
  return true;
});
</script>