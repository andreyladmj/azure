let thing = new Promise(function (resolve, reject) {
    console.log('Init promise');

    setTimeout(function () {
        resolve();
    }, 5000);
});

thing.then(function () {
    console.log('THEN');
});


let timer = function(length) {
    return new Promise(function (resolve, reject) {
        console.log("init promise");

        setTimeout(function () {
            console.log('Timeout Done');
            resolve();
        }, length)
    })
};

timer(4000).then(() => console.log('Done'));