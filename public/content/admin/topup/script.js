const postUrl = withPathName('/post/update/tokenvalue');
const apiUrl = withPathName('/api/get/tokenvalue');

document.getElementById('confirm').addEventListener('click', confirm);

function confirm(){
    if(!document.getElementById('amount').value){
        return false;
    }

    startLoading();

    postData() ? startInterval(checking, 500) : info('post fail');

}

async function postData(){
    return await fetch(postUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            value: document.getElementById('amount').value,
            _token: token
        })
    })
        .then((response) => response.json());
}

