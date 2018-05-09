function *range(start, end) {
    while(start <= end) {
        yield start;

        start++;
    }
}

console.log([...range(1, 5)]);



let set = new Set([1,2,3,3]);
// [...set]
[...set].filter(tag => tag.length === 3);