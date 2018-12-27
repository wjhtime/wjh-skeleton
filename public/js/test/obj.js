
function Student(name) {
    this.name = name;
}
//实例共享该方法
Student.prototype.hello = function () {
    log('hello');
};

var xiaoming = new Student('xiaoming');
var xiaohong = new Student('xiaohong');


function Cat(name) {
    this.name = name
}

Cat.prototype.say = function () {
    return 'Hello, ' + this.name + '!';
};

var xiaomao = new Cat('xiaomao');