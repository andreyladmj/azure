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

        <form action="test.html" @submit.prevent="handleIt">
            <span class="error" v-show="!message">Error</span>
            <textarea name="" id="" cols="30" rows="10" v-model="message"></textarea>
            <button id="submit" @click="count += 2">Click</button>
            <p>@{{ count }}</p>
            <div class="form-group">
                <label>Points for @{{ skill }}</label>
                <input type="text" v-model="points">
            </div>
        </form>

        <mycounter subject="Likes"></mycounter>
        <mycounter subject="Dislikes"></mycounter>

        <template id="counter-template">
            <h1>Head2</h1>
            <button>Increment</button>
        </template>

        <!--pre>@{{ data | json }}</pre-->

    </div>

    <script src="/js/app.js"></script>
</body>
</html>