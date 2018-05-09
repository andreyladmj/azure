Vue.component('mycounter', {
    //template: `<h1>Hi </h1>`
    template: '#counter-template',
    props: ['subject'],
    data: function() {
        return { count: 0 }
    }
});

new Vue({
    el: '#app',
    data: {
        points: 500,
        count: 0,
        message: ''
    },
    methods: {
        handleIt: function (e) {
            //e.preventDefault();
        },
        doSomething: function () {
            console.log('clicked');
            this.count++;
        }
    },
    computed: {
        skill: function() {
            if(this.points < 100) {
                return 'Beginner';
            }

            return 'Advanced';
        }
    },
    watch: {
        points: function(points) {
            console.log(`Points changed up to ${points}`);
        }
    },
    components: {
        // mycounter: {
        //     //template: `<h1>Hi </h1>`
        //     template: '#counter-template',
        //     props: ['subject'],
        //     data: function() {
        //         return { count: 0 }
        //     }
        // }
    }
});