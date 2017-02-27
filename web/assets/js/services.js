var PRODUCT_URL = 'https://dovelobutto.herokuapp.com/products';

function saveProduct(name, email) {
  return $.ajax(PRODUCT_URL, {
    contentType: 'application/json',
    data: JSON.stringify({
      email: email,
      name: name,
    }),
    method: 'post',
  });
}

function search(name) {
  return $.getJSON(PRODUCT_URL, {
    name: name
  }).then(function(response) {
    return response.data;
  });
}

function searchOne(name) {
  return search(name).then(function(data) {
    return data[0];
  });
}

function getView(name) {
  return $.get('views/' + name + '.html');
}
