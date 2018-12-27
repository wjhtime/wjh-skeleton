
var test_map = function () {
    var s = '13579';
    var res = s.split('').map(function (x, i) {
        return +x;
    }).reduce(function (p1, p2) {
        return p1 * 10 + p2;
    });

    console.log(res);
};

var test_str = function () {
    var a = ['adam', 'LISA', 'barT'];
    return a.map(function (t) {
        t2 = t.toLowerCase();
        return t2[0].toUpperCase() + t2.substr(1)
    })
};

var test_sushu = function () {
    var arr = [];
    for(var i=1; i<=100; i++)
    {
        arr.push(i)
    }
    re = arr.filter(function (t) {
        if(t<2) return false;
        for (var j=2; j<= t/2; j++)
        {
            if (t % j == 0){
                return false;
            }
        }
        return true;
    });
    return re;
};

var test_date = function () {
    var now = new Date();
    log(now.getDate());
    log(now.toString())
};

var test_reg = function () {
    var s = 'JavaScript, VBScript, JScript and ECMAScript';
    var r = s.match(/\w+Script/g);
//            没有什么效果，用string.match(/reg/g)比较好
//            var r = /(\w+Script)/g.exec(s);
    log(r);
    return ;

    var should_pass = ['someone@gmail.com', 'bill.gates@microsoft.com', 'tom@voyager.org', 'bob2015@163.com'];
    var reg = /^([\w.]+)@([\w\.]+\.+[\w\.]+)$/;
    for(var i=0; i<should_pass.length; i++){
        log(reg.exec(should_pass[i]))
    }

    return;
    var reg = /^(j|J)avascript$/;
    var r = reg.exec('Javascript');
    log(r);
    return ;

    var r = 'a,b,c\td e'.split(/[,\s]/);
    log(r);

    return ;

    var reg = /^(\d+?)(0*)$/;
    var r = reg.exec('102300');
    log(r);

    return ;


//          不能匹配出23点
    var reg = /([0-24]+):([0-59]+):([0-59]+)/;
    var r = reg.exec('22:59:44');
    log(r);

    return ;

};

var test_json = function () {
    log(JSON.parse('{"Name":"小明","Age":14}'));

    return ;
    var xiaoming = {
        name: '小明',
        age: 14,
        gender: true,
        height: 1.65,
        grade: {'name':11},
        'middle-school': '\"W3C\" Middle School',
        skills: ['JavaScript', 'Java', 'Python', 'Lisp'],
        toJSON: function () {
            return {
                'Name': this.name,
                "Age": this.age
            };
        }
    };
    log(JSON.stringify(xiaoming))
}
// test_json()