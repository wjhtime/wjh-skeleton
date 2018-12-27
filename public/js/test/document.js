
var test_document = function () {
    //修改节点
    div = document.getElementById('div');
    div.innerText = '白痴哈哈哈';
    div.style.color = '#ff0000';
    div.style.fontSize = '20px';

    //移动节点，将div移动到ul末尾
    tag = document.getElementsByTagName('li');
    last = tag[tag.length-2];
    baichi = document.getElementById('div');
    ul = document.getElementById('ul');
    // ul.appendChild(baichi);

    //创建新节点，在ul中
    li = document.createElement('li');
    li.innerText = '末尾节点';
    ul.appendChild(li);

    //在指定位置前插入节点
    c = document.getElementById('c');
    li2 = document.createElement('li');
    li2.innerText = 'c前节点';
    ul.insertBefore(li2, c);

    //冒泡排序，字符串由小到大排序
    ol = document.getElementById('reorder');
    list = ol.getElementsByTagName('li');
    for (i=0; i<list.length; i++) {
        for (j=i+1; j<list.length; j++){
            if (list[i].innerText > list[j].innerText){
                ol.insertBefore(list[j], list[i]);
            }
        }
    }

    //删除指定节点外的内容
    remove_ul = document.getElementById('remove');
    remove_li = remove_ul.children;
    arr = ['JavaScript', 'HTML', 'CSS'];
    for (i=0;i<remove_li.length;i++){
        if (arr.indexOf(remove_li[i].innerText)<0)
        {
            remove_ul.removeChild(remove_li[i]);
        }
    }

};

//表单验证
var checkRegisterForm = function () {
    var username = document.getElementById('username');
    username_check = /^[a-zA-Z0-9]{3,10}$/.test(username.value);
    if (username_check === false) {
        alert('用户名格式错误');
        return false;
    }

    var password = document.getElementById('password');
    password_check = /^.{6,20}$/.test(password.value);
    if (password_check === false) {
        alert('密码格式错误');
        return false;
    }

    var password2 = document.getElementById('password-2');
    if (password2.value !== password.value){
        alert('两次密码不相同');
        return false;
    }

    return true;
};



// test_document();

//ajax，跨域，没有返回结果
test_ajax = function () {
    request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.status == 200){
            console.log(request.responseText)
        }
        // alert('相应状态码：'+request.status)
    };

    request.open('GET', 'http://www.sina.com.cn');
    request.send();
};

test_ajax();


test_setInterval = function () {
    setInterval(function () {
        var date = new Date();
        log(date.getTime())
    }, 1000);
};


// console.log(document.onload)
