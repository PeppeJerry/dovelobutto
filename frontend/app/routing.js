import $ from 'jquery';
import { getView } from './services';
import init from './controller';
import initComponents from './components';

export function go(page, data) {
  getView(page).then(function(view) {
    var html = init(view, data);
    $('main').html(html);
    initComponents();
  });
}
