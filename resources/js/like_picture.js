$(function () {
var like = $('.js-like-toggle');
var likePictureId;

like.on('click', function () {
    var $this = $(this);
    likePictureId = $this.data('pictureid');
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/like_picture',  //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'picture_id': likePictureId //コントローラーに渡すパラメーター
            },
    })

        // Ajaxリクエストが成功した場合
        .done(function (data) {
//lovedクラスを追加
            $this.toggleClass('loved'); 

//.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
            $this.next('.likesCount').html(data.pictureLikesCount); 

        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
//ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
//とりあえず下記のように記述しておけばエラー内容が詳しくわる。
            console.log('エラー');
            console.log(err);
            console.log(xhr);
        });
    
    return false;
});
});