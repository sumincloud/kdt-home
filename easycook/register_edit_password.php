<?php
  session_start(); // 세션 시작
?>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>이지쿡 회원수정</title>
  <!-- 공통 헤드정보 삽입 -->
  <?php include('./php/include/head.php'); ?>
  <style>
    section{
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 20px;
    }
    section h2{
      text-align: center;
      font-size: var(--fs-large);
      font-weight: var(--fw-bold);
      padding: 100px 0 50px 0;
    }
    form label{
      font-size: var(--fs-medium);
      font-weight: var(--fw-bold);
    }

  </style>
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./php/include/header_sub.php');?>

  <main>
    <section>
      <h2>본인 확인을 위해 비밀번호를 입력해 주세요.</h2>
      <form id="password_check" action="./php/register_edit_password_check.php" method="post">
        <div class="mb-2">
          <label for="password" class="form-label">비밀번호 확인</label>
          <input type="password" class="form-control" placeholder="비밀번호를 입력해주세요." id="password" name="password" required>
          <div class="invalid-feedback">
            비밀번호가 일치하지 않습니다.
          </div>
        </div>

        <!-- 버튼 형식 -->
        <div class="btn-box-l" style="margin-top: 100px;">
          <button type="submit" class="btn-l">다음</button>
          <button type="button" class="btn-l" onclick="history.back();">이전으로</button>
        </div>


        
      </form>



    </section>
    



  </main>
  <script>
    $(document).ready(function() {
      $('#password_check').submit(function(event) {
        event.preventDefault(); // 기본 제출 동작을 막음

        // 폼 데이터 직렬화
        let formData = $(this).serialize();

        // 서버로 데이터 전송
        $.post('./php/register_edit_password_check.php', formData)
          .done(function(response) {
            if (response.trim() === '비밀번호가 일치합니다.') {
              //회원수정 폼 이동
              window.location.href = './register_edit.php';
            } else {
              // 에러 메시지 표시
              $('#password').addClass('is-invalid');
            }
          })
          .fail(function() {
            // 실패 시 에러 처리
            console.log('요청 실패');
          });
      });
    });
  </script>

</body>
</html>