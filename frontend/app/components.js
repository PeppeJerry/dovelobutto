import $ from 'jquery';
import { getView } from './services';
import init from './controller';

function navbar() {
  getView('navbar').then(function(view) {
    var template = init(view);
    var navbars = $('ps-navbar');
    navbars = template.replaceAll(navbars);
  });
}

export default function initComponents() {
  navbar();
}
