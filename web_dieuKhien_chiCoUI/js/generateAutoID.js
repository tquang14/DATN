function generateID(_length) {
    return [...Array(_length)].map(i => (~~(Math.random() * 36)).toString(36)).join('');
}

function setID() {
    var ID = generateID(8);
    document.getElementById('addTree_ID').value = ID;
}