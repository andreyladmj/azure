<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <pre>
            @{{ $data | json }}
        </pre>
        <div v-for="plan in plans">
            <plan :plan="plan" :active.sync="active"></plan>
        </div>
    </div>

    <template id="plan-template">
        <div>
            <span>@{{ plan.name }}</span>
            <span>@{{ plan.price }}/month</span>
            <button @click="setActivePlan" v-show="plan.price !== active.price">
                @{{ isUpgrade ? 'Upgrade' : 'Downgrade' }}
            </button>

            <span v-else>Selected</span>
        </div>
    </template>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.js"></script>

    <script>
        new Vue({
            el: '#app',

            data: {
                plans: [
                    { name: 'Enterprise', price: 100 },
                    { name: 'Pro', price: 50 },
                    { name: 'Personal', price: 10 },
                    { name: 'Free', price: 0 },
                ],
                active: { price: 0 }
            },

            components: {
                plan: {
                    template: '#plan-template',

                    props: ['plan', 'active'],

                    computed: {
                        isUpgrade: function() {
                            return this.plan.price > this.active.price;
                        },
                    },

                    methods: {
                        setActivePlan: function() {
                            console.log(this.plan.name);
                            this.active = this.plan;
                        }
                    }
                }
            },
        });
    </script>
</body>
</html>