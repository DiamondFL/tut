var getNode = function(s){
        return document.querySelector(s);
    },
//=========================Lấy dữ liệu=============================
    chatStatus = getNode('.chat-status span'),
//chatMessage = getNode('.chatting textarea'),
//chatMessage = getNode('.chatting textarea'),
    chatMessage = getNode('#chatText'),
    chatName = getNode('.chat-name'),
    Messages = getNode('.chat-messages');console.log(Messages);

statusDefault = chatStatus.textContent,

    setStatus = function(s){
        chatStatus.textContent = s;
        if(s!==statusDefault){}
        var delay = setTimeout(function(){
            setStatus(statusDefault);
            clearInterval(delay);
        },3000);
    };
//=========================kết nối=================================
try{
    var socket = io.connect('http://127.0.0.1:8080');
}catch(e){
    //Set status to warn user
}

if(socket !== undefined){
    //=============================Lăng nghe từ output=================
    socket.on('output', function(data){
        console.log(data);
        if(data.length){
            Messages.textContent=""
            //loop through results
            for(var i=0 ; i < data.length ; i = i +1){
                var Message = document.createElement('div');

                Message.setAttribute('class','chat-message');
                Message.textContent = data[i].name + ' : '+ data[i].message;
                //Append
                Messages.appendChild(Message);
                Messages.insertBefore(Message, Messages.firstChild);
            }
        }else{
            for(var i = 0 ; i < data.length ; i = i +1){
                var Message = document.createElement('div');

                Message.setAttribute('class','chat-message');
                Message.textContent = data[i].name + ' : '+ data[i].message;
                //Append
                Messages.appendChild(Message);
                Messages.insertBefore(Message, Messages.firstChild);
            }
        }
    });
    socket.on('output_you', function(data){
        var Message = document.createElement('div');

        Message.setAttribute('class','chat-message');
        Message.textContent = data[0].name + ' : '+ data[0].message;
        //Append
        Messages.appendChild(Message);
        Messages.insertBefore(Message, Messages.lastChild);
        // }
    });
    socket.on('output_me', function(data){
        var Message = document.createElement('div');

        Message.setAttribute('class','chat-message');
        Message.textContent = data[0].name + ' : '+ data[0].message;
        //Append
        Messages.appendChild(Message);
        Messages.insertBefore(Message, Messages.lastChild);
        //}
    });
    //=============================lắng nghe status====================
    socket.on('status',function(data){
        setStatus((typeof data ==='object') ? data.message : data);

        if(data.clear === true){
            chatMessage.value ='';
        }
    });

    //Listen for keydown
    chatMessage.addEventListener('keydown',function(event){
        var self = this,
            name = chatName.value;
        //============================ Gửi In put tới sever==========
        if(event.which===13 && event.shiftKey===false){
            socket.emit('input',{
                name: name,
                message: self.value
            });
            event.preventDefault();
        }
    });
}
