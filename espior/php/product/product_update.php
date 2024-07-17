<?php
  include('../../db/dbconn.php');

  $no = $_GET['no'];

  // 해당 게시글 불러오기
  $sql = "SELECT * FROM shop_data WHERE no='$no'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
?>

<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>상품수정</title>
  <!-- 부트스트랩 CSS 연결 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 부트스트랩 JS 연결 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <!-- 관리자 헤더삽입 -->
  <?php include('./admin_header.php')?>

  <main class="container my-5">
    <section>
      <h2 class="text-center mb-4">상품수정</h2>
      <form action="./product_update_db.php?no=<?php echo $no; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">상품명</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="cate" class="col-sm-2 col-form-label">카테고리</label>
          <div class="col-sm-10">
            <select class="form-select" name="cate" id="cate">
              <option value="">선택하세요.</option>
              <option value="cate01" <?php echo $row['cate'] == 'cate01' ? 'selected' : ''; ?>>함께하는 공간</option>
              <option value="cate02" <?php echo $row['cate'] == 'cate02' ? 'selected' : ''; ?>>함께하는 외출</option>
              <option value="cate03" <?php echo $row['cate'] == 'cate03' ? 'selected' : ''; ?>>함께하는 목욕</option>
              <option value="cate04" <?php echo $row['cate'] == 'cate04' ? 'selected' : ''; ?>>건강한 간식</option>
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="price" class="col-sm-2 col-form-label">상품가격</label>
          <div class="col-sm-10">
            <div class="input-group">
              <input type="text" class="form-control" id="price" name="price" value="<?php echo number_format($row['price']); ?>">
              <span class="input-group-text">원</span>
            </div>
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">현재 상품사진</label>
          <div class="col-sm-10">
            <img src="../../images/shop/<?php echo $row['img']; ?>" alt="현재 상품 이미지" style="max-width: 100px;">
          </div>
        </div>
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label">상품사진변경</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="myfile">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="parent" class="col-sm-2 col-form-label">상품요약설명</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="parent" id="parent" cols="30" rows="5"><?php echo $row['parent']; ?></textarea>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="comment" class="col-sm-2 col-form-label">설명</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="comment" id="comment" cols="30" rows="5"><?php echo $row['comment']; ?></textarea>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="memo" class="col-sm-2 col-form-label">메모</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="memo" name="memo" value="<?php echo $row['memo']; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-10 offset-sm-2">
            <button type="reset" class="btn btn-secondary">초기화</button>
            <button type="submit" class="btn btn-primary" name="action" value="수정하기">수정하기</button>
          </div>
        </div>
      </form>
    </section>
  </main>

  <!-- 관리자 푸터삽입 -->
  <?php include('./admin_footer.php')?>

  <script>
    // 자동으로 가격에 쉼표 찍히게
    document.getElementById('price').addEventListener('input', function (e) {
      let value = e.target.value;
      value = value.replace(/,/g, ''); // 기존 쉼표 제거
      value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ','); // 새로 쉼표 추가
      e.target.value = value;
    });
  </script>

</body>
</html>
