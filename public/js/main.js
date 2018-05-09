const variable1 = '';
let variable2;
var variable3;


class TaskCollection {
    constructor(tasks = []) {
        this.tasks = tasks;
    }


    log() {
        this.tasks.forEach(task => console.log(task));
    }

    log2() {
        this.tasks.forEach((task, index) => {
            console.log(this);
        });
    }
}

class Task {}

new TaskCollection([
    new Task,new Task,new Task,
]).log();






function sum(...numbers) {
    //return numbers.reduce((prev, current) => prev + current);
    return numbers.reduce((prev, current) => {
        return prev + current;
    });
}
sum(1,2,3,4);


function diff(x, y) {
    return x - y;
}
let nums = [2, 1];
console.log(...nums);