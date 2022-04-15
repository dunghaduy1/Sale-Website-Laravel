 // 1 image
 $('#modalImage').on('hide.bs.modal',function(){
      // Lấy value của input có id = image
      var image = $('#image').val();
      $('#img').attr('src',image);
    });
    // Many image
    $('#modalImages').on('hide.bs.modal',function(){
      // Lấy value của input có id = images
      var images = $('#images').val();
      // console.log('Chuối images'+images);
      var a= images.indexOf("[");
      // console.log('tìm kiếm'+a);
      if (a==-1){
       var _html='';
       _html+='<div class="col-md-3"><div class="card text-center">';
       _html+='<img class="card-img-top imgs" src='+images+'>';
       _html+='</div></div>';
       $('.anh-nhieu').html(_html);
     }
     else{
      var imgList= $.parseJSON(images);
      // console.log(imgList);
      var _html='';
      imgList.forEach( function(element, index) {
        _html+='<div class="col-md-3"><div class="card text-center">';
        _html+='<img class="card-img-top imgs" src='+element+'>';
        _html+='</div></div>';
      });
      $('.anh-nhieu').html(_html);
    }

  });
     // <!-- Get value Image product -->