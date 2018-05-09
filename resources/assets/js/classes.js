import { TaskCollection, foo } from './TaskCollection';


class User {
    constructor(username, email) {
        this.username = username;
        this.email = email;
    }

    static register(...args) {
        return new User(...args)
    }

    changeEmail(newEmail) {
        this.email = newEmail;
    }

    get foo() {
        return 'foo'
    }

    set foo(arg) {

    }
}

let user = User.register('John', 'test@gmail.com');
User.register();
console.log(user.foo);



function log(strategy) {
    strategy.handle()
}

log(new class {
    handle() {
        console.log('Using the console strategy to log.');
    }
});