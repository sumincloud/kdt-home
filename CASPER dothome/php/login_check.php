<?php
  include('./db_conn.php'); //데이터베이스 연결

  $mb_id = trim($_POST['id_txt']); //login폼에서 전달받은 값을 변수에 저장한다.
  $mb_password = trim($_POST['pw_txt']); //login폼에서 전달받은 값을 변수에 저장한다.

  if(!$mb_id||!$mb_password){
    echo "<script>alert('아이디나 비밀번호가 공백이면 안됩니다.');</script>";
    echo "<script>location.replace('../login.php');</script>";

    exit;
  }

  //db에서 아이디, 패스워드를 조회하여 일치하는지 확인하고 로그인 성공하게끔 한다.
  $sql = "select * from member where mb_id = '$mb_id'";
  $result = mysqli_query($conn, $sql); //조회한 결과를 변수에 저장
  $mb = mysqli_fetch_assoc($result);

  //입력한 비밀번호를 MySQL password() 함수를 이용해서 암호화해서 가져옴
  //$sql = "select PASSWORD('$mb_password') AS pass"; //MySQL 4.1 ~ 5.7.5에서만 사용 가능.

  //****수정부분******
  $hashpassword = password_hash($mb_password, PASSWORD_DEFAULT); //MySQL 5.5 이상 사용 가능.

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $password = $row['pass'];

  //조건문을 활용하여 변수에 담긴 id, pw값이 일치하는지 여부를 확인하여 결과메세지 출력
  //if(!($mb['mb_id']) || !($password===$mb['mb_password'])){
    //echo "<script>alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.')</script>";
    //echo "<script>location.replace('../login.php');</script>";
    //exit; //종료
  //}


  // 비밀번호 검증  //****추가한 부분******
  if (password_verify($mb_password, $mb['mb_password'])) {
    // 로그인 성공
    session_start();
    $_SESSION['ss_mb_id'] = $mb_id;
    echo "<script>alert('로그인 성공');</script>";
    echo "<script>location.replace('./member_list.php');</script>";
  } else {
    // 비밀번호 불일치
    echo "<script>alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.')</script>";
    echo "<script>location.replace('../login.php');</script>";
  }



  
  //아이디, 패스워드 체크가 잘 이루어질 경우
  //$_SESSION['ss_mb_id']=$mb_id; //아이디, 패스워드 정보를 가지고 세션정보 생성함.

  mysqli_close($conn); //데이터베이스 접속종료

  //세션정보가 있다면 회원목록 페이지로 이동한다.
  //if(isset($_SESSION['ss_mb_id'])){
    //echo "<script>alert('로그인 성공');</script>";
   // echo "<script>location.replace('./member_list.php')</script>";
  //}


?>