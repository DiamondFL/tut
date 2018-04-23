/**
 * Created by 0120 on 5/8/2015.
 */
var socket = io.connect('http://127.0.0.1:3000');
var $messageForm = $('#sendMessage');
var $messageBox = $('#message');
var $chat = $('#chat');
var $users = $('#users');
var $nickName = $('#nickName');
var $setNick = $('#setNick');
var $nickError = $('#nickError');

$('#logOut').hide();

$('#logOut').click(function(){
    socket.emit('log-out');
    $('#nickWrap').show();
    $('#contentWrap').hide();
    $('#logOut').hide();
    $('#myTab').html('');
    $('.tab-content').html('');
});
function chatPrivate(you){
    console.log(socket);
    var is=true;
    $.each($('.tab-pane'),function(){
        $(this).removeClass('active');
        var s = $(this).attr('id');
        if(s==you) {
            $(this).addClass('active');
            is = false;
        }
    });
    $.each($('#myTab li'),function(){
        $(this).removeClass('active');
        var s = $(this).children('a').attr('aria-controls');
        if(s==you) {
            $(this).addClass('active');
        }
    });
    if(is){
        var a = '<li role="presentation" class="active"><a href="#'+you+'" aria-controls="'+you+'" role="tab" data-toggle="tab">'+you+'</a></li>';
        var b = '<div role="tabpanel" class="tab-pane active" id="'+you+'">' +
                    '<div class="chatWrap" class="col-md-8">'+
                        '<div class="chat" id="chat'+you+'"></div>'+
                        '<div class="row">'+
                            '<form class="sendMessage col-lg-12">'+
                                '<div class="input-group">'+
                                    '<input type="text" class="form-control" class="message">'+
                                    '<span class="input-group-btn">'+
                                        '<button class="btn btn-default" type="button">Gửi</button>'+
                                    '</span>'+
                                '</div>'+
                            '</form>'+
                        '</div>'+
                    '</div>'+
                '</div>';
        $('#myTab').append(a);
        $('.tab-content').append(b);
    }
}
function getBaseURL() {
    var url = location.href;  // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));


    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href;  // window.location.href;
        var pathname = location.pathname;  // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }
}
jQuery(function(){
    $.session.set('b','thay');
    var a = $.session.get('b');
    $.ajax({
        url: getBaseURL() + 'public/us/get-session',
        cache: false,
        type: 'post',
        dataType: 'json',
        data: {session:'email'},
        success: function (datac) {
            //console.log(data);
            $nickName.val(datac);
            if($nickName.val()!='') {
                socket.emit('add-user',datac,function(data){
                    if(data){
                        $('#nickWrap').hide();
                        $('#contentWrap').show();
                        $('#logOut').show();
                    }else{
                        $nickError.html('Tài khoản đã có người sử dụng! Vui lòng thử lại.');
                    }
                    $nickName.val('');
                });
            }
            else $nickName.val('Tên tài khoản không được để trống!');
        }
    });

    //alert(a);
    /*$.get('/getUser',function(result){
        if(!result.err){
            $nickName.val(result.email);
            if($nickName.val()!='') {
                socket.emit('add-user',$nickName.val(),function(data){
                    if(data){
                        $('#nickWrap').hide();
                        $('#contentWrap').show();
                        $('#logOut').show();
                    }else{
                        $nickError.html('Tài khoản đã có người sử dụng! Vui lòng thử lại.');
                    }
                    $nickName.val('');
                });
            }
            else $nickName.val('Tên tài khoản không được để trống!');
        }
    });*/
    /*$setNick.submit(function(e){
        e.preventDefault();
        if($nickName.val()!='') {
            socket.emit('add-user',$nickName.val(),function(data){
                /!*---------------CallBack truy?n data v? ---------------*!/
                if(data){
                    $('#nickWrap').hide();
                    $('#contentWrap').show();
                    $('#logOut').show();
                }else{
                    $nickError.html('Tài khoản đã có người sử dụng! Vui lòng thử lại.');
                }
                $nickName.val('');
            });
        }
        else $nickName.val('Tên tài khoản không được để trống!');
    });*/

    $messageForm.submit(function(e){
        e.preventDefault();
        socket.emit('send-message',$messageBox.val(),function(data){
            $chat.append('<div class="row"><div class="col-md-10 bg-danger"><p><b>'+ data+'</b></p></div></div>');
        });
        $messageBox.val('');
    });

    function usersOnline(){
        socket.on('username-online',function(data){
            var html ='';
            for(i=0;i<data.length;i++){
                html +='<button onclick=chatPrivate("'+data[i]+'") class="btn btn-md btn-default btn-block">'+data[i]+'</button><br>';
            }
            $('#totallOnline').html(data.length);
            $users.html(html);
        });
    }

    socket.on('new-message', function(data){

        $chat.append('<div class="row"><div class="col-md-10 bg-info" style="margin-left: 5px"><p><b>'+ data.nick +': </b>'+ data.msg +'</p></div></div>');
    });
    socket.on('i-message', function(data){

        $('.chat'+data.nick).append('<div class="row"><div class="col-md-2"></div><div class="col-md-10 bg-primary"><p><b>'+ data.nick +': </b>'+ data.msg +'</p></div></div>');
        $chat.append('<div class="row"><div class="col-md-2"></div><div class="col-md-10 bg-primary"><p><b>'+ data.nick +': </b>'+ data.msg +'</p></div></div>');
    });
    socket.on('open-server',function(){
        $('#statusServer').html('Sever online')
        usersOnline();
    });

    /*$('#message').keydown(function(e){
        if(event.which===13 && event.shiftKey===false){
            $.ajax({
                url: getBaseURL()+'public/comment/insert-comment',
                cache:false,
                type:'post',
                dataType:'json',
                data: {userId:$('#commented').val(),comment:$('#commenter').val()},
                success: function(data) {
                    //alert(data);
                },
                error:function(){

                }
            });
            var comment = '<div class="media">'+
                '<div class="col-sm-1">'+
                '<img alt="No image" src=""  style="width: 64px; height: 64px;">'+
                '</div>'+
                '<div class="col-sm-10">'+
                '<h4>'+$('#commenter').val()+'</h4>'+
                $('#message').val()+
                '</div>'+
                '</div>';
            $(comment).prependTo('#contentComment');
            $('#message').val('');
        }
    });*/
    /***************Private*******************/
});
function setComment(userId, userName, oopId){
    if(event.which===13 && event.shiftKey===false){
        $.ajax({
            url: getBaseURL()+'public/comment/insert-comment',
            cache:false,
            type:'post',
            dataType:'json',
            data: {userId:userId, comment: $('#message').val(), oopId:oopId},
            success: function(data) {
                //alert(data);
            },
            error:function(){

            }
        });
        var comment = '<div class="media">'+
            '<div class="col-sm-1">'+
            '<img alt="No image" src=""  style="width: 64px; height: 64px;">'+
            '</div>'+
            '<div class="col-sm-10">'+
            '<h4>'+$('#commenter').val()+'</h4>'+
            $('#message').val()+
            '</div>'+
            '</div>';
        $(comment).prependTo('#contentComment');
        $('#message').val('');
    }
}