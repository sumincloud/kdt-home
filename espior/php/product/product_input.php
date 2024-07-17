<?php
  include('../../db/dbconn.php');
?>

<!doctype html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>상품등록</title>
  <!-- 부트스트랩 CSS 연결 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 부트스트랩 JS 연결 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <!-- 관리자 헤더삽입 -->
  <?php include('./admin_header.php')?>

  <main class="container m-5">
    <section>
      <h2>상품 등록</h2>
      <form action="./product_input_db.php" method="post" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-6">
          <label for="name" class="form-label">상품명</label>
          <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="cate" class="form-label">카테고리</label>
          <select name="cate" id="cate" class="form-select">
            <option value="">선택하세요.</option>
            <option value="cate01">Karina's PICK</option>
            <option value="cate02">FACE</option>
            <option value="cate03">LIP</option>
            <option value="cate04">EYE</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="price" class="form-label">상품가격</label>
          <div class="input-group">
            <input type="text" id="price" name="price" class="form-control" aria-label="원">
            <span class="input-group-text">원</span>
          </div>
        </div>
        <div class="col-md-6">
          <label for="myfile" class="form-label">상품사진</label>
          <input type="file" name="myfile" class="form-control">
        </div>
        <div class="col-12">
          <label for="parent" class="form-label">상품요약설명</label>
          <textarea name="parent" id="parent" class="form-control" rows="5"></textarea>
        </div>
        <div class="col-12">
          <label for="comment" class="form-label">설명</label>
          <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
        </div>
        <div class="col-md-6">
          <label for="memo" class="form-label">메모</label>
          <input type="text" id="memo" name="memo" class="form-control">
        </div>
        
        <div class="col-12">
        <input type="button" value="관리자 홈" class="btn btn-secondary" onclick="goToAdminPage()">
          <input type="submit" name="action" value="등록하기" class="btn btn-primary">
        </div>
      </form>
    </section>
  </main>


  <!-- 관리자 푸터삽입 -->
  <?php include('./admin_footer.php')?>




  <script>
    // 가격에 자동으로 쉼표 추가하기
    document.getElementById('price').addEventListener('input', function (e) {
      let value = e.target.value;
      value = value.replace(/,/g, ''); // 기존 쉼표 제거
      value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // 새로 쉼표 추가
      e.target.value = value;
    });

    //관리자페이지로 이동버튼
    function goToAdminPage() {
      window.location.href = './admin.php';
    }
  </script>
</body>
</html>
