<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .completed {
        text-decoration: line-through;
    }
</style>
<body>

    <tasks :list="tasks"></tasks>

    <template id="tasks-template">
        <h1>
            Tasks
            <span v-show="remaining">(@{{ remaining }})</span>
        </h1>
        <ul>
            <li :class="{completed: task.completed}"
                v-for="task in list"
                @click="task.completed = !task.completed"
            >
            @{{ task.body }}
            </li>
        </ul>
    </template>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.js"></script>
<script>
Vue.component('tasks', {
    props: ['list'],
    template: '#tasks-template',
    data: function() {
        return {}
    },
    computed: {
        remaining: function() {
            return this.list.filter(this.inProgress).length;
            //return this.list.filter(function(task) { return !task.completed; }).length;
            //vm.enyMethodInComponent
        }
    },
    methods: {
        toggleCompleted: function(task) {
            task.completed = !task.completed;
        },
        inProgress: function(task) {
            return ! task.completed;
        }
    }
});

new Vue({
    el: 'body',
    data: {
        isCompleted: '1',//this.task.completed,
        tasks: [
            { body: 'Go to the store', completed: false },
            { body: 'Go to the shop', completed: true },
            { body: 'Go to the doctor', completed: false },
        ]
    }
});
</script>
</body>
</html>