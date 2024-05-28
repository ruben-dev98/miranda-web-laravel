const delete__order = document.querySelector('.delete__order');

delete__order.addEventListener('submit', (event) => {
    event.preventDefault();
    this.closest('form').submit();
});

const edit__order = document.querySelector('.edit__order');

edit__order.addEventListener('submit', (event) => {
    event.preventDefault();
    this.closest('form').submit();
});

const new__order = document.querySelector('.new__order');

new__order.addEventListener('submit', (event) => {
    event.preventDefault();
    this.closest('form').submit();
});