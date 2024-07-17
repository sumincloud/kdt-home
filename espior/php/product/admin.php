<?php
  include('../../db/dbconn.php');
  
  // 세션 시작
  session_start();
  
  // 사용자가 로그인한 경우, 세션에서 가져옴
  if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
    
    // 관리자 아이디가 아닌 경우
    if ($userid != 'admin' && $userid != null) {
      echo '<script>alert("관리자 로그인이 필요합니다.");</script>';
      echo '<script>window.location.href = "./login.php";</script>';
      exit; // 이후 코드 실행을 막기 위해 exit 사용
    }
  } else {
    // 로그인되지 않은 경우 로그인 페이지로 이동
    echo '<script>alert("관리자 로그인이 필요합니다.");</script>';
    echo '<script>window.location.href = "./login.php";</script>';
    exit; // 이후 코드 실행을 막기 위해 exit 사용
  }
?>

<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>관리자 홈</title>
    <!-- 부트스트랩 CSS 연결 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 부트스트랩 JS 연결 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <!-- 관리자 헤더삽입 -->
    <?php include('./admin_header.php')?>

    <main class="container my-5">
      <div class="text-center mb-4">
        <a href="./index.php" title="에스쁘아 홈페이지로">
          <img src="../../images/logo_b.png" alt="로고이미지" class="img-fluid" style="max-width: 200px;">
        </a>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">상품등록</h5>
              <p class="card-text">새로운 상품을 등록합니다.</p>
              <a href="./product_input.php" class="btn btn-primary">상품등록</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">상품목록</h5>
              <p class="card-text">등록된 상품들의 목록을 확인합니다.</p>
              <a href="./product_list.php" class="btn btn-primary">상품목록</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="card-title">분류관리</h5>
              <p class="card-text">상품 분류를 관리합니다.</p>
              <a href="#" class="btn btn-primary">분류관리</a>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- 관리자 푸터삽입 -->
    <?php include('./admin_footer.php')?>


  </body>
</html>
