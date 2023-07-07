const baseURL = location.protocol + '//' + location.host;
const token = document.querySelector('meta[name="csrf-token"]').content;
var intervalFunc = null;

function withPathName(path) {
    return baseURL + path;
}

function info(message){
    console.log(message);
}

function createElementWith(tag = 'div', attributes = {}) {
    const element = document.createElement(tag);

    Object.entries(attributes).forEach(([key, value]) => {
        element.setAttribute(key, value);
    });

    return element;
}

function startInterval(func, delay = 1000) {
    stopInterval();
    intervalFunc = setInterval(async () => { await func() }, delay);
}

function stopInterval() {
    clearInterval(intervalFunc);
    intervalFunc = null;
}

function showAlert(data) {
    if (document.querySelector('.custom-alert')) {
        return;
    }

    const config = configAlert[data[0]];
    const frag = new DocumentFragment();
    const message = createElementWith('div');
    const alertWrapper = createElementWith('div', {
        class: `custom-alert aos-animate position-fixed alert ${config.class} d-flex align-items-center start-50 end-50 translate-middle`,
        'data-aos': 'fade-down',
        'data-aos-duration': 300,
    })
    const svg = createElementWith('svg', {
        class: `bi ${config.svg.class} flex-shrink-0 me-2`,
        xmlns: 'http://www.w3.org/2000/svg',
        role: 'img',
        viewBox: '0 0 16 16'
    })
    const path = createElementWith(...config.svg.path);

    message.textContent = data[1];

    svg.append(path);
    alertWrapper.append(svg, message);
    frag.append(alertWrapper);

    document.querySelector('body').prepend(frag);

    rmAlert(3000, 300);
}

function rmAlert(delay, duration = 1000) {
    const el = document.querySelector('.custom-alert');

    setTimeout(() => {
        el.classList.remove('aos-animate');

        setTimeout(() => {
            el.remove();
        }, duration);
    }, delay);
}

function startLoading(){
    const el = createElementWith('div', {class: 'spinner-bg', id: 'spinner-bg'});
    el.innerHTML = '<div class="spinner-container"><div class="spinner"></div></div>';
    document.getElementsByTagName('body')[0].prepend(el);
}

function stopLoading(){
    document.getElementById('spinner-bg').remove();
}

function clearInputValue(){
    const list = document.querySelectorAll('input');

    for(const x of list){
        x.value = '';
    }
}

