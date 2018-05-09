
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

//require('./promises');
//require('./generators');
require('./vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app',
//     components: {
//
//     }
// });

let name1 = 'Foo';

let template = `
    <div class="alert">
        <p>${name}</p>
    </div>
`;

console.log(template);


function getPerson() {
    let name = 'John';
    let age = 25;

    return {
        name,
        age,
        greet() {
            return `Hello, ${this.name}`
        }
    }
}

let person = {
    test: 12,
    name: "karen",
    age: 3,
    supertest: 12
};
let { name, age } = person;

function getData({ name, age }) {
    console.log(name, age);
}
getData(person);


'string'.includes('test');
'string'.startsWith('test');
'string'.endsWith('test');
'string'.repeat(2);
//array.find(item => console.log(item))