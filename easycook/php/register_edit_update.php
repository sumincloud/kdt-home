<?php
  session_start(); // 세션 시작

  // 데이터베이스 연결
  include('./include/dbconn.php');

  // 사용자가 제출한 데이터
  $file = uniqid() . '_' . $_FILES['myfile']['name']; //파일이름 중복 방지
  $name = $_POST['name']; // 이름
  $id = $_POST['id']; // 아이디
  $password = $_POST['password']; // 비밀번호
  $phone = $_POST['phone']; // 전화번호
  $email = $_POST['email']; // 이메일(선택적)

  date_default_timezone_set('Asia/Seoul');
  $datetime = date('Y-m-d H:i:s', time());

  // 비밀번호 해시화 처리
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // 회원정보 업데이트
  $sql = "INSERT INTO register (name, id, password, phone, email, profile, datetime)
          VALUES ('$name', '$id', '$hashed_password', '$phone', '$email', '$profile_img', '$datetime')";

  // 기존 이미지 파일 경로 가져오기
  $sql_profile = "SELECT profile FROM register WHERE id = '$id'";
  $result_new_profile = mysqli_query($conn, $sql_profile);
  $row_new_profile = mysqli_fetch_assoc($result_new_profile);
  $profile = $row_new_profile['profile'];

    // 이미지 파일이 없을 경우 파일 업로드를 제외하고 업데이트
    if (empty($file)) {
      $sql = "UPDATE shop_data
              SET cate = '$cate',
                  name = '$name',
                  parent = '$parent',
                  price = '$price',
                  comment = '$comment',
                  memo = '$memo',
                  datetime = '$datetime'
              WHERE no = '$no'";
    } else {
      // 기존 파일 삭제
      if (!empty($existing_image)) {
        $existing_file_path = $folder . $existing_image;
        if (file_exists($existing_file_path)) {
          unlink($existing_file_path); // 파일 삭제
        }
      }
      //파일 업데이트
      $sql = "UPDATE shop_data
              SET cate = '$cate',
                  img = '$file',
                  name = '$name',
                  parent = '$parent',
                  price = '$price',
                  comment = '$comment',
                  memo = '$memo',
                  datetime = '$datetime'
              WHERE no = '$no'";
    }
  

    // 쿼리 실행 여부 확인
    if (mysqli_query($conn, $sql)) {
      // 강사코드 세션 변수 삭제
      unset($_SESSION['teacher_code']);
      echo "<script>
              alert('회원가입이 완료되었습니다.');
              window.location.href = '../login.php';
            </script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // 데이터베이스 연결 종료
    mysqli_close($conn);









?>