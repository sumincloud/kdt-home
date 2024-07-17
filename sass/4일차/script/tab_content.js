
//1. 변수선언
let tab_list = document.querySelectorAll('.tab_con li a');
let photo = document.getElementById('photo');

//2. 메뉴 클릭시 href속성값 변수에 저장
for(let i=0;i<tab_list.length;i++){
  tab_list[i].addEventListener('click',function(e){
    e.preventDefault();
    console.log(tab_list[i]);


    //선택한 a태그에 active 클래스 추가
    this.classList.add('active');
    // 선택 안된 a태그에는 active 제거
    tab_list.forEach(tab => {
      if (tab !== this) {
        tab.classList.remove('active');
      }
    });

    //3. 변수에 저장된 값을 photo src속성에 대입하여 사진을 변경한다.
    let imgSrc = this.getAttribute('href'); // 클릭한 링크의 href 값 가져오기
    photo.src = `./images/${imgSrc}`; // 이미지 변경
  });
}
