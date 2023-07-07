const apiUrl = withPathName('/api/get/tokenvalue');
const cardId = document.querySelector('input[name="card_id"]');

startInterval(getCardId, 500);

document.querySelector('input[name="pin"]')
.addEventListener("keydown", event => onlyNumber(event));

function onlyNumber(event){
    if (event.key === "Backspace" || event.key === "Delete") {
        return;
    }

    if (!isNumeric(event.key)) {
        event.preventDefault();
    }
}

function isNumeric(char) {
    return /^\d$/.test(char);
}

async function getCardId(){
    const data = await fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
    })
        .then((response) => response.text());

    if(data){
        cardId.value = data;
        enableInput();
        stopInterval();
    }
}

function enableInput(){
    const list = document.querySelectorAll('input');

    for(const x of list){
        if(x != cardId){
            x.removeAttribute('disabled');
        }
    }
}
