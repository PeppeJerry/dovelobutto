import $ from 'jquery';

var PRODUCT_URL = 'https://dovelobutto.herokuapp.com/products';

export function saveProduct(name, email) {
  return $.ajax(PRODUCT_URL, {
    contentType: 'application/json',
    data: JSON.stringify({
      email: email,
      name: name,
    }),
    method: 'post',
  });
}

export function search(name) {
  return $.getJSON(PRODUCT_URL, {
    name: name
  }).then(function(response) {
    return response.data;
  });
}

export function searchOne(name) {
  return search(name).then(function(data) {
    return data[0];
  });
}

export function getView(name) {
  return $.get('/assets/views/' + name + '.mustache');
}
